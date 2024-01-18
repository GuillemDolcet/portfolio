<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Repositories\Users;
use Illuminate\Contracts\Console\Application as ConsoleApplication;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application as FoundationApplication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Facades\Lang;
use Spatie\Permission\Models\Role;

class UserController extends AdminController
{
    /**
     * Users repository instance.
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
     * admin.users.index
     *
     * Returns the users view.
     *
     * @return ConsoleApplication|FoundationApplication|View|Factory
     */
    public function index(): ConsoleApplication|FoundationApplication|View|Factory
    {
        $users = $this->users->listing($this->users->newQuery());
        return view('admin.users.index', compact('users'));
    }

    /**
     * [GET] /admin/users/create
     * admin.users.create
     *
     * Returns the user modal stream view for create.
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
                return $this->renderTurboStream('admin.users.form.modal_stream', compact('user', 'roles'));
            }
            return $this->renderTurboStream('admin.users.form.modal_stream', compact('user', 'roles'));
        }
        return redirect()->back();
    }

    /**
     * [GET] /admin/users/{user}/edit
     * admin.users.edit
     *
     * Returns the user modal stream view for update.
     *
     * @param User $user
     * @return RedirectResponse|Response|ResponseFactory
     * @throws BindingResolutionException
     */
    public function edit(User $user): RedirectResponse|Response|ResponseFactory
    {
        if ($this->wantsTurboStream($this->request)) {
            $roles = Role::all();
            if (($sess = $this->request->session()) && $sess->hasOldInput()) {
                return $this->renderTurboStream('admin.users.form.modal_stream', compact('user', 'roles'));
            }
            return $this->renderTurboStream('admin.users.form.modal_stream', compact('user', 'roles'));
        }
        return redirect()->back();
    }

    /**
     * [POST] /admin/users
     * admin.users.store
     *
     * Validate user form and create user, then redirect to users index.
     *
     * @param UserStoreRequest $request
     * @return RedirectResponse
     */
    public function store(UserStoreRequest $request): RedirectResponse
    {
        if ($this->users->create($request->validated())) {
            return redirect()
                ->back()
                ->with([
                    'status' => ['type' => 'success', 'message' => Lang::get('admin.responses.success-create-user')]
                ]);
        }
        return redirect()
            ->back()
            ->with([
                'status' => ['type' => 'error', 'message' => Lang::get('admin.responses.error-create-user')]
            ]);
    }

    /**
     * [PUT|PATCH] /admin/users/{user}
     * admin.users.update
     *
     * Validate user form and update user, then redirect to users index.
     *
     * @param UserUpdateRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
        if ($this->users->update($user, $request->validated())) {
            return redirect()
                ->back()
                ->with([
                    'status' => ['type' => 'success', 'message' => Lang::get('admin.responses.success-update-user')]
                ]);
        }
        return redirect()
            ->back()
            ->with([
                'status' => ['type' => 'error', 'message' => Lang::get('admin.responses.error-update-user')]
            ]);
    }

    /**
     * [DELETE] /admin/users/{user}
     * admin.users.destroy
     *
     * Delete user, then redirect to users index.
     *
     * @param User $user
     * @return Renderable|RedirectResponse
     */
    public function destroy(User $user): Renderable|RedirectResponse
    {
        $user->delete();
        return redirect()
            ->back()
            ->with([
                'status' => [
                    'type' => 'success',
                    'message' => Lang::get('admin.responses.delete-user')
                ]
            ]);
    }
}
