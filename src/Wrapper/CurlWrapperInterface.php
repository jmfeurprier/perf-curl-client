<?php

namespace perf\CurlClient\Wrapper;

/**
 * Low-level object-oriented wrapper for PHP cURL functions.
 */
interface CurlWrapperInterface
{
    /**
     * Wrapper for PHP function curl_init().
     *
     * @param null|string $url
     */
    public function __construct(?string $url = null);

    /**
     * Copy a cURL handle along with all of its preferences.
     * Wrapper for PHP function curl_copy_handle().
     *
     * @return void
     */
    public function __clone();

    /**
     * Destructor.
     * Wrapper for PHP function curl_close().
     *
     * @return void
     */
    public function __destruct();

    /**
     * Set an option for a cURL transfer.
     * Wrapper for PHP function curl_setopt().
     *
     * @param int   $option The key of the option to set
     * @param mixed $value  The value of the option to set
     *
     * @return bool
     */
    public function setOption($option, $value): bool;

    /**
     * Set multiple options for a cURL transfer.
     * Wrapper for PHP function curl_setopt_array().
     *
     * @param array $options Array of options
     *
     * @return bool
     */
    public function setOptions(array $options): bool;

    /**
     * Perform a cURL session.
     * Wrapper for PHP function curl_exec().
     *
     * @return bool|string
     */
    public function execute();

    /**
     * Get information regarding a specific transfer.
     * Wrapper for PHP function curl_getinfo()
     *
     * @param int $option The key of the option to get
     *
     * @return mixed
     */
    public function getInfo($option = 0);

    /**
     * Return a string containing the last error for the current session.
     * Wrapper for PHP function curl_error().
     *
     * @return string
     */
    public function getError(): string;

    /**
     * Return the last error number.
     * Wrapper for PHP function curl_errno().
     *
     * @return int
     */
    public function getErrorNumber(): int;

    /**
     * Return cURL current version information.
     * Wrapper for PHP function curl_version().
     *
     * @return {string:mixed}
     */
    public function getVersion($age = \CURLVERSION_NOW): array;
}
