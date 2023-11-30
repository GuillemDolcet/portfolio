<?php

namespace App\Http\Controllers\Auth;

use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Repositories\Users;
use App\Support\Arr;
use App\Support\Str;

class GoogleController extends Controller
{
    /**
     * Users repository instance.
     *
     * @var Users
     */
    protected Users $users;

    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct(Users $users)
    {
        $this->middleware('guest');

        $this->users = $users;
    }

    /**
     * Redirects to google auth.
     *
     * @return RedirectResponse
     */
    public function redirectToGoogle(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handles google authentication
     *
     * @return RedirectResponse
     */
    public function handleGoogleCallback(): RedirectResponse
    {
        try {
            $oauth = Socialite::driver('google')->user();

            if ($user = $this->users->findByEmail($oauth->getEmail())) {
                return $user->isActive()
                    ? $this->success($user, $oauth)
                    : $this->failure('Su cuenta de usuario ha sido <b class="fw-bold">suspendida</b>.');
            } else {
                $this->users->create([
                    'name' => $oauth->getName(),
                    'google_auth_id' => $oauth->getId(),
                    'avatar' => $oauth->getAvatar()
                ]);
            }

            return $this->failure('<b class="fw-bold">No se reconoce</b> su cuenta de usuario.');
        } catch (Exception $e) {
            Log::error('Error authenticating customer via google', ['message' => $e->getMessage(), 'exception' => $e]);
            return $this->failure();
        }
    }

    /**
     * Authentication success response
     *
     * @param User $user
     * @param \Laravel\Socialite\Contracts\User|null $oauth
     * @return RedirectResponse
     */
    public function success(User $user, \Laravel\Socialite\Contracts\User $oauth = null): RedirectResponse
    {
        if (!is_null($oauth)) {
            $attrs = Arr::compact([
                'name' => $oauth->getName(),
                'google_auth_id' => $oauth->getId(),
                'avatar' => $oauth->getAvatar()
            ]);

            $this->users->update($user, $attrs);
        }

        Auth::guard()->login($user, true);

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Authentication failure response.
     *
     * @param string|null $message
     * @return RedirectResponse
     */
    public function failure(string $message = null): RedirectResponse
    {
        $message = $message ?: 'Ocurrió un error con la <b class="fw-bold">comprobación de su cuenta</b> de usuario. Reintente en unos minutos.';

        return redirect()->route('auth.login')->with('status', ['type' => 'error', 'message' => $message]);
    }
}
