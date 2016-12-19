<?php

namespace perf\Http\Curl;

/**
 *
 *
 */
class CurlExecutionResult
{

    /**
     *
     *
     * @var string
     */
    private $responseContent;

    /**
     *
     *
     * @var {string:mixed}
     */
    private $infos;

    /**
     * Constructor.
     *
     * @param string $responseContent
     * @param CurlWrapper $curlWrapper
     * @return void
     */
    public function __construct($responseContent, CurlWrapper $curlWrapper)
    {
        $this->responseContent = $responseContent;
        $this->infos           = $curlWrapper->getInfo();
    }

    /**
     *
     *
     * @return string
     */
    public function getResponseContent()
    {
        return $this->responseContent;
    }

    /**
     * Get information regarding a specific transfer.
     *
     * @param string $option The key of the option to get
     * @return mixed
     * @throws \DomainException
     */
    public function getInfo($option)
    {
        if (array_key_exists($option, $this->infos)) {
            return $this->infos[$option];
        }

        throw new \DomainException("Option {$option} not found.");
    }

    /**
     * Get all informations regarding a specific transfer.
     *
     * @return {string:mixed}
     */
    public function getInfos()
    {
        return $this->infos;
    }
}
