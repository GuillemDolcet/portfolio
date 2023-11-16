<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkillStoreRequest;
use App\Http\Requests\SkillUpdateRequest;
use App\Models\Experience;
use App\Repositories\Experiences;
use App\Repositories\Skills;
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
     * Experiences repository instance
     *
     * @param Experiences $experiences
     */
    protected Experiences $experiences;

    /**
     * Skills repository instance
     *
     * @param Skills $experiences
     */
    protected Skills $skills;

    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct(Request $request, Experiences $experiences, Skills $skills)
    {
        parent::__construct($request);

        $this->experiences = $experiences;

        $this->skills = $skills;
    }

    /**
     * [GET] /admin/experiences
     * admin.experiences.index
     *
     * @return ConsoleApplication|FoundationApplication|View|Factory
     */
    public function index(): ConsoleApplication|FoundationApplication|View|Factory
    {
        $experiences = $this->experiences->listing($this->experiences->newQuery()->user(current_user())->orderBy('order'));

        return view('admin.experiences.index', compact('experiences'));
    }

    /**
     * [GET] /admin/experiences/create
     * admin.experiences.create
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
     * @param SkillStoreRequest $request
     * @return RedirectResponse
     */
    public function store(SkillStoreRequest $request): RedirectResponse
    {
        if ($this->experiences->create($request->validated(), current_user())) {
            return redirect()
                ->route('admin.experiences.index')
                ->with([
                    'status' => ['type' => 'success', 'message' => Lang::get('admin.responses.success-create-skill')]
                ]);
        }
        return redirect()
            ->route('admin.experiences.index')
            ->with([
                'status' => ['type' => 'error', 'message' => Lang::get('admin.responses.error-create-skill')]
            ]);
    }

    /**
     * [PUT|PATCH] /admin/experiences/{experience}
     * admin.experiences.update
     *
     * @param SkillUpdateRequest $request
     * @param Experience $experience
     * @return RedirectResponse
     */
    public function update(SkillUpdateRequest $request, Experience $experience): RedirectResponse
    {
        if ($this->experiences->update($experience, $request->validated(), current_user())) {
            return redirect()
                ->route('admin.experiences.index')
                ->with([
                    'status' => ['type' => 'success', 'message' => Lang::get('admin.responses.success-update-skill')]
                ]);
        }
        return redirect()
            ->route('admin.experiences.index')
            ->with([
                'status' => ['type' => 'error', 'message' => Lang::get('admin.responses.error-update-skill')]
            ]);
    }

    /**
     * [DELETE] /admin/experiences/{experience}
     * admin.skills.destroy
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
                    'message' => Lang::get('admin.responses.delete-skill')
                ]
            ]);
    }
}
