<?php

namespace App\Http\Controllers;

use App\Constants\Status;
use App\Enums\SequenceStatus;
use App\Events\BroadcastScreenMedia;
use App\Http\Requests\StoreSequenceRequest;
use App\Http\Requests\UpdateSequenceRequest;
use App\Models\Folder;
use App\Models\Screen;
use App\Models\ScreenGroup;
use App\Models\Sequence;
use App\Services\SequenceService;
use Carbon\Carbon;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SequenceController extends Controller
{
    public function index()
    {
        return Sequence::all();
    }

    public function storeSequence(StoreSequenceRequest $request)
    {

        // check if the request has run for ever key
         
        // if ($request->has('run_for_ever')) {
        //     // if the request run for ever is not null
        //     if ($request->run_for_ever != null) {
        //         if ($request->run_for_ever === 'on') {
        //             $end_date = null;
        //         }else{
        //             $end_date = $request->sequence_end_date;
        //         }
        //     }
        
        // }else{
        //     $end_date = $request->sequence_end_date;
        // }
        $sequence = Sequence::create([
            'name' => $request->sequence_name,
            'start_date' => $request->sequence_start_date,
            'end_date' => $request->sequence_end_date,
            'run_for_ever' => $request['run_for_ever'] === 'on',
            'media_owner_id' => auth()->user()->id
        ]);
        // if the sequence runs for ever then the end date is null

        $sequence = SequenceService::updateSequenceStatus($sequence);
        $sequence->update();

        $daysIds = $request['days'];
        foreach ($daysIds as $dayId) {
            $sequence->days()->attach($dayId);
        }
        $mediaIds = $request['media'];
        $minutes = $request['minutes'];
        $seconds = $request['seconds'];
        $counter = count($mediaIds);
        for ($i = 0; $i < $counter; $i++) {
            $sequence->media()->attach($mediaIds[$i], [
                'order' => $i,
                'minutes' => $minutes[$i],
                'seconds' => $seconds[$i],
            ]);
        }
        return redirect()->back();
    }

    public function editSequencePageView(Request $request, $id)
    {
        return view('layout.media_owner.sequence_edit', [
            'user' => Auth::user(),
            'name' => auth()->user()->name,
            'medias' => Folder::getMedia(null, auth()->user()->id),
            'sequence' => Sequence::find($id),
            'folders' => Folder::getFolders(null, auth()->user()->id),
        ]);
    }

    public function updateSequence(UpdateSequenceRequest $request, $sequenceId)
    {
        // die and dump the request
        $sequence = Sequence::find($sequenceId);
        if (!$sequence && $sequenceId) {
            return null;
        }
        // create a sequence object to update
        // IF THE SEQUENCE RUNS FOR EVER THEN THE END DATE IS NULL
        if ($request->has('run_for_ever')) {
            if ($request->run_for_ever === 'on') {
                $end_date = null;
            }else{
                $end_date = $request->sequence_end_date;
            }
        }else{
            $end_date = $request->sequence_end_date;
        }
        
        $sequence->update([
            'name' => $request->sequence_name,
            'start_date' => $request->sequence_start_date,
            'end_date' => $end_date,
            'run_for_ever' => $request->run_for_ever === 'on',
        ]);
        $sequence = SequenceService::updateSequenceStatus($sequence);
        $sequence->update();
        
        SequenceService::updateSequenceScreenGroupsAndScreens($sequence);           

        $daysIds = $request['days'];
        $mediaIds = $request['media'];
        $syncedDays = $sequence->days()->sync($daysIds);
        $syncedMedia = $sequence->media()->sync($mediaIds);
        $minutes = $request['minutes'];
        $seconds = $request['seconds'];
        $sequenceMediaCount = Sequence::getSequenceMediaCount($sequenceId);
        for ($i = 0; $i < $sequenceMediaCount; $i++) {
            DB::table('media_sequence')
                ->where('sequence_id', $sequenceId)
                ->where('media_id', $mediaIds[$i])
                ->update([
                    'order' => $i,
                    'minutes' => $minutes[$i],
                    'seconds' => $seconds[$i],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
        }
        foreach (Sequence::getAllScreensBySequenceId($sequenceId) as $screen) {
            event(new BroadcastScreenMedia($screen->id, ScreenGroup::fetchScreenMediaBySequenceId($screen->sequence_id, $screen->id)));
        }
        return redirect()->route('MOsequence');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Sequence $sequence
     * @return \Illuminate\Http\Response
     */
    public
    function deleteSequence(Request $request, $id)
    {
        $sequence = Sequence::find($id);
        $screensConnectedToThisSequence = Sequence::getScreensConnectedToThisSequence($id);
        foreach ($screensConnectedToThisSequence as $screen) {
            $screen = Screen::find($screen->id);
            $screen->sequence_id = 1;
            $screen->save();
            event(new BroadcastScreenMedia($screen->id, ScreenGroup::fetchScreenMediaBySequenceId($screen->sequence_id, $screen->id)));
        }
        if ($sequence->name == $request['sequence-name']) {
            $sequence->delete();
            return redirect()->route('MOsequence');
        }
        return redirect()->route('MOsequence');
    }


}
