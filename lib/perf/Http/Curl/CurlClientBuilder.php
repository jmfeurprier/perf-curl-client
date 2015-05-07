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
     * @return HttpClient
     */
    public function build()
    {
        if ($this->curlWrapperFactory) {
            $curlWrapperFactory = $this->curlWrapperFactory;
        } else {
            $curlWrapperFactory = new CurlWrapperFactory();
        }

        return new CurlClient($curlWrapperFactory);
    }
}
