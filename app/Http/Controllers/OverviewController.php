<?php

namespace App\Http\Controllers;

use App\Repositories\Education;
use App\Repositories\Experiences;
use App\Repositories\Hobbies;
use App\Repositories\Projects;
use App\Repositories\Skills;
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
     * Hobbies repository instance.
     *
     * @param Hobbies $hobbies
     */
    protected Hobbies $hobbies;

    /**
     * Class constructor.
     *
     * @param Request $request
     * @param Skills $skills
     * @param Experiences $experiences
     * @param Projects $projects
     * @param Hobbies $hobbies
     * @param Education $education
     */
    public function __construct(Request $request, Skills $skills, Experiences $experiences, Projects $projects, Hobbies $hobbies, Education $education)
    {
        parent::__construct($request);

        $this->skills = $skills;

        $this->experiences = $experiences;

        $this->education = $education;

        $this->projects = $projects;

        $this->hobbies = $hobbies;
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
        $skills = $this->skills->listing($this->skills->newQuery()->user(current_user())->orderBy('order'), ['per_page' => 5]);
        $experiences = $this->experiences->listing($this->experiences->newQuery()->user(current_user())->orderBy('start_date'), ['per_page' => 5]);
        $projects = $this->projects->listing($this->projects->newQuery()->user(current_user())->orderBy('start_date'));
        $hobbies = $this->hobbies->listing($this->hobbies->newQuery()->user(current_user())->orderBy('order'));
        $education = $this->education->listing($this->education->newQuery()->user(current_user())->orderBy('start_date'));
        return view('admin.overview.index', compact('user','skills','experiences', 'projects','hobbies','education'));
    }
}
