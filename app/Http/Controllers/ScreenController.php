<?php

namespace App\Http\Controllers;

use App\Events\BroadcastScreenMedia;
use App\Events\BroadcastScreenOrientation;
use App\Events\BroadcastScreenRotation;
use App\Events\RegisterScreen;
use App\Events\ScreenData;
use App\Mail\media_owner\newScreen;
use App\Models\Category;
use App\Models\Screen;
use App\Models\ScreenCounter;
use App\Models\ScreenGroup;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class ScreenController extends Controller
{
    public function newScreenPage()
    {
        if (Cookie::get('screenId')) {
            return redirect()->route("screen.show");
        }
        return view('layout.screen_ad.newScreen');
    }

    public function newScreenEvent(Request $request)
    {
        event(new RegisterScreen($request->screenId));
        return view('layout.screen_ad.ScreenData', [
            "screenId" => $request->screenId,
            "categories" => Category::all(),
            "screen_groups" => ScreenGroup::getScreenGroupsByMediaOwnerId(auth()->user()->id),
        ]);
    }


    public function update(Request $request, $screenId)
    {
        $screen = Screen::find($screenId);
        $screen->update($request->except("category"));
        $screen->categories()->sync($request->category);
        event(new ScreenData($request->screenId, Crypt::encrypt($screen->id)));
        event(new BroadcastScreenMedia($screen->id, ScreenGroup::fetchScreenGroupSequenceMediaWithTheirDuration($screen->sequence_id)));
        Mail::to(auth()->user()->email)->send(new newScreen($screen->name));
        return redirect()->route('MOScreens');
    }

    public function store(Request $request)
    {
        $screen = Screen::create([
            "media_owner_id" => Auth::user()->id,
            "name" => $request->name,
            "orientation" => $request->orientation,
            "status" => "Active",
            "type" => $request->type,
            "latitude" => $request->latitude,
            "longitude" => $request->longitude,
            "sequence_id" => 1,
            "active_screen_group_id" => $request->active_screen_group_id
        ]);
        $screenGroup = ScreenGroup::find($request->active_screen_group_id);
        if ($request->active_screen_group_id) {
            $screen->update([
                'sequence_id' => $screenGroup->sequence_id
            ]);
            $screenGroup->screens()->attach($screen->id, ['media_owner_id' => auth()->user()->id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        }
        $screen->categories()->attach($request->category);
        event(new ScreenData($request->screenId, Crypt::encrypt($screen->id)));
        event(new BroadcastScreenMedia($screen->id, ScreenGroup::fetchScreenGroupSequenceMediaWithTheirDuration($screen->sequence_id)));
        Mail::to(auth()->user()->email)->send(new newScreen($screen->name));
        return redirect()->route('MOScreens');
    }

    public function getScreensData(Request $request)
    {
        $categories = $request->categories;
        $screens = Screen::whereHas('categories', function ($q) use ($categories) {
            $q->whereIn('category_id', $categories);
        })->whereOrientation($request->orientation)->whereStatus("Active")->get();
        foreach ($screens as $screen) {
            $screen->available = ScreenCounter::isAvailable($screen->id, $request->from, $request->to);
        }
        return response()->json([
            'screens' => $screens
        ]);

    }

    public function show(Request $request)
    {
        if (!Cookie::get('screenId')) {
            return redirect()->route("newScreen");
        }
        $screenId = Crypt::decrypt($request->cookie('screenId'));
        $screen = Screen::find($screenId);
        $today = date('Y-m-d');
        return view('layout.screen_ad.screen', [
            'ads' => $screen->ads()->wherePivot("status", "Active")->wherePivot('from', '<=', $today)->wherePivot('to', '>=', $today)->get(),
            'medias' => ScreenGroup::fetchScreenMediaBySequenceId($screen->sequence_id, $screenId),
            'screenId' => $screenId,
            'orientation' => $screen->orientation,
            'type' => $screen->type,
            'sequence_id' => $screen->sequence_id,
            'screen' => $screen
        ]);
    }

    public function updateScreenAds(Request $request)
    {
        $screenId = Crypt::decrypt($request->cookie('screenId'));
        $today = date('Y-m-d');

        return response()->json([
            "ads" => Screen::find($screenId)->ads()->wherePivot("status", "Active")->wherePivot('from', '<=', $today)->wherePivot('to', '>=', $today)->get()
        ]);
    }

    public function updateScreen(Request $request, $screenId)
    {
        $screen = Screen::find($screenId);
        $screen->update([
            'name' => $request['modal-screen-name'],
            'type' => $request['switch-screen-to-ad'] == 'on' ? 'ad' : 'regular'
        ]);
        if ($screen->type == 'ad' && count(Screen::getScreenAds($screenId)) > 0) {
            return redirect()->back()->withErrors("🔴 You can't switch back to the regular screen until all the ads ended");
        }
        return redirect()->back();
    }

    public function changeScreenOrientation(Request $request, $screenId)
    {
        $orientation = $request->orientation;
        event(new BroadcastScreenOrientation($screenId, $orientation));
    }

    public function changeScreenRotation(Request $request, $screenId)
    {
        $rotation = $request->rotation;
        $rotationClass = $request->rotationClass;
        $screen = Screen::find($screenId);
        $screen->update([
            'rotation_class' => $rotationClass,
        ]);
        event(new BroadcastScreenRotation($screenId, $rotation));
    }

    public function checkIsScreenInOneGroup($screenId)
    {
        $activeScreenGroupId = Screen::find($screenId)->active_screen_group_id;
        return Screen::checkIsScreenInOneGroup($screenId, $activeScreenGroupId);
    }


    public function linkScreenView($screenId)
    {
        $screen = Screen::find($screenId);
        return view('layout.media_owner.scan_qr_relink', [
            'screen_id' => $screenId,
            'screen_name' => $screen->name
        ]);
    }

    public function relinkedScreenData($relinkedScreenData)
    {
        dd(2976382638726387265873652);
    }

    public function linkScreen(Request $request, $enteredScreenId, $actualScreenId)
    {
        if ($actualScreenId != $enteredScreenId) {
            return redirect()->route('relinkScreenView', ["screenId" => $enteredScreenId])->withErrors('The entered ID screen does not match with the ID of requested screen');
        }
        event(new RegisterScreen($enteredScreenId));
        event(new ScreenData($enteredScreenId, Crypt::encrypt($enteredScreenId)));
        return redirect()->route('MOScreens')->with('message', 'Screen with ID ' . $enteredScreenId . ' has already been relinked successfully');
    }

    public function linkScreenQR(Request $request, $actualScreenId)
    {
        event(new RegisterScreen($actualScreenId));
        event(new ScreenData($actualScreenId, Crypt::encrypt($actualScreenId)));
        return redirect()->route('MOScreens')->with('message', 'Screen with ID ' . $actualScreenId . ' has already been relinked successfully');
    }

    private function getScreenCheckedCategoriesIDs($screenCategories)
    {
        $screenCategoriesArrayIds = [];
        foreach ($screenCategories as $screenCategory) {
            $screenCategoriesArrayIds [] = $screenCategory->id;
        }
        return $screenCategoriesArrayIds;
    }

}
