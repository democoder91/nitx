<?php

namespace App\Http\Controllers;

use App\Models\Advertiser;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdvertiserController extends Controller
{
    public function dashboard()
    {
        $ads = Advertiser::find(auth()->user()->id)->ads;
        return view("layout.advertiser.dashboard", [
            'ads' => $ads,
        ]);
    }
    public function wallet()
    {
        $wallet = Advertiser::find(auth()->user()->id)->wallet;
        $transactions = $wallet->transactions;
        return view('layout.advertiser.wallet', [
            'wallet' => $wallet,
            'transactions' => $transactions
        ]);
    }

    public function summary()
    {
        return view('layout.advertiser.ad_summary', []);
    }

    public function registerPage()
    {
        return view('layout.advertiser.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:advertisers',
            'password' => 'required|min:8|confirmed|string',
        ]);

        $user = Advertiser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $wallet = Wallet::create([
            'current_balance' => 0,
            'advertiser_id' => $user->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $credentials = $request->only('email', 'password');
        Auth::guard('advertiser')->attempt($credentials, true);
        return redirect()->route('advertiser.dashboard');
    }

    public function loginPage()
    {
        return view('layout.advertiser.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($request->user == 'advertiser') {
            $credentials = $request->only('email', 'password');
            if (Auth::guard('advertiser')->attempt($credentials, $request->remember)) {
                return redirect()->route('advertiser.dashboard');
            }
        }
        return back()->withErrors(["failed" => trans('auth.failed')]);
    }


    public function logout()
    {
        Auth::guard('advertiser')->logout();
        return redirect()->route('index');
    }

    public function getAdvertiser($id)
    {
        return Advertiser::find($id);
    }


}
