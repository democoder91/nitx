<?php

namespace App\Http\Controllers;

use App\Events\BroadcastScreenMedia;
use App\Events\ScreenAds;
use App\Events\ScreenData;
use App\Http\Requests\StoreScreenGroupRequest;
use App\Http\Requests\UpdateScreenGroupRequest;
use App\Models\Screen;
use App\Models\ScreenGroup;
use App\Models\Sequence;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

class ScreenGroupController extends Controller
{
    public function fetchScreenGroupSequenceMediaWithTheirDuration($sequenceId)
    {
        $result = ScreenGroup::fetchScreenGroupSequenceMediaWithTheirDuration($sequenceId);
        return response()->json($result);
    }

    public function createScreenGroup(StoreScreenGroupRequest $request)
    {
        $screenGroup = ScreenGroup::create([
            'name' => $request->screen_group_name,
            'media_owner_id' => auth()->user()->id,
            'sequence_id' => $request->sequence_id,
        ]);
        if ($screenGroup->sequence_id) {
            $sequence = Sequence::find($screenGroup->sequence_id);
            $sequence->update(['status' => 'live']);
        }
        $media = ScreenGroup::fetchScreenGroupSequenceMediaWithTheirDuration($screenGroup->sequence_id);
        $screenGroup->save();
        $screensIds = $request->screens;
        if ($screensIds) {
            foreach ($screensIds as $screenId) {
                $screen = Screen::find($screenId);
                $screen->sequence_id = $screenGroup->sequence_id;
                $screen->active_screen_group_id = $screenGroup->id;
                $screen->save();
                event(new BroadcastScreenMedia($screenId, $media));
                $screenGroup->screens()->attach($screenId, ['media_owner_id' => auth()->user()->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
            }
        }
        return redirect()->back();
    }


    public function getScreenGroupAndItScreens($id)
    {
        $screenGroup = ScreenGroup::find($id);
        $data1 = $screenGroup->screens()->get();
        $joinedScreens = [];
        foreach ($data1 as $record) {
            $joinedScreens[] = [
                'screen_id' => $record['id'],
                'screen_name' => $record['name'],
            ];
        }
        $notJoinedScreens = [];
        $data2 = $this->getScreensNotInTheGroup(auth()->user()->id);
        foreach ($data2 as $record) {
            $notJoinedScreens[] = [
                'screen_id' => $record->id,
                'screen_name' => $record->name,
            ];
        }
        return response()->json([
            'screen_group_id' => $screenGroup->id,
            'screen_group_name' => $screenGroup->name,
            'joined_screens' => $joinedScreens,
            'not_joined_screens' => $notJoinedScreens,
        ]);
    }

    public static function getScreensNotInTheGroup($media_owner_id)
    {
        return ScreenGroup::getScreensNotInTheGroup($media_owner_id);
    }

    public function update(UpdateScreenGroupRequest $request, $id)
    {
        $screenGroup = ScreenGroup::find($id);
        $screenGroup->update([
            'name' => $request['modal-screen-group-name'],
            'sequence_id' => $request['modal-sequence-id'] == 'select' ? null : $request['modal-sequence-id'],
            'is_active' => $request['is_active'] == 'on',
        ]);
        $screensIds = $request['screens'];
        $syncedScreens = $screenGroup->screens()->sync($screensIds);
        $attachedScreens = $syncedScreens['attached'];
        $detachedScreens = $syncedScreens['detached'];
        if ($detachedScreens) {
            foreach ($detachedScreens as $detachedScreen) {
                $screen = Screen::find($detachedScreen);
                $screen->sequence_id = 1;
                $screen->active_screen_group_id = null;
                $screen->save();
                event(new BroadcastScreenMedia($detachedScreen, Sequence::fetchDefaultSequence()));
            }
        }
        if ($attachedScreens) {
            foreach ($attachedScreens as $attachedScreen) {
                $screen = Screen::find($attachedScreen);
                $screen->sequence_id = $screenGroup->sequence_id;
                $screen->active_screen_group_id = $screenGroup->id;
                $screen->save();
                event(new BroadcastScreenMedia($attachedScreen, ScreenGroup::fetchScreenGroupSequenceMediaWithTheirDuration($screenGroup->sequence_id)));
            }
        }
        if (!$screenGroup->is_active) {
            foreach (ScreenGroup::getAllScreensByScreenGroup($screenGroup->id) as $screen) {
                $screenId = $screen->id;
                $screen = Screen::find($screenId);
                $screen->sequence_id = 1;
                $screen->save();
                event(new BroadcastScreenMedia($screenId, Sequence::fetchDefaultSequence()));
            }
        } else {
            $sequence = Sequence::find($screenGroup->sequence_id);
            $sequence->status = "live";
            $sequence->save();
            foreach (ScreenGroup::getAllScreensByScreenGroup($screenGroup->id) as $screen) {
                $screenId = $screen->id;
                $screen = Screen::find($screenId);
                $screen->sequence_id = $screenGroup->sequence_id;
                $screen->save();
                event(new BroadcastScreenMedia($screenId, ScreenGroup::fetchScreenGroupSequenceMediaWithTheirDuration($screenGroup->sequence_id)));
            }
        }
        foreach (Sequence::all() as $sequence) {
            if (Sequence::checkIfSequenceIsLinkedToScreenGroup($sequence->id) >= 1) {
                $sequence->status = "live";
                $sequence->save();
            } else {
                $sequence->status = "ready";
                $sequence->save();
            }
        }
        return redirect()->back();
    }

    public function getRemovedScreens($screensIds, $groupScreens)
    {
        $arr1 = $this->getGroupScreenIds($groupScreens);
        $arr2 = $screensIds;
        if (is_null($arr1) || is_null($arr2)) {
            return;
        }
        return array_diff($arr1, $arr2);
    }

    public function getGroupScreenIds($groupScreens)
    {
        $res = [];
        foreach ($groupScreens as $groupScreen) {
            $res [] = $groupScreen->id;
        }
        return $res;
    }

    public function destroy($screenGroupId)
    {
        $screenGroup = ScreenGroup::find($screenGroupId);
        if ($screenGroupId && !$screenGroup) {
            return null;
        }
        $screenGroup->screens()->sync(array(1 => array('deleted_at' => Carbon::now())));
        foreach ($screenGroup->screens()->get() as $screen) {
            $screen->active_screen_group_id = null;
            $screen->save();
        }
        $screenGroup->delete();
        return redirect()->route('MOScreens');
    }
}
