<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        $user = $request->user();

        return [
            ...parent::share($request),
            'flash' => [
                'status' => fn() => $request->session()->get('status'),
            ],
            'auth' => $user ? [
                'user' => array_merge($user->toArray(), [
                    'profile_photo_url' => $user->profile_photo_url,
                    'two_factor_enabled' => $user->two_factor_secret !== null,
                    'two_factor_confirmed' => $user->two_factor_confirmed_at !== null,
                ]),
            ] : null,
        ];
    }
}
