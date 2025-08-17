<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
class SocialProviderController extends Controller
{
    //

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider, Request $request)
    {
        $socialUser = Socialite::driver($provider)->user();
  
     
        try {
           
            if (User::where([['email', '=', $socialUser->getEmail()], ['provider', null]])->exists()) {
                return redirect()->route('login')->withErrors(['email' => 'Cet email utilise une autre méthode de connexion']);
            }
          
            $user = User::where([
                'provider' => $provider,
                'provider_id' => $socialUser->getId()
            ])->first();
   
            if (!$user) {
                $user = User::create([
                    'name' => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'provider' => $provider,
                    'provider_id' => $socialUser->getId(),
                    'provider_token' => $socialUser->token,
                    'email_verified_at' => now(),
                    'avatar' => $socialUser->getAvatar(),
                ]);
            } else {

                $user->provider_token = $socialUser->token;
                $user->save();
            }


            Auth::login($user);

            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors(['email' => 'Une erreur est survenue lors de la connexion']);
        }
    }
}
