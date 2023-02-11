<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Admin;
use App\Models\Transaction;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('layout.admin_control.dashboard', [
            "ads" => Ad::Has('InReviewAds')->with('InReviewAds')->get()
        ]);
    }

    public function loginPage()
    {
        return view('layout.admin_control.login');
    }

    public function registerPage()
    {
        return view('layout.admin_control.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:8|confirmed|string',
        ]);

        $user = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // event(new Registered($user));

        $credentials = $request->only('email', 'password');
        auth()->guard('media_owner')->attempt($credentials, true);

        return redirect()->route('admin.index');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
            return redirect()->route('admin.index');
        }

        return back()->withErrors(["failed" => trans('auth.failed')]);;
    }


    public function charge(Request $request)
    {
        $wallet = Wallet::where('advertiser_id', $request->id)->first();
        $wallet->current_balance += $request->charge_amount;
        $wallet->save();
        $transaction = new Transaction();
        $transaction->transaction_type = $request->type;
        $transaction->amount = $request->charge_amount;
        $transaction->wallet_id = $wallet->id;
        $transaction->created_at = Carbon::now();
        $transaction->updated_at = Carbon::now();
        $transaction->save();
        return redirect()->back();
    }

    public function inbox()
    {
        return view('layout.admin_control.inbox', [
            'user' => Auth::user()
        ]);
    }

    public function subscriptions()
    {
        return view('layout.admin_control.subscriptions', [
            'user' => Auth::user()
        ]);
    }

    public function chargeWallets()
    {
        return view('layout.admin_control.charge-wallet', [
            'user' => Auth::user()
        ]);
    }

    public function wallets()
    {
        return view('layout.admin_control.wallets', [
            'user' => Auth::user()
        ]);
    }

    public function settings()
    {
        return view('layout.admin_control.settings', [
            'user' => Auth::user()
        ]);
    }

    public function getWallets()
    {
        return DB::table('wallets')->join('advertisers', 'wallets.advertiser_id', '=', 'advertisers.id')->get();
    }


}
