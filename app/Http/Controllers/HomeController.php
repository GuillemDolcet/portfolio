<?php

namespace App\Http\Controllers;

use App\Concerns\InteractsWithTurbo;
use App\Models\User;
use App\Repositories\Education;
use App\Repositories\Experiences;
use App\Repositories\Hobbies;
use App\Repositories\Projects;
use App\Repositories\Skills;
use App\Repositories\UsersLanguages;
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
     * Hobbies repository instance.
     *
     * @param Hobbies $hobbies
     */
    protected Hobbies $hobbies;

    /**
     * UsersLanguages repository instance.
     *
     * @param UsersLanguages $usersLanguages
     */
    protected UsersLanguages $usersLanguages;

    /**
     * Class constructor.
     *
     * @param Skills $skills
     * @param Experiences $experiences
     * @param Projects $projects
     * @param Hobbies $hobbies
     * @param Education $education
     * @param UsersLanguages $usersLanguages
     */
    public function __construct(Skills $skills, Experiences $experiences, Projects $projects, Hobbies $hobbies,
                                Education $education, UsersLanguages $usersLanguages)
    {
        $this->skills = $skills;

        $this->experiences = $experiences;

        $this->education = $education;

        $this->projects = $projects;

        $this->hobbies = $hobbies;

        $this->usersLanguages = $usersLanguages;
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

        $skills = $this->skills->newQuery()->user($user)->orderBy('order')->get();

        $experiences = $this->experiences->newQuery()->user($user)->orderBy('start_date', 'DESC')->get();

        $projects = $this->projects->listing($this->projects->newQuery()->user($user)->orderBy('start_date'));

        $hobbies = $this->hobbies->listing($this->hobbies->newQuery()->user($user)->orderBy('order'));

        $education = $this->education->newQuery()->user($user)->orderBy('start_date', 'DESC')->get();

        $userLanguages = $this->usersLanguages->listing($this->usersLanguages->newQuery()->user($user)->orderByDesc('level'));

        return view('home.index', compact('user','skills','experiences','projects','hobbies','education','userLanguages'));
    }
}
