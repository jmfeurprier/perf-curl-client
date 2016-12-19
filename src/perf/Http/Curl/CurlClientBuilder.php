<?php

namespace perf\Http\Curl;

/**
 *
 *
 */
class CurlClientBuilder
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
     * @param CurlWrapperFactory $factory
     * @return CurlClientBuilder Fluent return.
     */
    public function setCurlWrapperFactory(CurlWrapperFactory $factory)
    {
        $this->curlWrapperFactory = $factory;

        return $this;
    }

    /**
     *
     *
     * @return CurlClient
     */
    public function build()
    {
        return new CurlClient($this->getCurlWrapperFactory());
    }

    /**
     *
     *
     * @return CurlWrapperFactory
     */
    private function getCurlWrapperFactory()
    {
        if ($this->curlWrapperFactory) {
            return $this->curlWrapperFactory;
        }

        return new CurlWrapperFactory();
    }
}
