<?php

namespace perf\CurlClient;

use perf\CurlClient\Wrapper\CurlWrapperFactoryInterface;
use PHPUnit\Framework\TestCase;

class CurlClientBuilderTest extends TestCase
{
    private CurlClientBuilder $curlClientBuilder;

    protected function setUp(): void
    {
        $this->curlClientBuilder = new CurlClientBuilder();
    }

    public function testBuild()
    {
        $result = $this->curlClientBuilder->build();

        $this->assertInstanceOf(CurlClient::class, $result);
    }

    public function testBuildWithCurlWrapperFactory()
    {
        $curlWrapperFactory = $this->createMock(CurlWrapperFactoryInterface::class);

        $this->curlClientBuilder->setCurlWrapperFactory($curlWrapperFactory);

        $result = $this->curlClientBuilder->build();

        $this->assertInstanceOf(CurlClient::class, $result);
    }
}
