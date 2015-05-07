<?php

namespace perf\Http\Curl;

/**
 *
 *
 */
class CurlExecuterBuilder
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
     * @return CurlExecuterBuilder Fluent return.
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

        return new CurlExecuter($curlWrapperFactory);
    }
}
