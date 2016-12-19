<?php

namespace perf\Http\Curl;

/**
 *
 *
 */
class CurlWrapperFactory
{

    /**
     * Returns a new cURL wrapper.
     *
     * @return CurlWrapper
     */
    public function create()
    {
        return new CurlWrapper();
    }
}
