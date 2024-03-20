<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use App\Concerns\InteractsWithTurbo;

class AdminController extends Controller
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
     * Class constructor.
     *
     * @param Request $request
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}
