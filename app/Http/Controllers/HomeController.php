<?php

namespace App\Http\Controllers;

use App\Concerns\InteractsWithTurbo;
use App\Models\User;
use App\Repositories\Education;
use App\Repositories\Experiences;
use App\Repositories\Projects;
use App\Repositories\Skills;
use Illuminate\Contracts\Console\Application as ConsoleApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application as FoundationApplication;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;

class HomeController
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
     * Class constructor.
     *
     * @param Skills $skills
     * @param Experiences $experiences
     * @param Projects $projects
     * @param Education $education
     */
    public function __construct(Skills $skills, Experiences $experiences, Projects $projects, Education $education)
    {
        $this->skills = $skills;

        $this->experiences = $experiences;

        $this->education = $education;

        $this->projects = $projects;
    }

    /**
     * [GET] /
     * home
     *
     * @return ConsoleApplication|FoundationApplication|View|Factory
     */
    public function index(): ConsoleApplication|FoundationApplication|View|Factory
    {
        $user = User::query()->first();

        $skills = $this->skills->newQuery()->orderBy('order')->get();

        $experiences = $this->experiences->newQuery()->orderBy('start_date', 'DESC')->get();

        $projects = $this->projects->listing($this->projects->newQuery()->orderBy('start_date'));

        $education = $this->education->newQuery()->orderBy('start_date', 'DESC')->get();

        return view('home.index', compact('user','skills','experiences','projects','education'));
    }
}
