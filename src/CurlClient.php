<?php

namespace perf\CurlClient;

use CURLFile;
use perf\CurlClient\Exception\CurlExecutionException;
use perf\CurlClient\Wrapper\CurlWrapperFactoryInterface;

class CurlClient implements CurlClientInterface
{
    private CurlWrapperFactoryInterface $curlWrapperFactory;

    public static function createDefault(): CurlClientInterface
    {
        return static::createBuilder()->build();
    }

    public static function createBuilder(): CurlClientBuilder
    {
        return new CurlClientBuilder();
    }

    public function __construct(CurlWrapperFactoryInterface $curlWrapperFactory)
    {
        $this->curlWrapperFactory = $curlWrapperFactory;
    }

    public function createFile(string $filename, string $mimeType = '', string $postFilename = ''): CURLFile
    {
        return new CURLFile($filename, $mimeType, $postFilename);
    }

    /**
     * @param {int:mixed} $options
     *
     * @return CurlExecutionResult
     *
     * @throws CurlExecutionException
     */
    public function execute(array $options): CurlExecutionResult
    {
        $curlWrapper = $this->curlWrapperFactory->create();

        if (!$curlWrapper->setOptions($options)) {
            throw new CurlExecutionException($curlWrapper);
        }

        $responseContent = $curlWrapper->execute();

        if (false === $responseContent) {
            throw new CurlExecutionException($curlWrapper);
        }

        return new CurlExecutionResult($responseContent, $curlWrapper);
    }
}
