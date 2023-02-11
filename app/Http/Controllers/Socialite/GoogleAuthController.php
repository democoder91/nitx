<?php


namespace App\Http\Controllers\Socialite;

use App\Models\MediaOwner;
use Exception;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller

{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $isUser = MediaOwner::where('google_id', $user->id)->first();
            if ($isUser) {
                Auth::login($isUser);
            } else {
                $newUser = MediaOwner::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('123456dummy')
                ]);
                Auth::login($newUser);
            }
            return redirect()->route('MODashboard')
                ->withSuccess('Signed in');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
