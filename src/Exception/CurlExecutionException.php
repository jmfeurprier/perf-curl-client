<?php

namespace perf\CurlClient\Exception;

use DomainException;
use Exception;
use perf\CurlClient\Wrapper\CurlWrapperInterface;

class CurlExecutionException extends Exception
{
    /**
     * @var {string:mixed}
     */
    private array $infos;

    public function __construct(CurlWrapperInterface $curlWrapper)
    {
        parent::__construct($curlWrapper->getError(), $curlWrapper->getErrorNumber());

        $this->infos = $curlWrapper->getInfo();
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
     * @return {string:mixed}
     */
    public function getInfos(): array
    {
        return $this->infos;
    }
}
