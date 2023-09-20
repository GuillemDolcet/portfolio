<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\Users;
use Illuminate\Contracts\Console\Application as ConsoleApplication;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Foundation\Application as FoundationApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\ResponseFactory;


class UserController extends AdminController
{

    /**
     * Users repository instance
     *
     * @param Users $users
     */
    protected Users $users;

    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct(Request $request, Users $users)
    {
        parent::__construct($request);
        $this->users = $users;
    }

    /**
     * /auth/login
     *
     * @return ConsoleApplication|FoundationApplication|View|Factory
     */
    public function index(): ConsoleApplication|FoundationApplication|View|Factory
    {
        $users = $this->users->listing($this->users->newQuery());
        return view('users.index', compact('users'));
    }

    /**
     * [GET] /users/create
     * users.create
     *
     * @return RedirectResponse|Response|ResponseFactory
     * @throws BindingResolutionException
     */
    public function create(): RedirectResponse|Response|ResponseFactory
    {
        if ($this->wantsTurboStream($this->request)) {
            $user = $this->users->build();
            if (($sess = $this->request->session()) && $sess->hasOldInput()) {
                return $this->renderTurboStream('users.form.form_fields_stream', compact('user'));
            }
            return $this->renderTurboStream('users.form.modal_stream', compact('user'));
        }
        return redirect()->route('home');
    }

    /**
     * [GET] /users/{user}/view
     * users.view
     *
     * @param User $user
     * @return RedirectResponse|Response|ResponseFactory
     * @throws BindingResolutionException
     */
    public function view(User $user): RedirectResponse|Response|ResponseFactory
    {
        if ($this->wantsTurboStream($this->request)) {
            if (($sess = $this->request->session()) && $sess->hasOldInput()) {
                return $this->renderTurboStream('users.form.form_fields_stream', compact('user'));
            }
            return $this->renderTurboStream('feeds.form.modal_stream', compact('user'));
        }
        return redirect()->route('feeds.index');
    }
}
