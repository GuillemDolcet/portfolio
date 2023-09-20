<?php

namespace App\Concerns;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Support\Str;
use Illuminate\Http\Response;

trait InteractsWithTurbo
{
    /**
     * Turbo stream format.
     *
     * @var string
     */
    public static string $TURBO_STREAM_FORMAT = 'text/vnd.turbo-stream.html';

    /**
     * Checks if the supplied request is one from 'Turbo'.
     *
     * @param Request|null $request
     * @return boolean
     */
    public function isTurbo(Request $request = null): bool
    {
        $request = $request ?: request();

        return $this->wantsTurboStream($request) || $this->isTurboNative($request);
    }

    /**
     * Checks if the supplied request is one from 'Turbo' native.
     *
     * @param Request $request
     * @return boolean
     */
    public function isTurboNative(Request $request): bool
    {
        return Str::contains($request->userAgent(), 'Turbo Native');
    }

    /**
     * Checks if the request expects a 'Turbo' stream response.
     *
     * @param Request $request
     * @return boolean
     */
    public function wantsTurboStream(Request $request): bool
    {
        return Str::contains($request->header('Accept', ''), static::$TURBO_STREAM_FORMAT);
    }

    /**
     * Return a new response from the application.
     *
     * @param array|string|View|null $content
     * @param int $status
     * @param array $headers
     * @return Response|ResponseFactory
     * @throws BindingResolutionException
     */
    public function makeTurboStream(View|array|string|null $content, int $status = 200, array $headers = []): Response|ResponseFactory
    {
        $headers = array_merge(['Content-Type' => static::$TURBO_STREAM_FORMAT], $headers);

        $factory = app(ResponseFactory::class);

        return $factory->make($content, $status, $headers);
    }

    /**
     * Return a new turbo stream response from the application.
     *
     * @param string $view
     * @param array $data
     * @param int $status
     * @param array $headers
     * @return Response
     * @throws BindingResolutionException
     */
    public function renderTurboStream(string $view, array $data = [], int $status = 200, array $headers = []): Response
    {
        $factory = app(ViewFactory::class);

        return $this->makeTurboStream($factory->make($view, $data), $status, $headers);
    }
}
