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
            // If user is already authenticated, link the social account
            if (Auth::check()) {
                return $this->linkSocialAccount(Auth::user(), $provider, $socialUser);
            }
            
            // Check if user already exists with this social provider
            $existingSocialUser = User::where([
                'provider' => $provider,
                'provider_id' => $socialUser->getId()
            ])->first();
            
            if ($existingSocialUser) {
                // User exists with this social provider, log them in
                $existingSocialUser->provider_token = $socialUser->token;
                $existingSocialUser->save();
                
                Auth::login($existingSocialUser);
                return redirect()->route('dashboard');
            }
            
            // Check if email is already used by another account
            $existingUser = User::where('email', $socialUser->getEmail())->first();
            
            if ($existingUser) {
                // Email exists but with different provider or username/password
                if ($existingUser->provider && $existingUser->provider !== $provider) {
                    return redirect()->route('login')->withErrors([
                        'email' => 'Cet email est déjà associé à un compte ' . $existingUser->provider
                    ]);
                } else if (!$existingUser->provider) {
                    return redirect()->route('login')->withErrors([
                        'email' => 'Cet email utilise une autre méthode de connexion (nom d\'utilisateur/mot de passe)'
                    ]);
                }
            }
            
            // Create new user account
            $user = User::create([
                'name' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
                'provider' => $provider,
                'provider_id' => $socialUser->getId(),
                'provider_token' => $socialUser->token,
                'email_verified_at' => now(),
                'profile_photo_path' => $socialUser->getAvatar(),
            ]);

            Auth::login($user);
            return redirect()->route('dashboard');
            
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors([
                'email' => 'Une erreur est survenue lors de la connexion'
            ]);
        }
    }
    
    /**
     * Link a social account to an existing authenticated user
     */
    private function linkSocialAccount(User $user, string $provider, $socialUser)
    {
        // Check if this social account is already linked to another user
        $existingSocialUser = User::where([
            'provider' => $provider,
            'provider_id' => $socialUser->getId()
        ])->first();
        
        if ($existingSocialUser && $existingSocialUser->id !== $user->id) {
            return redirect()->route('user.profile.index')->withErrors([
                'social' => 'Ce compte ' . $provider . ' est déjà lié à un autre utilisateur'
            ]);
        }
        
        // Check if user already has this provider linked
        if ($user->provider === $provider) {
            return redirect()->route('user.profile.index')->withErrors([
                'social' => 'Ce compte ' . $provider . ' est déjà lié à votre profil'
            ]);
        }
        
        // Update user with social provider information
        $user->update([
            'provider' => $provider,
            'provider_id' => $socialUser->getId(),
            'provider_token' => $socialUser->token,
        ]);
        
        return redirect()->route('user.profile.index')->with('success', 
            'Compte ' . $provider . ' lié avec succès à votre profil'
        );
    }
}
