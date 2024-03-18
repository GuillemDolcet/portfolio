<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestimonialStoreRequest;
use App\Http\Requests\TestimonialUpdateRequest;
use App\Models\Testimonial;
use App\Repositories\Languages;
use App\Repositories\Testimonials;
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

class TestimonialController extends AdminController
{
    /**
     * Testimonials repository instance.
     *
     * @param Testimonials $testimonials
     */
    protected Testimonials $testimonials;

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
    public function __construct(Request $request, Testimonials $testimonials, Translator $translator, Languages $languages)
    {
        parent::__construct($request);

        $this->testimonials = $testimonials;

        $this->languages = $languages;

        $this->translator = $translator;
    }

    /**
     * [GET] /admin/testimonials
     * admin.testimonials.index
     *
     * Returns the testimonials view.
     *
     * @return ConsoleApplication|FoundationApplication|View|Factory|Response|ResponseFactory
     */
    public function index(): ConsoleApplication|FoundationApplication|View|Factory|Response|ResponseFactory
    {
        $testimonials = $this->testimonials->listing($this->testimonials->newQuery());

        $languages = $this->languages->newQuery()->orderByLocale()->get();

        return view('admin.testimonials.index', compact('testimonials', 'languages'));
    }

    /**
     * [GET] /admin/testimonials/create
     * admin.testimonials.create
     *
     * Returns the testimonial modal stream view for create.
     *
     * @return RedirectResponse|Response|ResponseFactory
     * @throws BindingResolutionException
     */
    public function create(): RedirectResponse|Response|ResponseFactory
    {
        if ($this->wantsTurboStream($this->request)) {
            $testimonial = $this->testimonials->build();
            $languages = $this->languages->newQuery()->orderByLocale()->get();
            if (($sess = $this->request->session()) && $sess->hasOldInput()) {
                return $this->renderTurboStream('admin.testimonials.form.modal_stream', compact('testimonial','languages'));
            }
            return $this->renderTurboStream('admin.testimonials.form.modal_stream', compact('testimonial','languages'));
        }
        return redirect()->back();
    }

    /**
     * [GET] /admin/testimonials/{testimonial}/edit
     * admin.testimonials.edit
     *
     * Returns the testimonial modal stream view for update.
     *
     * @param Testimonial $testimonial
     * @return RedirectResponse|Response|ResponseFactory
     * @throws BindingResolutionException
     */
    public function edit(Testimonial $testimonial): RedirectResponse|Response|ResponseFactory
    {
        if ($this->wantsTurboStream($this->request)) {
            $languages = $this->languages->newQuery()->orderByLocale()->get();
            if (($sess = $this->request->session()) && $sess->hasOldInput()) {
                return $this->renderTurboStream('admin.testimonials.form.modal_stream', compact('testimonial','languages'));
            }
            return $this->renderTurboStream('admin.testimonials.form.modal_stream', compact('testimonial','languages'));
        }
        return redirect()->back();
    }

    /**
     * [POST] /admin/testimonials
     * admin.testimonials.store
     *
     * Validate testimonial form and create testimonial, then redirect to testimonials index.
     *
     * @param TestimonialStoreRequest $request
     * @return RedirectResponse
     * @throws DeepLException
     */
    public function store(TestimonialStoreRequest $request): RedirectResponse
    {
        if ($attributes = $request->validated()) {
            $attributes = $this->translator->translate($attributes, $this->testimonials->build()->getTranslatableAttributes());
            $this->testimonials->create($attributes);
            return redirect()
                ->back()
                ->with([
                    'status' => ['type' => 'success', 'message' => Lang::get('admin.responses.success-create-testimonial')]
                ]);
        }
        return redirect()
            ->back()
            ->with([
                'status' => ['type' => 'error', 'message' => Lang::get('admin.responses.error-create-testimonial')]
            ]);
    }

    /**
     * [PUT|PATCH] /admin/testimonials/{testimonial}
     * admin.testimonials.update
     *
     * Validate testimonial form and update testimonial, then redirect to testimonials index.
     *
     * @param TestimonialUpdateRequest $request
     * @param Testimonial $testimonial
     * @return RedirectResponse
     * @throws DeepLException
     */
    public function update(TestimonialUpdateRequest $request, Testimonial $testimonial): RedirectResponse
    {
        if ($attributes = $request->validated()) {
            $attributes = $this->translator->translate($attributes, $this->testimonials->build()->getTranslatableAttributes());
            $this->testimonials->update($testimonial, $attributes);
            return redirect()
                ->back()
                ->with([
                    'status' => ['type' => 'success', 'message' => Lang::get('admin.responses.success-update-testimonial')]
                ]);
        }
        return redirect()
            ->back()
            ->with([
                'status' => ['type' => 'error', 'message' => Lang::get('admin.responses.error-update-testimonial')]
            ]);
    }

    /**
     * [DELETE] /admin/testimonials/{testimonial}
     * admin.testimonials.destroy
     *
     * Delete Testimonial, then redirect to testimonials index.
     *
     * @param Testimonial $testimonial
     * @return Renderable|RedirectResponse
     */
    public function destroy(Testimonial $testimonial): Renderable|RedirectResponse
    {
        $this->testimonials->delete($testimonial);
        return redirect()
            ->back()
            ->with([
                'status' => [
                    'type' => 'success',
                    'message' => Lang::get('admin.responses.delete-testimonial')
                ]
            ]);
    }
}
