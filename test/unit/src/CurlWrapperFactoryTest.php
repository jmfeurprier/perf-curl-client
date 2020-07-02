<?php

namespace perf\CurlClient;

use perf\CurlClient\Wrapper\CurlWrapperFactory;
use perf\CurlClient\Wrapper\CurlWrapperFactoryInterface;
use perf\CurlClient\Wrapper\CurlWrapperInterface;
use PHPUnit\Framework\TestCase;

class CurlWrapperFactoryTest extends TestCase
{
    private CurlWrapperFactoryInterface $factory;

    protected function setUp(): void
    {
        $this->factory = new CurlWrapperFactory();
    }

    public function testCreate()
    {
        $result = $this->factory->create();

        $this->assertInstanceOf(CurlWrapperInterface::class, $result);
    }
}
