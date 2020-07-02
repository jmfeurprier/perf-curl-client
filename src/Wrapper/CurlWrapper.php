<?php

namespace perf\CurlClient\Wrapper;

/**
 * Low-level object-oriented wrapper for PHP cURL functions.
 */
class CurlWrapper implements CurlWrapperInterface
{
    /**
     * @var resource
     */
    private $curlResource;

    /**
     * Wrapper for PHP function curl_init().
     *
     * @param null|string $url
     */
    public function __construct(?string $url = null)
    {
        $this->curlResource = curl_init($url);
    }

    /**
     * Copy a cURL handle along with all of its preferences.
     * Wrapper for PHP function curl_copy_handle().
     *
     * @return void
     */
    public function __clone()
    {
        $this->curlResource = curl_copy_handle($this->curlResource);
    }

    /**
     * Destructor.
     * Wrapper for PHP function curl_close().
     *
     * @return void
     */
    public function __destruct()
    {
        curl_close($this->curlResource);
    }

    /**
     * Set an option for a cURL transfer.
     * Wrapper for PHP function curl_setopt().
     *
     * @param int   $option The key of the option to set
     * @param mixed $value  The value of the option to set
     *
     * @return bool
     */
    public function setOption($option, $value): bool
    {
        return curl_setopt($this->curlResource, $option, $value);
    }

    /**
     * Set multiple options for a cURL transfer.
     * Wrapper for PHP function curl_setopt_array().
     *
     * @param array $options Array of options
     *
     * @return bool
     */
    public function setOptions(array $options): bool
    {
        return curl_setopt_array($this->curlResource, $options);
    }

    /**
     * Perform a cURL session.
     * Wrapper for PHP function curl_exec().
     *
     * @return bool|string
     */
    public function execute()
    {
        return curl_exec($this->curlResource);
    }

    /**
     * Get information regarding a specific transfer.
     * Wrapper for PHP function curl_getinfo()
     *
     * @param int $option The key of the option to get
     * @return mixed
     */
    public function getInfo($option = 0)
    {
        if (0 === $option) {
            return curl_getinfo($this->curlResource);
        }

        return curl_getinfo($this->curlResource, $option);
    }

    /**
     * Return a string containing the last error for the current session.
     * Wrapper for PHP function curl_error().
     *
     * @return string
     */
    public function getError(): string
    {
        return curl_error($this->curlResource);
    }

    /**
     * Return the last error number.
     * Wrapper for PHP function curl_errno().
     *
     * @return int
     */
    public function getErrorNumber(): int
    {
        return curl_errno($this->curlResource);
    }

    /**
     * Return cURL current version information.
     * Wrapper for PHP function curl_version().
     *
     * @return {string:mixed}
     */
    public function getVersion($age = \CURLVERSION_NOW): array
    {
        return curl_version($age);
    }
}
