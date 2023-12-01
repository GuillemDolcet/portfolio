<?php

namespace App\Http\Controllers;

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
     * Class constructor.
     *
     * @param Request $request
     * @param Skills $skills
     */
    public function __construct(Request $request, Skills $skills)
    {
        parent::__construct($request);


        $this->skills = $skills;
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
        $skills = $this->skills->newQuery()->user(current_user())->orderBy('order')->get();
        return view('admin.index', compact('user','skills'));
    }
}
