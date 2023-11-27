<?php

namespace App\View\Components;

use Illuminate\Contracts\Console\Application as ConsoleApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application as FoundationApplication;
use Illuminate\View\Component;

class Icon extends Component
{
    /**
     * Icon class.
     *
     * @var string
     */
    public string $icon;

    /**
     * Width (px).
     *
     * @var int
     */
    public int $width;

    /**
     * Height (px).
     *
     * @var int
     */
    public int $height;

    /**
     * View box coordinates.
     *
     * @var string
     */
    public string $viewBox;

    /**
     * Fill color.
     *
     * @var string
     */
    public string $fill;

    /**
     * Stroke color.
     *
     * @var string
     */
    public string $stroke;

    /**
     * Stroke width.
     *
     * @var int
     */
    public int $strokeWidth;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $icon, int $width = 24, int $height = 24, string $viewBox = '0 0 24 24', string $fill = 'none', string $stroke = 'currentColor', int $strokeWidth = 2)
    {
        $this->icon = $icon;
        $this->width = $width;
        $this->height = $height;
        $this->viewBox = $viewBox;
        $this->fill = $fill;
        $this->stroke = $stroke;
        $this->strokeWidth = $strokeWidth;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return ConsoleApplication|FoundationApplication|View|Factory
     */
    public function render(): ConsoleApplication|FoundationApplication|View|Factory
    {
        return view('components.icon');
    }
}
