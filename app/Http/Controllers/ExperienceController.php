<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExperienceRequest;
use App\Models\Experience;
use App\Repositories\Experiences;
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

class ExperienceController extends AdminController
{
    /**
     * Experiences repository instance.
     *
     * @param Experiences $experiences
     */
    protected Experiences $experiences;

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
    public function __construct(Request $request, Experiences $experiences, Skills $skills, Translator $translator)
    {
        parent::__construct($request);

        $this->experiences = $experiences;

        $this->skills = $skills;

        $this->translator = $translator;
    }

    /**
     * [GET] /admin/experiences
     * admin.experiences.index
     *
     * Returns the experiences view.
     *
     * @return ConsoleApplication|FoundationApplication|View|Factory
     */
    public function index(): ConsoleApplication|FoundationApplication|View|Factory
    {
        $experiences = $this->experiences->listing($this->experiences->newQuery()->user(current_user())->orderBy('start_date'));

        return view('admin.experiences.index', compact('experiences'));
    }

    /**
     * [GET] /admin/experiences/create
     * admin.experiences.create
     *
     * Returns the experience modal stream view for create.
     *
     * @return RedirectResponse|Response|ResponseFactory
     * @throws BindingResolutionException
     */
    public function create(): RedirectResponse|Response|ResponseFactory
    {
        if ($this->wantsTurboStream($this->request)) {
            $experience = $this->experiences->build();
            $skills = $this->skills->newQuery()->user(current_user())->orderBy('order')->get();
            if (($sess = $this->request->session()) && $sess->hasOldInput()) {
                return $this->renderTurboStream('admin.experiences.form.modal_stream', compact('experience','skills'));
            }
            return $this->renderTurboStream('admin.experiences.form.modal_stream', compact('experience','skills'));
        }
        return redirect()->route('admin.experiences.index');
    }

    /**
     * [GET] /admin/experiences/{experience}/edit
     * admin.experiences.edit
     *
     * Returns the experience modal stream view for update.
     *
     * @param Experience $experience
     * @return RedirectResponse|Response|ResponseFactory
     * @throws BindingResolutionException
     */
    public function edit(Experience $experience): RedirectResponse|Response|ResponseFactory
    {
        if ($this->wantsTurboStream($this->request)) {
            $skills = $this->skills->newQuery()->user(current_user())->orderBy('order')->get();
            if (($sess = $this->request->session()) && $sess->hasOldInput()) {
                return $this->renderTurboStream('admin.experiences.form.modal_stream', compact('experience','skills'));
            }
            return $this->renderTurboStream('admin.experiences.form.modal_stream', compact('experience','skills'));
        }
        return redirect()->route('admin.experiences.index');
    }

    /**
     * [POST] /admin/experiences
     * admin.experiences.store
     *
     * Validate experience form and create experience, then redirect to experiences index.
     *
     * @param ExperienceRequest $request
     * @return RedirectResponse
     * @throws DeepLException
     */
    public function store(ExperienceRequest $request): RedirectResponse
    {
        if ($attributes = $request->validated()) {
            $attributes = $this->translator->translate($attributes, $this->experiences->build()->getTranslatableAttributes());
            $this->experiences->create($attributes, current_user());
            return redirect()
                ->route('admin.experiences.index')
                ->with([
                    'status' => ['type' => 'success', 'message' => Lang::get('admin.responses.success-create-experience')]
                ]);
        }
        return redirect()
            ->route('admin.experiences.index')
            ->with([
                'status' => ['type' => 'error', 'message' => Lang::get('admin.responses.error-create-experience')]
            ]);
    }

    /**
     * [PUT|PATCH] /admin/experiences/{experience}
     * admin.experiences.update
     *
     * Validate experience form and update experience, then redirect to experiences index.
     *
     * @param ExperienceRequest $request
     * @param Experience $experience
     * @return RedirectResponse
     * @throws DeepLException
     */
    public function update(ExperienceRequest $request, Experience $experience): RedirectResponse
    {
        if ($attributes = $request->validated()) {
            $attributes = $this->translator->translate($attributes, $this->experiences->build()->getTranslatableAttributes());
            $this->experiences->update($experience, $attributes, current_user());
            return redirect()
                ->route('admin.experiences.index')
                ->with([
                    'status' => ['type' => 'success', 'message' => Lang::get('admin.responses.success-update-experience')]
                ]);
        }
        return redirect()
            ->route('admin.experiences.index')
            ->with([
                'status' => ['type' => 'error', 'message' => Lang::get('admin.responses.error-update-experience')]
            ]);
    }

    /**
     * [DELETE] /admin/experiences/{experience}
     * admin.skills.destroy
     *
     * Delete experience, then redirect to experiences index.
     *
     * @param Experience $experience
     * @return Renderable|RedirectResponse
     */
    public function destroy(Experience $experience): Renderable|RedirectResponse
    {
        $experience->delete();
        return redirect()
            ->route('admin.experiences.index')
            ->with([
                'status' => [
                    'type' => 'success',
                    'message' => Lang::get('admin.responses.delete-experience')
                ]
            ]);
    }
}
