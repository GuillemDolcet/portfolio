<?php

namespace App\Concerns\Contracts;

interface RespondsJson
{
    /**
     * Return a successful response with the supplied payload.
     *
     * @param  mixed                    $data
     * @param  array                    $options
     * @return \Illuminate\Http\JsonResponse
     */
    public function ok($data = null, array $options = []);

    /**
     * Return an error response with the supplied payload.
     *
     * @param  mixed                    $data
     * @param  array                    $options
     * @return \Illuminate\Http\JsonResponse
     */
    public function error($data = null, array $options = []);

    /**
     * Return a failure response with the supplied message.
     *
     * @param  mixed                    $message
     * @param  array                    $options
     * @return \Illuminate\Http\JsonResponse
     */
    public function failure($message = null, array $options = []);
}
