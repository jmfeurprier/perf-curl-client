<?php

namespace perf\CurlClient\Wrapper;

interface CurlWrapperFactoryInterface
{
    public function create(): CurlWrapperInterface;
}
