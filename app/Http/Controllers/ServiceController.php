<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use App\Repositories\Languages;
use App\Repositories\Services;
use App\Services\Translator;
use DeepL\DeepLException;
use Illuminate\Auth\Access\AuthorizationException;
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

class ServiceController extends AdminController
{
    /**
     * Services repository instance.
     *
     * @param Services $services
     */
    protected Services $services;

    /**
     * Languages repository instance.
     *
     * @param Languages $languages
     */
    protected Languages $languages;

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
    public function __construct(Request $request, Services $services, Translator $translator, Languages $languages)
    {
        parent::__construct($request);

        $this->services = $services;

        $this->translator = $translator;

        $this->languages = $languages;
    }

    /**
     * [GET] /admin/services
     * admin.services.index
     *
     * Returns the experiences view.
     *
     * @return ConsoleApplication|FoundationApplication|View|Factory
     */
    public function index(): ConsoleApplication|FoundationApplication|View|Factory
    {
        $services = $this->services->listing($this->services->newQuery()->orderBy('order'));

        return view('admin.services.index', compact('services'));
    }

    /**
     * [GET] /admin/services/create
     * admin.services.create
     *
     * Returns the service modal stream view for create.
     *
     * @return RedirectResponse|Response|ResponseFactory
     * @throws BindingResolutionException|AuthorizationException
     */
    public function create(): RedirectResponse|Response|ResponseFactory
    {
        $this->authorize('create', Service::class);

        if ($this->wantsTurboStream($this->request)) {
            $service = $this->services->build();
            if (($sess = $this->request->session()) && $sess->hasOldInput()) {
                return $this->renderTurboStream('admin.services.form.modal_stream', compact('service'));
            }
            return $this->renderTurboStream('admin.services.form.modal_stream', compact('service'));
        }
        return redirect()->back();
    }

    /**
     * [GET] /admin/services/{service}/edit
     * admin.services.edit
     *
     * Returns the service modal stream view for update.
     *
     * @param Service $service
     * @return RedirectResponse|Response|ResponseFactory
     * @throws BindingResolutionException|AuthorizationException
     */
    public function edit(Service $service): RedirectResponse|Response|ResponseFactory
    {
        $this->authorize('edit', $service);

        if ($this->wantsTurboStream($this->request)) {
            if (($sess = $this->request->session()) && $sess->hasOldInput()) {
                return $this->renderTurboStream('admin.services.form.modal_stream', compact('service'));
            }
            return $this->renderTurboStream('admin.services.form.modal_stream', compact('service'));
        }
        return redirect()->back();
    }

    /**
     * [POST] /admin/services
     * admin.services.store
     *
     * Validate service form and create services
     *
     * @param ServiceRequest $request
     * @return RedirectResponse
     * @throws DeepLException
     */
    public function store(ServiceRequest $request): RedirectResponse
    {
        if ($attributes = $request->validated()) {
            $attributes = $this->translator->translate($attributes, $this->services->build()->getTranslatableAttributes());
            $this->services->create($attributes);
            return redirect()
                ->back()
                ->with([
                    'status' => ['type' => 'success', 'message' => Lang::get('admin.responses.success-create-service')]
                ]);
        }
        return redirect()
            ->back()
            ->with([
                'status' => ['type' => 'error', 'message' => Lang::get('admin.responses.error-create-service')]
            ]);
    }

    /**
     * [PUT|PATCH] /admin/services/{service}
     * admin.services.update
     *
     * Validate service form and update experience, then redirect to services index.
     *
     * @param ServiceRequest $request
     * @param Service $service
     * @return RedirectResponse
     * @throws DeepLException
     */
    public function update(ServiceRequest $request, Service $service): RedirectResponse
    {
        if ($attributes = $request->validated()) {
            $attributes = $this->translator->translate($attributes, $this->services->build()->getTranslatableAttributes());
            $this->services->update($service, $attributes);
            return redirect()
                ->back()
                ->with([
                    'status' => ['type' => 'success', 'message' => Lang::get('admin.responses.success-update-service')]
                ]);
        }
        return redirect()
            ->back()
            ->with([
                'status' => ['type' => 'error', 'message' => Lang::get('admin.responses.error-update-service')]
            ]);
    }

    /**
     * [DELETE] /admin/services/{service}
     * admin.skills.destroy
     *
     * Delete service, then redirect to services index.
     *
     * @param Service $service
     * @return Renderable|RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(Service $service): Renderable|RedirectResponse
    {
        $this->authorize('delete', $service);

        $this->services->delete($service);

        return redirect()
            ->back()
            ->with([
                'status' => [
                    'type' => 'success',
                    'message' => Lang::get('admin.responses.delete-service')
                ]
            ]);
    }
}
