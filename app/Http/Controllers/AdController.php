<?php

namespace App\Http\Controllers;

use App\Events\ScreenAds;
use App\Jobs\sendMailForAdmins;
use App\Mail\ads\ApprovedAd;
use App\Mail\ads\RejectAd;
use App\Mail\ads\Summary;
use App\Models\Ad;
use App\Models\Category;
use App\Models\Screen;
use App\Models\ScreenCounter;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Pion\Laravel\ChunkUpload\Exceptions\UploadFailedException;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;


class AdController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'ad_file' => 'required',
            'from' => 'required',
            'to' => 'required',
        ]);
        $wallet = Wallet::where('advertiser_id', Auth::user()->id)->first();
        if ($wallet->current_balance < $request->totalPrice) {
            return response()->json([
                'error' => "You don't have enough money in your balance"
            ], 404);
        }
        $wallet->current_balance -= $request->totalPrice;
        $ad = Ad::create([
            "name" => $request->name,
            "orientation" => $request->orientation,
            "path" => $request->ad_file,
            "headline" => $request->headline,
            "url" => $request->url,
            "advertiser_id" => Auth::user()->id,
            "type" => $request->ad_type
        ]);
        $transaction = new Transaction();
        $transaction->transaction_type = "payment";
        $transaction->amount = $request->totalPrice;
        $transaction->wallet_id = Wallet::where('advertiser_id', Auth::user()->id)->first()->id;
        $wallet->save();
        $transaction->save();
        $ad->categories()->attach($request->category);
        $ad->screens()->attach($request->screen, array('status' => 'InReview', "from" => $request->from, "to" => $request->to));
        Mail::to($ad->advertiser->email)->send(new Summary($ad));
        sendMailForAdmins::dispatch();
        return redirect()->route('advertiser.dashboard');
    }

    public function create()
    {
        return view('layout.advertiser.ad_create', [
            "categories" => Category::all()
        ]);
    }

    public function approveAd(Request $request)
    {
        $today = date('Y-m-d');
        $ad = Ad::find($request->ad_id);
        foreach ($ad->screens as $screen) {
            Screen::find($screen->id)->ads()->updateExistingPivot($request->ad_id, ["status" => "Active"]);
            event(new ScreenAds($screen->id, Screen::find($screen->id)->ads()->wherePivot("status", "Active")->wherePivot('from', '<=', $today)->wherePivot('to', '>=', $today)->get()));
        }
        foreach ($ad->screens as $screen) {
            ScreenCounter::createNewAd($screen->id, $ad->screens[0]->pivot->from, $ad->screens[0]->pivot->to);
        }
        Mail::to($ad->advertiser->email)->send(new ApprovedAd($ad));
        return redirect()->back();
    }

    public function rejectAd(Request $request)
    {
        $ad = Ad::find($request->ad_id);
        foreach ($ad->screens as $screen) {
            Screen::find($screen->id)->ads()->updateExistingPivot($request->ad_id, ["status" => "Rejected"]);
        }
        $ad = Ad::find($request->ad_id);
        Mail::to($ad->advertiser->email)->send(new RejectAd($ad, $request->reason));
        return redirect()->back();
    }

    public function uploadVideo(Request $request)
    {
        try {
            $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));
        } catch (UploadFailedException $e) {
        }

        if (!empty($receiver)) {
            if (!$receiver->isUploaded()) {
            }
        }

        $fileReceived = $receiver->receive();

        if ($fileReceived->isFinished()) {
            $file = $fileReceived->getFile();
            $extension = $file->getClientOriginalExtension();
            $fileName = str_replace('.' . $extension, '', $file->getClientOriginalName()); //file name without extenstion
            $fileName .= '_' . md5(time()) . '.' . $extension; // a unique file name
            $fileName = str_replace(' ', '-', $fileName);
            $disk = Storage::disk(config('filesystems.default'));
            $path = $disk->putFileAs('files', $file, $fileName);
            unlink($file->getPathname());
            return [
                'path' => asset('storage/' . $path),
                'filename' => $fileName,
                'extension' => $extension
            ];
        }
        $handler = $fileReceived->handler();
        return [
            'done' => $handler->getPercentageDone(),
            'status' => true
        ];
    }
}

