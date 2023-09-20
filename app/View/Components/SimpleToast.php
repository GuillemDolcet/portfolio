<?php

namespace App\View\Components;

use Illuminate\Contracts\Console\Application as ConsoleApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application as FoundationApplication;
use Illuminate\View\Component;

class SimpleToast extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return ConsoleApplication|FoundationApplication|View|Factory
     */
    public function render(): ConsoleApplication|FoundationApplication|View|Factory
    {
        return view('components.simple-toast');
    }
}
