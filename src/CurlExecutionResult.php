<?php

namespace perf\CurlClient;

use DomainException;
use perf\CurlClient\Wrapper\CurlWrapperInterface;

class CurlExecutionResult
{
    private string $responseContent;

    /**
     * @var {string:mixed}
     */
    private array $infos;

    public function __construct(string $responseContent, CurlWrapperInterface $curlWrapper)
    {
        $this->responseContent = $responseContent;
        $this->infos           = $curlWrapper->getInfo();
    }

    public function getResponseContent(): string
    {
        return $this->responseContent;
    }

    /**
     * Get information regarding a specific transfer.
     *
     * @param string $option The key of the option to get
     *
     * @return mixed
     *
     * @throws DomainException
     */
    public function getInfo(string $option)
    {
        if (array_key_exists($option, $this->infos)) {
            return $this->infos[$option];
        }

        throw new DomainException("Option {$option} not found.");
    }

    /**
     * Get all information regarding a specific transfer.
     *
     * @return {string:mixed}
     */
    public function getInfos(): array
    {
        return $this->infos;
    }
}
