<?php

namespace App\Http\Controllers;

use App\Http\Requests\EducationStoreRequest;
use App\Http\Requests\EducationUpdateRequest;
use App\Models\Education as EducationModel;
use App\Repositories\Education;
use App\Repositories\Skills;
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
    public function __construct(Request $request, Education $education, Skills $skills, Translator $translator)
    {
        parent::__construct($request);

        $this->education = $education;

        $this->skills = $skills;

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
        $education = $this->education->listing($this->education->newQuery()->user(current_user())->orderBy('start_date'));

        return view('admin.education.index', compact('education'));
    }

    /**
     * [GET] /admin/education/create
     * admin.education.create
     *
     * Returns the education modal stream view for create.
     *
     * @return RedirectResponse|Response|ResponseFactory
     * @throws BindingResolutionException
     */
    public function create(): RedirectResponse|Response|ResponseFactory
    {
        if ($this->wantsTurboStream($this->request)) {
            $education = $this->education->build();
            $skills = $this->skills->newQuery()->user(current_user())->orderBy('order')->get();
            if (($sess = $this->request->session()) && $sess->hasOldInput()) {
                return $this->renderTurboStream('admin.education.form.modal_stream', compact('education','skills'));
            }
            return $this->renderTurboStream('admin.education.form.modal_stream', compact('education','skills'));
        }
        return redirect()->route('admin.education.index');
    }

    /**
     * [GET] /admin/education/{education}/edit
     * admin.education.edit
     *
     * Returns the education modal stream view for update.
     *
     * @param EducationModel $education
     * @return RedirectResponse|Response|ResponseFactory
     * @throws BindingResolutionException
     */
    public function edit(EducationModel $education): RedirectResponse|Response|ResponseFactory
    {
        if ($this->wantsTurboStream($this->request)) {
            $skills = $this->skills->newQuery()->user(current_user())->orderBy('order')->get();
            if (($sess = $this->request->session()) && $sess->hasOldInput()) {
                return $this->renderTurboStream('admin.education.form.modal_stream', compact('education','skills'));
            }
            return $this->renderTurboStream('admin.education.form.modal_stream', compact('education','skills'));
        }
        return redirect()->route('admin.education.index');
    }

    /**
     * [POST] /admin/experiences
     * admin.experiences.store
     *
     * Validate experience form and create experience, then redirect to experiences index.
     *
     * @param EducationStoreRequest $request
     * @return RedirectResponse
     * @throws DeepLException
     */
    public function store(EducationStoreRequest $request): RedirectResponse
    {
        if ($attributes = $request->validated()) {
            $attributes = $this->translator->translate($attributes, $this->education->build()->getTranslatableAttributes());
            $this->education->create($attributes, current_user());
            return redirect()
                ->route('admin.education.index')
                ->with([
                    'status' => ['type' => 'success', 'message' => Lang::get('admin.responses.success-create-education')]
                ]);
        }
        return redirect()
            ->route('admin.education.index')
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
     * @param EducationUpdateRequest $request
     * @param EducationModel $education
     * @return RedirectResponse
     * @throws DeepLException
     */
    public function update(EducationUpdateRequest $request, EducationModel $education): RedirectResponse
    {
        if ($attributes = $request->validated()) {
            $attributes = $this->translator->translate($attributes, $this->education->build()->getTranslatableAttributes());
            $this->education->update($education, $attributes, current_user());
            return redirect()
                ->route('admin.education.index')
                ->with([
                    'status' => ['type' => 'success', 'message' => Lang::get('admin.responses.success-update-education')]
                ]);
        }
        return redirect()
            ->route('admin.education.index')
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
     */
    public function destroy(EducationModel $education): Renderable|RedirectResponse
    {
        $education->delete();
        return redirect()
            ->route('admin.education.index')
            ->with([
                'status' => [
                    'type' => 'success',
                    'message' => Lang::get('admin.responses.delete-education')
                ]
            ]);
    }
}
