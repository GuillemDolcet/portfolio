<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkillRequest;
use App\Models\Skill;
use App\Repositories\Languages;
use App\Repositories\Skills;
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

class SkillController extends AdminController
{
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
     * Class constructor.
     *
     * @return void
     */
    public function __construct(Request $request, Skills $skills, Languages $languages)
    {
        parent::__construct($request);

        $this->skills = $skills;

        $this->languages = $languages;
    }

    /**
     * [GET] /admin/skills
     * admin.skills.index
     *
     * Returns the skills view.
     *
     * @return ConsoleApplication|FoundationApplication|View|Factory|Response|ResponseFactory
     */
    public function index(): ConsoleApplication|FoundationApplication|View|Factory|Response|ResponseFactory
    {
        $skills = $this->skills->listing($this->skills->newQuery()->orderBy('order'));

        $languages = $this->languages->newQuery()->orderByLocale()->get();

        return view('admin.skills.index', compact('skills','languages'));
    }

    /**
     * [GET] /admin/skills/create
     * admin.skills.create
     *
     * Returns the skill modal stream view for create.
     *
     * @return RedirectResponse|Response|ResponseFactory
     * @throws BindingResolutionException|AuthorizationException
     */
    public function create(): RedirectResponse|Response|ResponseFactory
    {
        $this->authorize('create', Skill::class);

        if ($this->wantsTurboStream($this->request)) {
            $skill = $this->skills->build();
            if (($sess = $this->request->session()) && $sess->hasOldInput()) {
                return $this->renderTurboStream('admin.skills.form.modal_stream', compact('skill'));
            }
            return $this->renderTurboStream('admin.skills.form.modal_stream', compact('skill'));
        }
        return redirect()->back();
    }

    /**
     * [GET] /admin/skills/{skill}/edit
     * admin.skills.edit
     *
     * Returns the skill modal stream view for update.
     *
     * @param Skill $skill
     * @return RedirectResponse|Response|ResponseFactory
     * @throws BindingResolutionException|AuthorizationException
     */
    public function edit(Skill $skill): RedirectResponse|Response|ResponseFactory
    {
        $this->authorize('edit', $skill);

        if ($this->wantsTurboStream($this->request)) {
            if (($sess = $this->request->session()) && $sess->hasOldInput()) {
                return $this->renderTurboStream('admin.skills.form.modal_stream', compact('skill'));
            }
            return $this->renderTurboStream('admin.skills.form.modal_stream', compact('skill'));
        }
        return redirect()->back();
    }

    /**
     * [POST] /admin/skills
     * admin.skills.store
     *
     * Validate skill form and create skill, then redirect to skills index.
     *
     * @param SkillRequest $request
     * @return RedirectResponse
     */
    public function store(SkillRequest $request): RedirectResponse
    {
        if ($this->skills->create($request->validated())) {
            return redirect()
                ->back()
                ->with([
                    'status' => ['type' => 'success', 'message' => Lang::get('admin.responses.success-create-skill')]
                ]);
        }
        return redirect()
            ->back()
            ->with([
                'status' => ['type' => 'error', 'message' => Lang::get('admin.responses.error-create-skill')]
            ]);
    }

    /**
     * [PUT|PATCH] /admin/skills/{skill}
     * admin.skills.update
     *
     * Validate skill form and update skill, then redirect to skills index.
     *
     * @param SkillRequest $request
     * @param Skill $skill
     * @return RedirectResponse
     */
    public function update(SkillRequest $request, Skill $skill): RedirectResponse
    {
        if ($this->skills->update($skill, $request->validated())) {
            return redirect()
                ->back()
                ->with([
                    'status' => ['type' => 'success', 'message' => Lang::get('admin.responses.success-update-skill')]
                ]);
        }
        return redirect()
            ->back()
            ->with([
                'status' => ['type' => 'error', 'message' => Lang::get('admin.responses.error-update-skill')]
            ]);
    }

    /**
     * [DELETE] /admin/skills/{skill}
     * admin.skills.destroy
     *
     * Delete skill, then redirect to skills index.
     *
     * @param Skill $skill
     * @return Renderable|RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(Skill $skill): Renderable|RedirectResponse
    {
        $this->authorize('delete', $skill);

        $this->skills->delete($skill);
        return redirect()
            ->back()
            ->with([
                'status' => [
                    'type' => 'success',
                    'message' => Lang::get('admin.responses.delete-skill')
                ]
            ]);
    }
}
