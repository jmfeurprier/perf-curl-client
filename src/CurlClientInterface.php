<?php

namespace perf\CurlClient;

use CURLFile;
use perf\CurlClient\Exception\CurlExecutionException;

interface CurlClientInterface
{
    public function createFile(
        string $filename,
        string $mimeType = '',
        string $postFilename = ''
    ): CURLFile;

    /**
     * @param {int:mixed} $options
     *
     * @return CurlExecutionResult
     *
     * @throws CurlExecutionException
     */
    public function execute(array $options): CurlExecutionResult;
}
