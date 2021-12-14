<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    public function loginWithFacebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFromFacebook(){
        try {
            $user = Socialite::driver('facebook')->user();

            $applicant = User::where('email', $user->email)->first();

            if ($applicant){
                $createUpdateApplicant = User::where('email', $user->email)->update([
                    'facebook_id' => $user->id,
                    'username' => $user->email,
                ]);

                $createUpdateApplicant = User::where('facebook_id', $user->id)->first();

            } else {
                $createUpdateApplicant = User::create([
                    'email' => $user->email,
                    'username' => $user->email,
                    'password' => uniqid(),
                    'active' => '1',
                    'facebook_id' => $user->id,
                ]);
            }

            Auth::login($createUpdateApplicant);
            return redirect()->route('home');

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}