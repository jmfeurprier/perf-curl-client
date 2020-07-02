<?php

namespace perf\CurlClient;

use perf\CurlClient\Wrapper\CurlWrapperFactory;
use perf\CurlClient\Wrapper\CurlWrapperFactoryInterface;

class CurlClientBuilder
{
    private CurlWrapperFactoryInterface $curlWrapperFactory;

    public function setCurlWrapperFactory(CurlWrapperFactoryInterface $factory): self
    {
        $this->curlWrapperFactory = $factory;

        return $this;
    }

    public function build(): CurlClientInterface
    {
        return new CurlClient($this->getCurlWrapperFactory());
    }

    private function getCurlWrapperFactory(): CurlWrapperFactoryInterface
    {
        return $this->curlWrapperFactory ?? new CurlWrapperFactory();
    }
}
