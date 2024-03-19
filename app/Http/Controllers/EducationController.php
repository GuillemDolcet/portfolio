<?php

namespace App\Http\Controllers;

use App\Http\Requests\EducationRequest;
use App\Models\Education as EducationModel;
use App\Repositories\Education;
use App\Repositories\Languages;
use App\Repositories\Skills;
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

class EducationController extends AdminController
{
    /**
     * Education repository instance.
     *
     * @param Education $education
     */
    protected Education $education;

    /**
     * Skills repository instance.
     *
     * @param Skills $skills
     */
    protected Skills $skills;

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
    public function __construct(Request $request, Education $education, Skills $skills, Translator $translator,
                                Languages $languages)
    {
        parent::__construct($request);

        $this->education = $education;

        $this->skills = $skills;

        $this->languages = $languages;

        $this->translator = $translator;
    }

    /**
     * [GET] /admin/education
     * admin.education.index
     *
     * Returns the education view.
     *
     * @return ConsoleApplication|FoundationApplication|View|Factory
     */
    public function index(): ConsoleApplication|FoundationApplication|View|Factory
    {
        $education = $this->education->listing($this->education->newQuery()->orderBy('start_date'));

        $languages = $this->languages->newQuery()->orderByLocale()->get();

        return view('admin.education.index', compact('education', 'languages'));
    }

    /**
     * [GET] /admin/education/create
     * admin.education.create
     *
     * Returns the education modal stream view for create.
     *
     * @return RedirectResponse|Response|ResponseFactory
     * @throws BindingResolutionException|AuthorizationException
     */
    public function create(): RedirectResponse|Response|ResponseFactory
    {
        $this->authorize('create', Education::class);

        if ($this->wantsTurboStream($this->request)) {
            $education = $this->education->build();
            $skills = $this->skills->newQuery()->orderBy('order')->get();
            $languages = $this->languages->newQuery()->orderByLocale()->get();
            if (($sess = $this->request->session()) && $sess->hasOldInput()) {
                return $this->renderTurboStream('admin.education.form.modal_stream', compact('education','skills', 'languages'));
            }
            return $this->renderTurboStream('admin.education.form.modal_stream', compact('education','skills', 'languages'));
        }
        return redirect()->back();
    }

    /**
     * [GET] /admin/education/{education}/edit
     * admin.education.edit
     *
     * Returns the education modal stream view for update.
     *
     * @param EducationModel $education
     * @return RedirectResponse|Response|ResponseFactory
     * @throws BindingResolutionException|AuthorizationException
     */
    public function edit(EducationModel $education): RedirectResponse|Response|ResponseFactory
    {
        $this->authorize('edit', $education);

        if ($this->wantsTurboStream($this->request)) {
            $skills = $this->skills->newQuery()->orderBy('order')->get();
            $languages = $this->languages->newQuery()->orderByLocale()->get();
            if (($sess = $this->request->session()) && $sess->hasOldInput()) {
                return $this->renderTurboStream('admin.education.form.modal_stream', compact('education','skills', 'languages'));
            }
            return $this->renderTurboStream('admin.education.form.modal_stream', compact('education','skills', 'languages'));
        }
        return redirect()->back();
    }

    /**
     * [POST] /admin/education
     * admin.education.store
     *
     * Validate education form and create education, then redirect to education index.
     *
     * @param EducationRequest $request
     * @return RedirectResponse
     * @throws DeepLException
     */
    public function store(EducationRequest $request): RedirectResponse
    {
        if ($attributes = $request->validated()) {
            $attributes = $this->translator->translate($attributes, $this->education->build()->getTranslatableAttributes());
            $this->education->create($attributes);
            return redirect()
                ->back()
                ->with([
                    'status' => ['type' => 'success', 'message' => Lang::get('admin.responses.success-create-education')]
                ]);
        }
        return redirect()
            ->back()
            ->with([
                'status' => ['type' => 'error', 'message' => Lang::get('admin.responses.error-create-education')]
            ]);
    }

    /**
     * [PUT|PATCH] /admin/education/{education}
     * admin.education.update
     *
     * Validate education form and update education, then redirect to education index.
     *
     * @param EducationRequest $request
     * @param EducationModel $education
     * @return RedirectResponse
     * @throws DeepLException
     */
    public function update(EducationRequest $request, EducationModel $education): RedirectResponse
    {
        if ($attributes = $request->validated()) {
            $attributes = $this->translator->translate($attributes, $this->education->build()->getTranslatableAttributes());
            $this->education->update($education, $attributes);
            return redirect()
                ->back()
                ->with([
                    'status' => ['type' => 'success', 'message' => Lang::get('admin.responses.success-update-education')]
                ]);
        }
        return redirect()
            ->back()
            ->with([
                'status' => ['type' => 'error', 'message' => Lang::get('admin.responses.error-update-education')]
            ]);
    }

    /**
     * [DELETE] /admin/education/{education}
     * admin.education.destroy
     *
     * Delete education, then redirect to education index.
     *
     * @param EducationModel $education
     * @return Renderable|RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(EducationModel $education): Renderable|RedirectResponse
    {
        $this->authorize('delete', $education);

        $education->delete();

        return redirect()
            ->back()
            ->with([
                'status' => [
                    'type' => 'success',
                    'message' => Lang::get('admin.responses.delete-education')
                ]
            ]);
    }
}
