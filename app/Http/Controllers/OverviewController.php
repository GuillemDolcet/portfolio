<?php

namespace App\Http\Controllers;

use App\Repositories\Experiences;
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
     * Projects repository instance.
     *
     * @param Projects $projects
     */
    protected Projects $projects;

    /**
     * Class constructor.
     *
     * @param Request $request
     * @param Skills $skills
     * @param Experiences $experiences
     * @param Projects $projects
     */
    public function __construct(Request $request, Skills $skills, Experiences $experiences, Projects $projects)
    {
        parent::__construct($request);

        $this->skills = $skills;

        $this->experiences = $experiences;

        $this->projects = $projects;
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
        return view('admin.overview.index', compact('user','skills','experiences', 'projects'));
    }
}
