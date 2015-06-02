<?php

namespace perf\Http\Curl;

/**
 *
 */
class CurlClientBuilderTest extends \PHPUnit_Framework_TestCase
{

    /**
     *
     */
    public function testBuild()
    {
        $builder = new CurlClientBuilder();

        $result = $builder->build();

        $this->assertInstanceOf('\\perf\\Http\\Curl\\CurlClient', $result);
    }

    /**
     *
     */
    public function testBuildWithCurlWrapperFactory()
    {
        $curlWrapperFactory = $this->getMock('\\perf\\Http\\Curl\\CurlWrapperFactory');

        $builder = new CurlClientBuilder();
        $builder->setCurlWrapperFactory($curlWrapperFactory);

        $result = $builder->build();

        $this->assertInstanceOf('\\perf\\Http\\Curl\\CurlClient', $result);
    }
}
