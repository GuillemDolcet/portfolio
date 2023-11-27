<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Contracts\Console\Application as ConsoleApplication;
use Illuminate\Foundation\Application as FoundationApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class SessionsController extends Controller
{
    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('destroy');
        $this->middleware('auth')->only('destroy');
    }

    /**
     * [GET] /auth/login
     * auth.login
     *
     * Returns the login view.
     *
     * @return ConsoleApplication|FoundationApplication|View|Factory
     */
    public function create(): ConsoleApplication|FoundationApplication|View|Factory
    {
        return view('auth.login');
    }

    /**
     * [POST] /auth/login
     * auth.authenticate
     *
     * Handle an authentication attempt.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('admin.home');
        }

        return redirect()
            ->route('auth.login')
            ->with([
                'status' => ['type' => 'error', 'message' => 'Incorrect user']
            ]);
    }

    /**
     * [DELETE] /auth/logout
     * auth.logout
     *
     * Logs the customer out.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->to(RouteServiceProvider::HOME);
    }
}
