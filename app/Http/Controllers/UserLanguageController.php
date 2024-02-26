<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLanguageStoreRequest;
use App\Http\Requests\UserLanguageUpdateRequest;
use App\Models\UserLanguage;
use App\Repositories\UsersLanguages;
use App\Services\Translator;
use DeepL\DeepLException;
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

class UserLanguageController extends AdminController
{
    /**
     * UsersLanguages repository instance.
     *
     * @param UsersLanguages $usersLanguages
     */
    protected UsersLanguages $usersLanguages;

    /**
     * Translator service instance.
     *
     * @param Translator $translator
     */
    protected Translator $translator;

    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct(Request $request, UsersLanguages $usersLanguages, Translator $translator)
    {
        parent::__construct($request);

        $this->usersLanguages = $usersLanguages;

        $this->translator = $translator;
    }

    /**
     * [GET] /admin/users/languages
     * admin.users.languages.index
     *
     * Returns the user languages view.
     *
     * @return ConsoleApplication|FoundationApplication|View|Factory|Response|ResponseFactory
     * @throws BindingResolutionException
     */
    public function index(): ConsoleApplication|FoundationApplication|View|Factory|Response|ResponseFactory
    {
        $userLanguages = $this->usersLanguages->listing($this->usersLanguages->newQuery()->user(current_user())->orderByDesc('level'));
        return view('admin.users.languages.index', compact('userLanguages'));
    }

    /**
     * [GET] /admin/users/languages/create
     * admin.users.languages.create
     *
     * Returns the user language modal stream view for create.
     *
     * @return RedirectResponse|Response|ResponseFactory
     * @throws BindingResolutionException
     */
    public function create(): RedirectResponse|Response|ResponseFactory
    {
        if ($this->wantsTurboStream($this->request)) {
            $userLanguage = $this->usersLanguages->build();
            if (($sess = $this->request->session()) && $sess->hasOldInput()) {
                return $this->renderTurboStream('admin.users.languages.form.modal_stream', compact('userLanguage'));
            }
            return $this->renderTurboStream('admin.users.languages.form.modal_stream', compact('userLanguage'));
        }
        return redirect()->back();
    }

    /**
     * [GET] /admin/users/languages/{userLanguage}/edit
     * admin.users.languages.edit
     *
     * Returns the user language modal stream view for update.
     *
     * @param UserLanguage $userLanguage
     * @return RedirectResponse|Response|ResponseFactory
     * @throws BindingResolutionException
     */
    public function edit(UserLanguage $userLanguage): RedirectResponse|Response|ResponseFactory
    {
        if ($this->wantsTurboStream($this->request)) {
            if (($sess = $this->request->session()) && $sess->hasOldInput()) {
                return $this->renderTurboStream('admin.users.languages.form.modal_stream', compact('userLanguage'));
            }
            return $this->renderTurboStream('admin.users.languages.form.modal_stream', compact('userLanguage'));
        }
        return redirect()->back();
    }

    /**
     * [POST] /admin/users/languages
     * admin.users.languages.store
     *
     * Validate user language form and create user language, then redirect back.
     *
     * @param UserLanguageStoreRequest $request
     * @return RedirectResponse
     * @throws DeepLException
     */
    public function store(UserLanguageStoreRequest $request): RedirectResponse
    {
        if ($attributes = $request->validated()) {
            $attributes = $this->translator->translate($attributes, $this->usersLanguages->build()->getTranslatableAttributes());
            $this->usersLanguages->create($attributes, current_user());
            return redirect()
                ->back()
                ->with([
                    'status' => ['type' => 'success', 'message' => Lang::get('admin.responses.success-create-user-language')]
                ]);
        }
        return redirect()
            ->back()
            ->with([
                'status' => ['type' => 'error', 'message' => Lang::get('admin.responses.error-create-user-language')]
            ]);
    }

    /**
     * [PUT|PATCH] /admin/users/languages/{userLanguage}
     * admin.users.languages.update
     *
     * Validate user language form and update user language
     *
     * @param UserLanguageUpdateRequest $request
     * @param UserLanguage $userLanguage
     * @return RedirectResponse
     * @throws DeepLException
     */
    public function update(UserLanguageUpdateRequest $request, UserLanguage $userLanguage): RedirectResponse
    {
        if ($attributes = $request->validated()) {
            $attributes = $this->translator->translate($attributes, $this->usersLanguages->build()->getTranslatableAttributes());
            $this->usersLanguages->update($userLanguage, $attributes, current_user());
            return redirect()
                ->back()
                ->with([
                    'status' => ['type' => 'success', 'message' => Lang::get('admin.responses.success-update-user-language')]
                ]);
        }
        return redirect()
            ->back()
            ->with([
                'status' => ['type' => 'error', 'message' => Lang::get('admin.responses.error-update-user-language')]
            ]);
    }

    /**
     * [DELETE] /admin/users/languages/{userLanguage}
     * admin.users.languages.destroy
     *
     * Delete user language, then redirect to skills index.
     *
     * @param UserLanguage $userLanguage
     * @return Renderable|RedirectResponse
     */
    public function destroy(UserLanguage $userLanguage): Renderable|RedirectResponse
    {
        $this->usersLanguages->delete($userLanguage);
        return redirect()
            ->back()
            ->with([
                'status' => [
                    'type' => 'success',
                    'message' => Lang::get('admin.responses.delete-user-language')
                ]
            ]);
    }
}
