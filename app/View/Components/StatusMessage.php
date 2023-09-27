<?php

namespace App\View\Components;

use Illuminate\Contracts\Console\Application as ConsoleApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application as FoundationApplication;
use Illuminate\Session\SessionManager;
use Illuminate\View\Component;

class StatusMessage extends Component
{
    /**
     * Status type.
     *
     * @var string|null
     */
    public ?string $type;

    /**
     * Status message.
     *
     * @var string|null
     */
    public ?string $message;

    /**
     * Message title.
     *
     * @var string|null
     */
    public ?string $title;

    /**
     * Alert component class.
     *
     * @var string|null
     */
    public ?string $alertClass;

    /**
     * Icon class.
     *
     * @var string|null
     */
    public ?string $iconClass;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = null, $message = null, $title = null, $icon = null, $alertClass = null)
    {
        $this->type = $type;

        $this->message = $message;

        $this->title = $title;

        $this->iconClass = $icon;

        $this->alertClass = $alertClass;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return string|ConsoleApplication|FoundationApplication|View|Factory
     */
    public function render(): string|ConsoleApplication|FoundationApplication|View|Factory
    {
        $this->message = $this->message ?: $this->extractMessageFromSession();

        if ($this->message) {
            $this->type = $this->type ?: $this->extractTypeFromSession();

            $this->alertClass = $this->getAlertClass();

            $this->iconClass = $this->getIconClass();

            $this->title = $this->title ?: $this->getDefaultTitle();

            return view('components.status-message');
        }

        return '';
    }

    /**
     * Application session instance.
     *
     * @return SessionManager
     */
    public function session(): SessionManager
    {
        return app('session');
    }

    /**
     * Extracts alert type from session (if available).
     *
     * @return string|null
     */
    public function extractTypeFromSession(): string|null
    {
        if (!$this->session()->has('status')) {
            return null;
        }

        return (string) $this->session()->get('status.type');
    }

    /**
     * Extracts message from session (if available)
     *
     * @return string|null
     */
    public function extractMessageFromSession(): string|null
    {
        if (!$this->session()->has('status')) {
            return null;
        }

        return (string) $this->session()->get('status.message');
    }

    /**
     * Returns the alert class name.
     *
     * @return string
     */
    public function getAlertClass(): string
    {
        return match ($this->type) {
            'info', 'information' => 'alert-info',
            'warn', 'warning' => 'alert-warning',
            'danger', 'error', 'critical', 'failure', 'fail' => 'alert-danger',
            'success', 'ok' => 'alert-success',
            default => "alert-$this->type",
        };
    }

    /**
     * Returns the alert icon class/type.
     *
     * @return string|null
     */
    public function getIconClass(): string|null
    {
        $iconClass = trim((string) $this->iconClass);

        if ($iconClass !== '') {
            return $iconClass;
        }

        return match ($this->type) {
            'info', 'information' => 'info-circle',
            'warn', 'warning' => 'alert-triangle',
            'danger', 'error', 'critical', 'failure', 'fail' => 'alert-circle',
            'success', 'ok' => 'circle-check',
            default => null,
        };
    }

    /**
     * Returns the alert default title.
     *
     * @return string|null
     */
    public function getDefaultTitle(): string|null
    {
        return match ($this->type) {
            'info', 'information' => 'You know?',
            'warn', 'warning' => 'Something went wrong',
            'danger', 'error', 'critical', 'failure', 'fail' => 'Error',
            'success', 'ok' => 'Success',
            default => null,
        };
    }
}
