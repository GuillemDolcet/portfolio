<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonalInfoRequest;
use App\Repositories\Languages;
use App\Repositories\PersonalInfo;
use App\Services\Translator;
use App\Support\Storage;
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
use App\Models\PersonalInfo as PersonalInfoModel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PersonalInfoController extends AdminController
{
    /**
     * PersonalInfo repository instance.
     *
     * @param PersonalInfo $personalInfo
     */
    protected PersonalInfo $personalInfo;

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
    public function __construct(Request $request, PersonalInfo $personalInfo, Translator $translator, Languages $languages)
    {
        parent::__construct($request);

        $this->personalInfo = $personalInfo;

        $this->languages = $languages;

        $this->translator = $translator;
    }

    /**
     * [GET] /admin/personalInfo
     * admin.personalInfo.index
     *
     * Returns the personalInfo view.
     *
     * @return ConsoleApplication|FoundationApplication|View|Factory
     */
    public function index(): ConsoleApplication|FoundationApplication|View|Factory
    {
        $sections = $this->personalInfo->listing($this->personalInfo->newQuery());

        $languages = $this->languages->newQuery()->orderByLocale()->get();

        return view('admin.personalInfo.index', compact('sections', 'languages'));
    }

    /**
     * [GET] /admin/personalInfo/create
     * admin.personalInfo.create
     *
     * Returns the personalInfo modal stream view for create.
     *
     * @return RedirectResponse|Response|ResponseFactory
     * @throws BindingResolutionException|AuthorizationException
     */
    public function create(): RedirectResponse|Response|ResponseFactory
    {
        $this->authorize('create', PersonalInfoModel::class);

        if ($this->wantsTurboStream($this->request)) {
            $personalInfo = $this->personalInfo->build();
            $languages = $this->languages->newQuery()->orderByLocale()->get();
            if (($sess = $this->request->session()) && $sess->hasOldInput()) {
                return $this->renderTurboStream('admin.personalInfo.form.modal_stream', compact('personalInfo','languages'));
            }
            return $this->renderTurboStream('admin.personalInfo.form.modal_stream', compact('personalInfo','languages'));
        }
        return redirect()->back();
    }

    /**
     * [GET] /admin/personalInfo/{personalInfo}/edit
     * admin.personalInfo.edit
     *
     * Returns the personalInfo modal stream view for update.
     *
     * @param PersonalInfoModel $personalInfo
     * @return RedirectResponse|Response|ResponseFactory
     * @throws BindingResolutionException|AuthorizationException
     */
    public function edit(PersonalInfoModel $personalInfo): RedirectResponse|Response|ResponseFactory
    {
        $this->authorize('edit', $personalInfo);

        if ($this->wantsTurboStream($this->request)) {
            $languages = $this->languages->newQuery()->orderByLocale()->get();
            if (($sess = $this->request->session()) && $sess->hasOldInput()) {
                return $this->renderTurboStream('admin.personalInfo.form.modal_stream', compact('personalInfo','languages'));
            }
            return $this->renderTurboStream('admin.personalInfo.form.modal_stream', compact('personalInfo','languages'));
        }
        return redirect()->back();
    }

    /**
     * [POST] /admin/personalInfo
     * admin.personalInfo.store
     *
     * Validate personalInfo form and create project, then redirect to personalInfo index.
     *
     * @param PersonalInfoRequest $request
     * @return RedirectResponse
     * @throws DeepLException
     */
    public function store(PersonalInfoRequest $request): RedirectResponse
    {
        if ($attributes = $request->validated()) {
            $attributes = $this->translator->translate($attributes, $this->personalInfo->build()->getTranslatableAttributes());
            $this->personalInfo->create($attributes);
            return redirect()
                ->back()
                ->with([
                    'status' => ['type' => 'success', 'message' => Lang::get('admin.responses.success-create-personal-info')]
                ]);
        }
        return redirect()
            ->back()
            ->with([
                'status' => ['type' => 'error', 'message' => Lang::get('admin.responses.error-create-personal-info')]
            ]);
    }

    /**
     * [PUT|PATCH] /admin/personalInfo/{personalInfo}
     * admin.personalInfo.update
     *
     * Validate personalInfo form and update project, then redirect to personalInfo index.
     *
     * @param PersonalInfoRequest $request
     * @param PersonalInfoModel $personalInfo
     * @return RedirectResponse
     * @throws DeepLException
     */
    public function update(PersonalInfoRequest $request, PersonalInfoModel $personalInfo): RedirectResponse
    {
        if ($attributes = $request->validated()) {
            $attributes = $this->translator->translate($attributes, $this->personalInfo->build()->getTranslatableAttributes());
            $this->personalInfo->update($personalInfo, $attributes);
            return redirect()
                ->back()
                ->with([
                    'status' => ['type' => 'success', 'message' => Lang::get('admin.responses.success-update-personal-info')]
                ]);
        }
        return redirect()
            ->back()
            ->with([
                'status' => ['type' => 'error', 'message' => Lang::get('admin.responses.error-update-personal-info')]
            ]);
    }

    /**
     * [DELETE] /admin/personalInfo/{personalInfo}
     * admin.personalInfo.destroy
     *
     * Delete personalInfo, then redirect to personalInfo index.
     *
     * @param PersonalInfoModel $personalInfo
     * @return Renderable|RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(PersonalInfoModel $personalInfo): Renderable|RedirectResponse
    {
        $this->authorize('delete', $personalInfo);

        $this->personalInfo->delete($personalInfo);
        return redirect()
            ->back()
            ->with([
                'status' => [
                    'type' => 'success',
                    'message' => Lang::get('admin.responses.delete-personal-info')
                ]
            ]);
    }

    /**
     * [GET] /personalInfo/{personalInfo}/downloadCv
     * personalInfo.downloadCv
     *
     * Download CV
     *
     * @param PersonalInfoModel $personalInfo
     * @return BinaryFileResponse
     */
    public function downloadCv(PersonalInfoModel $personalInfo): BinaryFileResponse
    {
        return response()->download(public_path(Storage::url($personalInfo->cv)), 'cv.pdf', [
            'Content-Type' => 'application/pdf'
        ]);
    }
}
