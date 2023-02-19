<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetChildFolderPage;
use App\Models\Category;
use App\Models\Folder;
use App\Models\LoginActivity;
use App\Models\Marketer;
use App\Models\Media;
use App\Models\MediaOwner;
use App\Models\Plan;
use App\Models\Screen;
use App\Models\ScreenGroup;
use App\Models\Sequence;
use App\Models\Subscription;
use Barryvdh\DomPDF\Facade\Pdf;
use Browser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use utilities\CommonUtilities;
use Intervention\Image\Facades\Image;

class MediaOwnerController extends Controller
{
    public function registerPage()
    {
        return view('layout.media_owner.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:media_owners',
            'password' => 'required|min:8|confirmed|string',
            'referral' => 'exists:marketers,code|nullable',
        ]);

        $user = MediaOwner::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'commercial_record' => $request->commercial_record,
            'referral_code' => $this->generateRandomString(7),
        ]);

        $credentials = $request->only('email', 'password');
        auth()->guard('media_owner')->attempt($credentials, true); // true for remember me

        if ($request->referral) {
            $marketer = Marketer::whereCode($request->referral)->first();
            DB::table('marketer_media_owner')->insert([
                'media_owner_id' => $user->id,
                'marketer_id' => $marketer->id
            ]);
        }
        $browser = new Browser();
        LoginActivity::create([
            'browser_name' => $browser->getBrowser(),
            'ip' => $request->ip(),
            'time' => Carbon::now(),
            'media_owner_id' => MediaOwner::where('email', $request->email)->first()->id
        ]);
        return redirect()->route('MODashboard');
    }

    public function loginPage()
    {
        return view('layout.media_owner.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::guard('media_owner')->attempt($credentials, $request->remember)) {
            $browser = new Browser();
            LoginActivity::create([
                'browser_name' => $browser->getBrowser(),
                'ip' => $request->ip(),
                'time' => Carbon::now(),
                'media_owner_id' => MediaOwner::where('email', $request->email)->first()->id
            ]);
            return redirect()->route('MODashboard')
                ->withSuccess('Signed in');
        }
        return back()->withErrors(["failed" => trans('auth.failed')]);;
    }

    public function dashboard()
    {

        return view('layout.media_owner.dashboard', [
            'user' => Auth::user(),
            'name' => auth()->user()->name,
            'media_size_data' => MediaController::getMediaOwnerMediaSize(auth()->user()->id),
            'screens' => auth()->user()->screens
        ]);
    }

    public function screens()
    {
        return view('layout.media_owner.screens', [
            "screens" => auth()->user()->screens,
            'regular_screens' => Screen::getRegularScreens(auth()->user()->id),
            'ad_screens' => Screen::getAdScreens(auth()->user()->id),
            "screen_groups" => auth()->user()->screenGroups,
            'name' => auth()->user()->name,
            'ready_sequences' => Sequence::getReadySequences()->sortBy('updated_by'),
            'all_sequences' => Sequence::getAllSequences(auth()->user()->id)->sortBy('updated')->where('deleted_at', '==', Null)->where('status', '!=', 'Ended'),
        ]);
    }

    public function sequence()
    {
        return view('layout.media_owner.sequence', [
            'user' => Auth::user(),
            'name' => auth()->user()->name,
            'medias' => FolderController::getAllMedia(auth()->user()->id),
            'sequences' => Sequence::getAllSequencesByMediaOwnerId(auth()->user()->id)->sortBy('updated_at'),
            'folders' => Folder::getFolders(null, auth()->user()->id),
        ]);
    }

    public function template()
    {
        return view('layout.media_owner.template', [
            'user' => Auth::user(),
            'name' => auth()->user()->name,
        ]);
    }

    public function mediaFolders($parentFolderId)
    {
        $foldersPath = array();
        $foldersPath[] = [intval($parentFolderId), Folder::find($parentFolderId)->name];
        $flag = true;
        $parentFolderId2 = $parentFolderId;
        while ($flag) {
            if (is_null(Folder::getParentFolder($parentFolderId2))) {
                $flag = false;
            } else {
                if (!is_null(Folder::find(Folder::getParentFolder($parentFolderId2)->parent_folder))) {
                    $foldersPath[] = [Folder::find(Folder::getParentFolder($parentFolderId2)->parent_folder)->id, Folder::find(Folder::getParentFolder($parentFolderId2)->parent_folder)->name];
                }
                $parentFolderId2 = Folder::getParentFolder($parentFolderId2)->parent_folder;
            }
        }
        return view('layout.media_owner.media_folders', [
            'user' => Auth::user(),
            'all_folders' => Folder::getAllFolders(auth()->user()->id),
            'folders' => Folder::getFolders($parentFolderId, auth()->user()->id),
            'folder' => Folder::find($parentFolderId),
            'media' => Media::getMedia($parentFolderId, auth()->user()->id),
            'create_child_folder_url' => route('media_owner.create_child_folder', $parentFolderId),
            'upload_child_media_url' => route('media_owner.upload_child_media', $parentFolderId),
            'name' => auth()->user()->name,
            'folder_path' => array_reverse($foldersPath)
        ]);
    }


    public function media()
    {
        return view('layout.media_owner.media', [
            'user' => Auth::user(),
            'all_folders' => Folder::getAllFolders(auth()->user()->id),
            'folders' => Folder::getFolders(null, auth()->user()->id),
            'media' => Media::getMedia(null, auth()->user()->id),
            'name' => auth()->user()->name,
        ]);
    }

    public function settings()
    {
        return view('layout.media_owner.settings', [
            'user' => Auth::user(),
            'name' => auth()->user()->name,
            "categories" => Category::all(),
            'login_activities' => LoginActivity::getLoginActivitiesByMediaOwnerId(auth()->user()->id),
        ]);
    }

    public function wallet()
    {
        $subscription = Subscription::getSubscription(auth()->user()->id);
        $subscriptionData = null;
        if ($subscription) {
            $subscriptionData = Subscription::getSubscriptionDate($subscription->id);
        }
        return view('layout.media_owner.wallet', [
            'wallet' => auth()->guard('media_owner')->user()->getWallet(),
            'name' => auth()->user()->name,
            'media_owner_id' => auth()->user()->id,
            'cards' => auth()->user()->cards,
            'plans' => Plan::all(),
            'isSubscribed' => Subscription::checkIfHasPlanSubscription(auth()->user()->id),
            'subscription' => $subscriptionData
        ]);
    }

    public function scanQR()
    {
        return view('layout.media_owner.scan_qr');
    }

    public function scanQRRelink($screenId)
    {
        $screen = Screen::find($screenId);
        return view('layout.screen_ad.relinkScreen', [
            'screen_id' => $screenId,
            'screen_name' => $screen->name
        ]);
    }

    public function logout()
    {
        Auth::guard('media_owner')->logout();
        return redirect()->route('index');
    }

    public function generateMediaOwnerContract($id)
    {
        $mediaOwner = MediaOwner::find($id);
        $data = [
            'name' => $mediaOwner->name,
            'date' => $mediaOwner->created_at->format('Y-m-d'),
        ];
        $pdf = PDF::loadView('pdf.media_owner_contract', [
            'data' => $data
        ]);
        return $pdf->download('MediaOwnerContract.pdf');
    }


    public function createFolder(Request $request)
    {
        if ($request->folder_name == null) {
            return redirect()->back()->withErrors("Folder must has a name, please create another file and provide a name");
        }
        $folder = Folder::create([
            'name' => $request->folder_name,
            'system_folder_name' => md5($request->folder_name . Carbon::now()),
            'media_owner_id' => auth()->user()->id,
        ]);
        $folder->save();
        return redirect()->back();
    }

    public function createChildFolder(Request $request, $parentFolderId)
    {
        $folder = Folder::create([
            'name' => $request->folder_name,
            'media_owner_id' => auth()->user()->id,
            'parent_folder' => $parentFolderId
        ]);
        $folder->save();
        return redirect()->back();
    }

    public function getFolder(GetChildFolderPage $request, $parentFolderId)
    {

        return view('layout.media_owner.media', [
            'user' => Auth::user(),
            'folders' => Folder::getFolders($parentFolderId, auth()->user()->id),
            'all_folders' => Folder::all(),
            'media' => Media::getMedia($parentFolderId, auth()->user()->id),
            'name' => auth()->user()->name,
        ]);
    }


    public function uploadMedia(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpeg,png,jpg,gif,svg,mp4,pdf',
        ]);
        $file = $request->file('file');
        $fileName = str_replace(' ', '-', $file->getClientOriginalName());
        $systemMediaName = md5($fileName . Carbon::now());
        $disk = Storage::disk(config('filesystems.default'));
        $path = $disk->putFileAs('media', $file, $systemMediaName);
        $height = null;
        $width = null;
        if ($this->isImageOrVideo($file->extension()) == 'image') {
            $width = Image::make($file)->width();
            $height = Image::make($file)->height();
        }
        $media = Media::create([
            'name' => $fileName,
            'system_media_name' => $systemMediaName,
            'path' => $path,
            'size' => $request->file('file')->getSize(),
            'type' => $this->isImageOrVideo($file->extension()),
            'height' => $height,
            'width' => $width,
            'media_owner_id' => auth()->user()->id,
            'mime' => $file->extension()
        ]);
        $media->save();
        return redirect()->back();
    }


    public function removeMedia(Request $request)
    {
        $fileName = str_replace(' ', '-', $request['fileName']);
        $media = Media::getMediaByName($fileName);
        $media->delete();
    }


    public function uploadChildMedia(Request $request, $parentFolderId = null)
    {
        $request->validate([
            'file' => 'required|mimes:jpeg,png,jpg,gif,svg,mp4,pdf',
        ]);
        $file = $request->file('file');
        $fileName = time() . '.' . $file->extension();
        $disk = Storage::disk(config('filesystems.default'));
        $path = $disk->putFileAs('media', $file, $fileName);
        $height = null;
        $width = null;
        if ($this->isImageOrVideo($file->extension()) == 'image') {
            $width = Image::make($file)->width();
            $height = Image::make($file)->height();
        }
        $media = Media::create([
            'name' => $fileName,
            'path' => $path,
            'size' => $request->file('file')->getSize(),
            'type' => $this->isImageOrVideo($file->extension()),
            'height' => $height,
            'width' => $width,
            'parent_folder_id' => $parentFolderId,
            'media_owner_id' => auth()->user()->id,
        ]);
        $media->save();
        return redirect()->back();
    }

    public static function isImageOrVideo($mime)
    {
        if ($mime == 'jpeg' || $mime == 'png' || $mime == 'jpg' || $mime == 'gif' || $mime == 'svg') {
            return 'image';
        } else if ($mime == 'mp4') {
            return 'video';
        }
    }

    public function generateRandomString($length_of_string)
    {
        $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($str_result), 0, $length_of_string);
    }

    public static function editAccountInfo(Request $request, $mediaOwnerId)
    {
        $request->validate([
            'name' => 'string|max:255',
            'email' => "email|unique:media_owners,email, $mediaOwnerId",
            'commercial_record' => 'max:255',
        ]);
        $mediaOwner = MediaOwner::find($mediaOwnerId);
        $mediaOwner->update([
            'name' => $request->name,
            'email' => $request->email,
            'commercial_record' => $request->commercial_record,
        ]);
        $mediaOwner->save();
        return redirect()->route('MOSettings')->with('message', 'Your account info has been updated successfully');
    }


    public static function changePassword(Request $request, $mediaOwnerId)
    {
        $request->validate([
            'previous_password' => 'required|min:8|string',
            'password' => 'required|min:8|confirmed|string',
        ]);
        $mediaOwner = MediaOwner::find($mediaOwnerId);
        $hashedPassword = $mediaOwner->password;
        if (!Hash::check($request->previous_password, $hashedPassword)) {
            return redirect()->route('MOSettings')->withErrors('Entered previous password is not matching the current password');
        }
        $mediaOwner->update([
            'password' => Hash::make($request->password),
        ]);
        $mediaOwner->save();
        return redirect()->route('MOSettings')->with('message', 'Your password has been updated successfully');
    }

}
