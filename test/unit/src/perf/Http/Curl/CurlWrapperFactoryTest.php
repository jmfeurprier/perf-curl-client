<?php

namespace perf\Http\Curl;

/**
 *
 */
class CurlWrapperFactoryTest extends \PHPUnit_Framework_TestCase
{

    /**
     *
     */
    public function testCreate()
    {
        $factory = new CurlWrapperFactory();

        $result = $factory->create();

        $this->assertInstanceOf('\\perf\\Http\\Curl\\CurlWrapper', $result);
    }
}
