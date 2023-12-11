<?php

namespace App\Http\Controllers;

use App\Http\Requests\HobbyStoreRequest;
use App\Http\Requests\HobbyUpdateRequest;
use App\Models\Hobby;
use App\Repositories\Hobbies;
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

class HobbyController extends AdminController
{
    /**
     * Hobbies repository instance.
     *
     * @param Hobbies $hobbies
     */
    protected Hobbies $hobbies;

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
    public function __construct(Request $request, Hobbies $hobbies, Translator $translator)
    {
        parent::__construct($request);

        $this->hobbies = $hobbies;

        $this->translator = $translator;
    }

    /**
     * [GET] /admin/hobbies
     * admin.hobbies.index
     *
     * Returns the hobbies view.
     *
     * @return ConsoleApplication|FoundationApplication|View|Factory
     */
    public function index(): ConsoleApplication|FoundationApplication|View|Factory
    {
        $hobbies = $this->hobbies->listing($this->hobbies->newQuery()->user(current_user())->orderBy('order'));

        return view('admin.hobbies.index', compact('hobbies'));
    }

    /**
     * [GET] /admin/hobbies/create
     * admin.hobbies.create
     *
     * Returns the hobbies modal stream view for create.
     *
     * @return RedirectResponse|Response|ResponseFactory
     * @throws BindingResolutionException
     */
    public function create(): RedirectResponse|Response|ResponseFactory
    {
        if ($this->wantsTurboStream($this->request)) {
            $hobby = $this->hobbies->build();
            if (($sess = $this->request->session()) && $sess->hasOldInput()) {
                return $this->renderTurboStream('admin.hobbies.form.modal_stream', compact('hobby'));
            }
            return $this->renderTurboStream('admin.hobbies.form.modal_stream', compact('hobby'));
        }
        return redirect()->route('admin.hobbies.index');
    }

    /**
     * [GET] /admin/hobbies/{hobby}/edit
     * admin.hobbies.edit
     *
     * Returns the hobbies modal stream view for update.
     *
     * @param Hobby $hobby
     * @return RedirectResponse|Response|ResponseFactory
     * @throws BindingResolutionException
     */
    public function edit(Hobby $hobby): RedirectResponse|Response|ResponseFactory
    {
        if ($this->wantsTurboStream($this->request)) {
            if (($sess = $this->request->session()) && $sess->hasOldInput()) {
                return $this->renderTurboStream('admin.hobbies.form.modal_stream', compact('hobby'));
            }
            return $this->renderTurboStream('admin.hobbies.form.modal_stream', compact('hobby'));
        }
        return redirect()->route('admin.hobbies.index');
    }

    /**
     * [POST] /admin/hobbies
     * admin.hobbies.store
     *
     * Validate hobbies form and create hobbies, then redirect to hobbies index.
     *
     * @param HobbyStoreRequest $request
     * @return RedirectResponse
     * @throws DeepLException
     */
    public function store(HobbyStoreRequest $request): RedirectResponse
    {
        if ($attributes = $request->validated()) {
            $attributes = $this->translator->translate($attributes, $this->hobbies->build()->getTranslatableAttributes());
            $this->hobbies->create($attributes, current_user());
            return redirect()
                ->route('admin.hobbies.index')
                ->with([
                    'status' => ['type' => 'success', 'message' => Lang::get('admin.responses.success-create-hobby')]
                ]);
        }
        return redirect()
            ->route('admin.hobbies.index')
            ->with([
                'status' => ['type' => 'error', 'message' => Lang::get('admin.responses.error-create-hobby')]
            ]);
    }

    /**
     * [PUT|PATCH] /admin/hobbies/{hobby}
     * admin.hobbies.update
     *
     * Validate hobbies form and update hobbies, then redirect to hobbies index.
     *
     * @param HobbyUpdateRequest $request
     * @param Hobby $hobby
     * @return RedirectResponse
     * @throws DeepLException
     */
    public function update(HobbyUpdateRequest $request, Hobby $hobby): RedirectResponse
    {
        if ($attributes = $request->validated()) {
            $attributes = $this->translator->translate($attributes, $this->hobbies->build()->getTranslatableAttributes());
            $this->hobbies->update($hobby, $attributes, current_user());
            return redirect()
                ->route('admin.hobbies.index')
                ->with([
                    'status' => ['type' => 'success', 'message' => Lang::get('admin.responses.success-update-hobby')]
                ]);
        }
        return redirect()
            ->route('admin.hobbies.index')
            ->with([
                'status' => ['type' => 'error', 'message' => Lang::get('admin.responses.error-update-hobby')]
            ]);
    }

    /**
     * [DELETE] /admin/hobbies/{hobby}
     * admin.hobbies.destroy
     *
     * Delete hobby, then redirect to hobbies index.
     *
     * @param Hobby $hobby
     * @return Renderable|RedirectResponse
     */
    public function destroy(Hobby $hobby): Renderable|RedirectResponse
    {
        $this->hobbies->delete($hobby);
        return redirect()
            ->route('admin.hobbies.index')
            ->with([
                'status' => [
                    'type' => 'success',
                    'message' => Lang::get('admin.responses.delete-hobby')
                ]
            ]);
    }
}
