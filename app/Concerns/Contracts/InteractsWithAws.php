<?php

namespace App\Concerns\Contracts;

interface InteractsWithAws
{
    /**
     * Get an AWS factory instance.
     *
     * @return \Aws\Sdk
     */
    public function aws();

    /**
     * Return the S3 client instance.
     *
     * @return \Aws\S3\S3Client
     */
    public function s3();
}
