<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkillStoreRequest;
use App\Http\Requests\SkillUpdateRequest;
use App\Models\Skill;
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

class SkillController extends AdminController
{
    /**
     * Skills repository instance
     *
     * @param Skills $skills
     */
    protected Skills $skills;

    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct(Request $request, Skills $skills)
    {
        parent::__construct($request);

        $this->skills = $skills;
    }

    /**
     * [GET] /admin/skills
     * admin.skills.index
     *
     * @return ConsoleApplication|FoundationApplication|View|Factory
     */
    public function index(): ConsoleApplication|FoundationApplication|View|Factory
    {
        $skills = $this->skills->listing($this->skills->newQuery()->user(current_user())->orderBy('order'));

        return view('admin.skills.index', compact('skills'));
    }

    /**
     * [GET] /admin/skills/create
     * admin.skills.create
     *
     * @return RedirectResponse|Response|ResponseFactory
     * @throws BindingResolutionException
     */
    public function create(): RedirectResponse|Response|ResponseFactory
    {
        if ($this->wantsTurboStream($this->request)) {
            $skill = $this->skills->build();
            if (($sess = $this->request->session()) && $sess->hasOldInput()) {
                return $this->renderTurboStream('admin.skills.form.modal_stream', compact('skill'));
            }
            return $this->renderTurboStream('admin.skills.form.modal_stream', compact('skill'));
        }
        return redirect()->route('admin.skills.index');
    }

    /**
     * [GET] /admin/skills/{skill}/edit
     * admin.skills.edit
     *
     * @param Skill $skill
     * @return RedirectResponse|Response|ResponseFactory
     * @throws BindingResolutionException
     */
    public function edit(Skill $skill): RedirectResponse|Response|ResponseFactory
    {
        if ($this->wantsTurboStream($this->request)) {
            if (($sess = $this->request->session()) && $sess->hasOldInput()) {
                return $this->renderTurboStream('admin.skills.form.modal_stream', compact('skill'));
            }
            return $this->renderTurboStream('admin.skills.form.modal_stream', compact('skill'));
        }
        return redirect()->route('admin.skills.index');
    }

    /**
     * [POST] /admin/skills
     * admin.skills.store
     *
     * @param SkillStoreRequest $request
     * @return RedirectResponse
     */
    public function store(SkillStoreRequest $request): RedirectResponse
    {
        if ($this->skills->create($request->validated(), current_user())) {
            return redirect()
                ->route('admin.skills.index')
                ->with([
                    'status' => ['type' => 'success', 'message' => Lang::get('admin.responses.success-create-skill')]
                ]);
        }
        return redirect()
            ->route('admin.skills.index')
            ->with([
                'status' => ['type' => 'error', 'message' => Lang::get('admin.responses.error-create-skill')]
            ]);
    }

    /**
     * [PUT|PATCH] /admin/skills/{skill}
     * admin.skills.update
     *
     * @param SkillUpdateRequest $request
     * @param Skill $skill
     * @return RedirectResponse
     */
    public function update(SkillUpdateRequest $request, Skill $skill): RedirectResponse
    {
        if ($this->skills->update($skill, $request->validated(), current_user())) {
            return redirect()
                ->route('admin.skills.index')
                ->with([
                    'status' => ['type' => 'success', 'message' => Lang::get('admin.responses.success-update-skill')]
                ]);
        }
        return redirect()
            ->route('admin.skills.index')
            ->with([
                'status' => ['type' => 'error', 'message' => Lang::get('admin.responses.error-update-skill')]
            ]);
    }

    /**
     * [DELETE] /admin/skills/{skill}
     * admin.skills.destroy
     *
     * @param Skill $skill
     * @return Renderable|RedirectResponse
     */
    public function destroy(Skill $skill): Renderable|RedirectResponse
    {
        $this->skills->delete($skill);
        return redirect()
            ->route('admin.skills.index')
            ->with([
                'status' => [
                    'type' => 'success',
                    'message' => Lang::get('admin.responses.delete-skill')
                ]
            ]);
    }
}
