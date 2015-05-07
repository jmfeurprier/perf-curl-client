<?php

namespace perf\Http\Curl;

/**
 *
 *
 */
class CurlExecuter
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
     * @return CurlExecuter
     */
    public static function createDefault()
    {
        return self::createBuilder()->build();
    }

    /**
     *
     *
     * @return CurlExecuterBuilder
     */
    public static function createBuilder()
    {
        return new CurlExecuterBuilder();
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
