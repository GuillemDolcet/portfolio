<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Requests\UserStoreRequest;
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
use Spatie\Permission\Models\Role;


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
     * [GET] /admin/users
     * admin.users
     *
     * @return ConsoleApplication|FoundationApplication|View|Factory
     */
    public function index(): ConsoleApplication|FoundationApplication|View|Factory
    {
        $users = $this->users->listing($this->users->newQuery());
        return view('admin.users.index', compact('users'));
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
            $roles = Role::all();
            if (($sess = $this->request->session()) && $sess->hasOldInput()) {
                return $this->renderTurboStream('admin.users.form.form_fields_stream', compact('user', 'roles'));
            }
            return $this->renderTurboStream('admin.users.form.modal_stream', compact('user', 'roles'));
        }
        return redirect()->route('admin.users.index');
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
            $roles = Role::all();
            if (($sess = $this->request->session()) && $sess->hasOldInput()) {
                return $this->renderTurboStream('admin.users.form.form_fields_stream', compact('user', 'roles'));
            }
            return $this->renderTurboStream('admin.users.form.modal_stream', compact('user', 'roles'));
        }
        return redirect()->route('admin.users.index');
    }

    /**
     * [POST] /feeds
     * feeds.store
     *
     * @param UserStoreRequest $request
     * @return RedirectResponse
     */
    public function store(UserStoreRequest $request)
    {
        if ($feed = $this->feeds->create($request->validated())) {
            if (!$request->input('action') == 'Guardar'){
                return $this->generate($feed);
            }
            return redirect()
                ->route('admin.users.index')
                ->with([
                    'status' => ['type' => 'success', 'message' => 'User created <b class="text-green">correctly</b>.']
                ]);
        }
        return redirect()
            ->route('admin.users.index')
            ->with([
                'status' => ['type' => 'error', 'message' => 'Error on create user']
            ]);
    }
}
