<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionRequest;
use App\Models\Section;
use App\Repositories\Languages;
use App\Repositories\Sections;
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

class SectionController extends AdminController
{
    /**
     * Sections repository instance.
     *
     * @param Sections $sections
     */
    protected Sections $sections;

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
    public function __construct(Request $request, Sections $sections, Translator $translator, Languages $languages)
    {
        parent::__construct($request);

        $this->sections = $sections;

        $this->translator = $translator;

        $this->languages = $languages;
    }

    /**
     * [GET] /admin/sections
     * admin.sections.index
     *
     * Returns the sections view.
     *
     * @return ConsoleApplication|FoundationApplication|View|Factory
     */
    public function index(): ConsoleApplication|FoundationApplication|View|Factory
    {
        $sections = $this->sections->listing($this->sections->newQuery());

        $languages = $this->languages->newQuery()->orderByLocale()->get();

        return view('admin.sections.index', compact('sections','languages'));
    }

    /**
     * [GET] /admin/sections/create
     * admin.sections.create
     *
     * Returns the sections modal stream view for create.
     *
     * @return RedirectResponse|Response|ResponseFactory
     * @throws BindingResolutionException|AuthorizationException
     */
    public function create(): RedirectResponse|Response|ResponseFactory
    {
        $this->authorize('create', Section::class);

        if ($this->wantsTurboStream($this->request)) {
            $section = $this->sections->build();
            $languages = $this->languages->newQuery()->orderByLocale()->get();
            if (($sess = $this->request->session()) && $sess->hasOldInput()) {
                return $this->renderTurboStream('admin.sections.form.modal_stream', compact('section','languages'));
            }
            return $this->renderTurboStream('admin.sections.form.modal_stream', compact('section','languages'));
        }
        return redirect()->back();
    }

    /**
     * [GET] /admin/sections/{section}/edit
     * admin.sections.edit
     *
     * Returns the section modal stream view for update.
     *
     * @param Section $section
     * @return RedirectResponse|Response|ResponseFactory
     * @throws BindingResolutionException|AuthorizationException
     */
    public function edit(Section $section): RedirectResponse|Response|ResponseFactory
    {
        $this->authorize('edit', $section);

        if ($this->wantsTurboStream($this->request)) {
            $languages = $this->languages->newQuery()->orderByLocale()->get();
            if (($sess = $this->request->session()) && $sess->hasOldInput()) {
                return $this->renderTurboStream('admin.sections.form.modal_stream', compact('section','languages'));
            }
            return $this->renderTurboStream('admin.sections.form.modal_stream', compact('section','languages'));
        }
        return redirect()->back();
    }

    /**
     * [POST] /admin/sections
     * admin.sections.store
     *
     * Validate section form and create project, then redirect to sections index.
     *
     * @param SectionRequest $request
     * @return RedirectResponse
     * @throws DeepLException
     */
    public function store(SectionRequest $request): RedirectResponse
    {
        if ($attributes = $request->validated()) {
            $attributes = $this->translator->translate($attributes, $this->sections->build()->getTranslatableAttributes());
            $this->sections->create($attributes);
            return redirect()
                ->back()
                ->with([
                    'status' => ['type' => 'success', 'message' => Lang::get('admin.responses.success-create-section')]
                ]);
        }
        return redirect()
            ->back()
            ->with([
                'status' => ['type' => 'error', 'message' => Lang::get('admin.responses.error-create-section')]
            ]);
    }

    /**
     * [PUT|PATCH] /admin/sections/{section}
     * admin.sections.update
     *
     * Validate section form and update project, then redirect to sections index.
     *
     * @param SectionRequest $request
     * @param Section $section
     * @return RedirectResponse
     * @throws DeepLException
     */
    public function update(SectionRequest $request, Section $section): RedirectResponse
    {
        if ($attributes = $request->validated()) {
            $attributes = $this->translator->translate($attributes, $this->sections->build()->getTranslatableAttributes());
            $this->sections->update($section, $attributes);
            return redirect()
                ->back()
                ->with([
                    'status' => ['type' => 'success', 'message' => Lang::get('admin.responses.success-update-section')]
                ]);
        }
        return redirect()
            ->back()
            ->with([
                'status' => ['type' => 'error', 'message' => Lang::get('admin.responses.error-update-section')]
            ]);
    }

    /**
     * [DELETE] /admin/projects/{project}
     * admin.projects.destroy
     *
     * Delete section, then redirect to sections index.
     *
     * @param Section $section
     * @return Renderable|RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(Section $section): Renderable|RedirectResponse
    {
        $this->authorize('delete', $section);

        $section->delete();
        return redirect()
            ->back()
            ->with([
                'status' => [
                    'type' => 'success',
                    'message' => Lang::get('admin.responses.delete-section')
                ]
            ]);
    }
}
