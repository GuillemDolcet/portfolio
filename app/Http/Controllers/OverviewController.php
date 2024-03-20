<?php

namespace App\Http\Controllers;

use App\Repositories\Education;
use App\Repositories\Experiences;
use App\Repositories\Faqs;
use App\Repositories\Languages;
use App\Repositories\PersonalInfo;
use App\Repositories\Projects;
use App\Repositories\Sections;
use App\Repositories\Services;
use App\Repositories\Skills;
use App\Repositories\Testimonials;
use Illuminate\Contracts\Console\Application as ConsoleApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application as FoundationApplication;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use App\Concerns\InteractsWithTurbo;

class OverviewController extends AdminController
{
    use DispatchesJobs;
    use InteractsWithTurbo;

    /**
     * Request instance.
     *
     * @var Request
     */
    protected Request $request;

    /**
     * Skills repository instance.
     *
     * @param Skills $skills
     */
    protected Skills $skills;

    /**
     * Experiences repository instance.
     *
     * @param Experiences $experiences
     */
    protected Experiences $experiences;

    /**
     * Education repository instance.
     *
     * @param Education $education
     */
    protected Education $education;

    /**
     * Projects repository instance.
     *
     * @param Projects $projects
     */
    protected Projects $projects;

    /**
     * Sections repository instance.
     *
     * @param Sections $sections
     */
    protected Sections $sections;

    /**
     * PersonalInfo repository instance.
     *
     * @param PersonalInfo $personalInfo
     */
    protected PersonalInfo $personalInfo;

    /**
     * Services repository instance.
     *
     * @param Services $services
     */
    protected Services $services;

    /**
     * Testimonials repository instance.
     *
     * @param Testimonials $testimonials
     */
    protected Testimonials $testimonials;

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
     * Class constructor.
     *
     * @param Request $request
     * @param Skills $skills
     * @param Experiences $experiences
     * @param Projects $projects
     * @param Education $education
     * @param Sections $sections
     * @param PersonalInfo $personalInfo
     * @param Services $services
     * @param Languages $languages
     * @param Testimonials $testimonials
     * @param Faqs $faqs
     */
    public function __construct(Request $request, Skills $skills, Experiences $experiences, Projects $projects,
                                Education $education, Sections $sections, PersonalInfo $personalInfo, Services $services,
                                Languages $languages, Testimonials $testimonials, Faqs $faqs)
    {
        parent::__construct($request);

        $this->skills = $skills;

        $this->experiences = $experiences;

        $this->education = $education;

        $this->projects = $projects;

        $this->sections = $sections;

        $this->personalInfo = $personalInfo;

        $this->testimonials = $testimonials;

        $this->services = $services;

        $this->faqs = $faqs;

        $this->languages = $languages;
    }

    /**
     * [GET] /admin
     * admin.index
     *
     * Returns the admin view.
     *
     * @return ConsoleApplication|FoundationApplication|View|Factory
     */
    public function index(): ConsoleApplication|FoundationApplication|View|Factory
    {
        $user = current_user();

        $sections = $this->sections->newQuery()->get();

        $skills = $this->skills->newQuery()->orderBy('order')->get();

        $experiences = $this->experiences->newQuery()->orderBy('start_date')->get();

        $projects = $this->projects->newQuery()->orderBy('order')->get();

        $education = $this->education->newQuery()->orderBy('start_date')->get();

        $personalInfo = $this->personalInfo->newQuery()->first();

        $testimonials = $this->testimonials->newQuery()->get();

        $services = $this->services->newQuery()->get();

        $languages = $this->languages->newQuery()->orderByLocale()->get();

        $faqs = $this->faqs->newQuery()->orderBy('order')->get();

        return view('admin.overview.index', compact('user','skills','experiences','projects',
                    'education','sections','personalInfo', 'services', 'testimonials', 'faqs','languages'));
    }
}
