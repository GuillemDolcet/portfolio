<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Models\Project;
use App\Repositories\Projects;
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

class ProjectController extends AdminController
{
    /**
     * Projects repository instance.
     *
     * @param Projects $projects
     */
    protected Projects $projects;

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
    public function __construct(Request $request, Projects $projects, Skills $skills, Translator $translator)
    {
        parent::__construct($request);

        $this->projects = $projects;

        $this->skills = $skills;

        $this->translator = $translator;
    }

    /**
     * [GET] /admin/projects
     * admin.projects.index
     *
     * Returns the projects view.
     *
     * @return ConsoleApplication|FoundationApplication|View|Factory
     */
    public function index(): ConsoleApplication|FoundationApplication|View|Factory
    {
        $projects = $this->projects->listing($this->projects->newQuery()->user(current_user())->orderBy('start_date'));

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * [GET] /admin/projects/create
     * admin.projects.create
     *
     * Returns the project modal stream view for create.
     *
     * @return RedirectResponse|Response|ResponseFactory
     * @throws BindingResolutionException
     */
    public function create(): RedirectResponse|Response|ResponseFactory
    {
        if ($this->wantsTurboStream($this->request)) {
            $project = $this->projects->build();
            $skills = $this->skills->newQuery()->user(current_user())->orderBy('order')->get();
            if (($sess = $this->request->session()) && $sess->hasOldInput()) {
                return $this->renderTurboStream('admin.projects.form.modal_stream', compact('project','skills'));
            }
            return $this->renderTurboStream('admin.projects.form.modal_stream', compact('project','skills'));
        }
        return redirect()->back();
    }

    /**
     * [GET] /admin/projects/{project}/edit
     * admin.projects.edit
     *
     * Returns the project modal stream view for update.
     *
     * @param Project $project
     * @return RedirectResponse|Response|ResponseFactory
     * @throws BindingResolutionException
     */
    public function edit(Project $project): RedirectResponse|Response|ResponseFactory
    {
        if ($this->wantsTurboStream($this->request)) {
            $skills = $this->skills->newQuery()->user(current_user())->orderBy('order')->get();
            if (($sess = $this->request->session()) && $sess->hasOldInput()) {
                return $this->renderTurboStream('admin.projects.form.modal_stream', compact('project','skills'));
            }
            return $this->renderTurboStream('admin.projects.form.modal_stream', compact('project','skills'));
        }
        return redirect()->back();
    }

    /**
     * [POST] /admin/projects
     * admin.projects.store
     *
     * Validate project form and create project, then redirect to projects index.
     *
     * @param ProjectStoreRequest $request
     * @return RedirectResponse
     * @throws DeepLException
     */
    public function store(ProjectStoreRequest $request): RedirectResponse
    {
        if ($attributes = $request->validated()) {
            $attributes = $this->translator->translate($attributes, $this->projects->build()->getTranslatableAttributes());
            $this->projects->create($attributes, current_user());
            return redirect()
                ->back()
                ->with([
                    'status' => ['type' => 'success', 'message' => Lang::get('admin.responses.success-create-project')]
                ]);
        }
        return redirect()
            ->back()
            ->with([
                'status' => ['type' => 'error', 'message' => Lang::get('admin.responses.error-create-project')]
            ]);
    }

    /**
     * [PUT|PATCH] /admin/projects/{project}
     * admin.projects.update
     *
     * Validate project form and update project, then redirect to projects index.
     *
     * @param ProjectUpdateRequest $request
     * @param Project $project
     * @return RedirectResponse
     * @throws DeepLException
     */
    public function update(ProjectUpdateRequest $request, Project $project): RedirectResponse
    {
        if ($attributes = $request->validated()) {
            $attributes = $this->translator->translate($attributes, $this->projects->build()->getTranslatableAttributes());
            $this->projects->update($project, $attributes, current_user());
            return redirect()
                ->back()
                ->with([
                    'status' => ['type' => 'success', 'message' => Lang::get('admin.responses.success-update-project')]
                ]);
        }
        return redirect()
            ->back()
            ->with([
                'status' => ['type' => 'error', 'message' => Lang::get('admin.responses.error-update-project')]
            ]);
    }

    /**
     * [DELETE] /admin/projects/{project}
     * admin.projects.destroy
     *
     * Delete project, then redirect to projects index.
     *
     * @param Project $project
     * @return Renderable|RedirectResponse
     */
    public function destroy(Project $project): Renderable|RedirectResponse
    {
        $this->projects->delete($project);
        return redirect()
            ->back()
            ->with([
                'status' => [
                    'type' => 'success',
                    'message' => Lang::get('admin.responses.delete-project')
                ]
            ]);
    }
}
