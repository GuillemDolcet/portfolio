<?php

namespace App\Http\Controllers;

use App\Http\Requests\FaqRequest;
use App\Models\Faq;
use App\Repositories\Faqs;
use App\Repositories\Languages;
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

class FaqController extends AdminController
{
    /**
     * Faqs repository instance.
     *
     * @param Faqs $faqs
     */
    protected Faqs $faqs;

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
    public function __construct(Request $request, Faqs $faqs, Translator $translator, Languages $languages)
    {
        parent::__construct($request);

        $this->faqs = $faqs;

        $this->languages = $languages;

        $this->translator = $translator;
    }

    /**
     * [GET] /admin/faqs
     * admin.faqs.index
     *
     * Returns the faqs view.
     *
     * @return ConsoleApplication|FoundationApplication|View|Factory|Response|ResponseFactory
     */
    public function index(): ConsoleApplication|FoundationApplication|View|Factory|Response|ResponseFactory
    {
        $faqs = $this->faqs->listing($this->faqs->newQuery()->orderBy('order'));

        $languages = $this->languages->newQuery()->orderByLocale()->get();

        return view('admin.faqs.index', compact('faqs', 'languages'));
    }

    /**
     * [GET] /admin/faqs/create
     * admin.faqs.create
     *
     * Returns the faq modal stream view for create.
     *
     * @return RedirectResponse|Response|ResponseFactory
     * @throws BindingResolutionException|AuthorizationException
     */
    public function create(): RedirectResponse|Response|ResponseFactory
    {
        $this->authorize('create', Faq::class);

        if ($this->wantsTurboStream($this->request)) {
            $faq = $this->faqs->build();
            $languages = $this->languages->newQuery()->orderByLocale()->get();
            if (($sess = $this->request->session()) && $sess->hasOldInput()) {
                return $this->renderTurboStream('admin.faqs.form.modal_stream', compact('faq','languages'));
            }
            return $this->renderTurboStream('admin.faqs.form.modal_stream', compact('faq','languages'));
        }
        return redirect()->back();
    }

    /**
     * [GET] /admin/faqs/{faq}/edit
     * admin.faqs.edit
     *
     * Returns the faq modal stream view for update.
     *
     * @param Faq $faq
     * @return RedirectResponse|Response|ResponseFactory
     * @throws BindingResolutionException|AuthorizationException
     */
    public function edit(Faq $faq): RedirectResponse|Response|ResponseFactory
    {
        $this->authorize('edit', $faq);

        if ($this->wantsTurboStream($this->request)) {
            $languages = $this->languages->newQuery()->orderByLocale()->get();
            if (($sess = $this->request->session()) && $sess->hasOldInput()) {
                return $this->renderTurboStream('admin.faqs.form.modal_stream', compact('faq','languages'));
            }
            return $this->renderTurboStream('admin.faqs.form.modal_stream', compact('faq','languages'));
        }
        return redirect()->back();
    }

    /**
     * [POST] /admin/faqs
     * admin.faqs.store
     *
     * Validate faq form and create faq, then redirect to faqs index.
     *
     * @param FaqRequest $request
     * @return RedirectResponse
     * @throws DeepLException
     */
    public function store(FaqRequest $request): RedirectResponse
    {
        if ($attributes = $request->validated()) {
            $attributes = $this->translator->translate($attributes, $this->faqs->build()->getTranslatableAttributes());
            $this->faqs->create($attributes);
            return redirect()
                ->back()
                ->with([
                    'status' => ['type' => 'success', 'message' => Lang::get('admin.responses.success-create-faq')]
                ]);
        }
        return redirect()
            ->back()
            ->with([
                'status' => ['type' => 'error', 'message' => Lang::get('admin.responses.error-create-faq')]
            ]);
    }

    /**
     * [PUT|PATCH] /admin/faqs/{faq}
     * admin.faqs.update
     *
     * Validate faq form and update faq, then redirect to faqs index.
     *
     * @param FaqRequest $request
     * @param Faq $faq
     * @return RedirectResponse
     * @throws DeepLException
     */
    public function update(FaqRequest $request, Faq $faq): RedirectResponse
    {
        if ($attributes = $request->validated()) {
            $attributes = $this->translator->translate($attributes, $this->faqs->build()->getTranslatableAttributes());
            $this->faqs->update($faq, $attributes);
            return redirect()
                ->back()
                ->with([
                    'status' => ['type' => 'success', 'message' => Lang::get('admin.responses.success-update-faq')]
                ]);
        }
        return redirect()
            ->back()
            ->with([
                'status' => ['type' => 'error', 'message' => Lang::get('admin.responses.error-update-faq')]
            ]);
    }

    /**
     * [DELETE] /admin/faqs/{faq}
     * admin.faqs.destroy
     *
     * Delete faq, then redirect to faqs index.
     *
     * @param Faq $faq
     * @return Renderable|RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(Faq $faq): Renderable|RedirectResponse
    {
        $this->authorize('delete', $faq);

        $this->faqs->delete($faq);
        return redirect()
            ->back()
            ->with([
                'status' => [
                    'type' => 'success',
                    'message' => Lang::get('admin.responses.delete-faq')
                ]
            ]);
    }
}
