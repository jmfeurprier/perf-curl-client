<?php

namespace perf\Http\Curl;

/**
 *
 *
 */
class CurlClient
{

    /**
     *
     *
     * @var CurlWrapperFactory
     */
    private $curlWrapperFactory;

    /**
     *
     *
     * @return CurlClient
     */
    public static function createDefault()
    {
        return static::createBuilder()->build();
    }

    /**
     *
     *
     * @return CurlClientBuilder
     */
    public static function createBuilder()
    {
        return new CurlClientBuilder();
    }

    /**
     *
     *
     * @param CurlWrapperFactory $curlWrapperFactory
     * @return void
     */
    public function __construct(CurlWrapperFactory $curlWrapperFactory)
    {
        $this->curlWrapperFactory = $curlWrapperFactory;
    }

    /**
     *
     *
     * @param {int:mixed} $options
     * @return CurlExecutionResult
     * @throws CurlExecutionException
     */
    public function execute(array $options)
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
