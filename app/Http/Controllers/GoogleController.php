<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function loginWithGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function callbackFromGoogle(){
        try {
            $user = Socialite::driver('google')->user();

            $applicant = User::where('email', $user->email)->first();

            if ($applicant){
                $createUpdateApplicant = User::where('email', $user->email)->update([
                    'google_id' => $user->id,
                    'username' => $user->email,
                ]);

                $createUpdateApplicant = User::where('google_id', $user->id)->first();
            
            } else {
                $createUpdateApplicant = User::create([
                    'email' => $user->email,
                    'username' => $user->email,
                    'password' => uniqid(),
                    'active' => '1',
                    'google_id' => $user->id,
                ]);
            }

            Auth::login($createUpdateApplicant);
            return redirect()->route('home');

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}