<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Model;

/**
 * Abstract response.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Model
 * @abstract
 */
abstract class AbstractResponse {

    /**
     * Rate limit remaining.
     *
     * @var int
     */
    private $rateLimitRemaining;

    /**
     * Raw response.
     *
     * @var string
     */
    private $rawResponse;

    /**
     * Constructor.
     */
    public function __construct() {
        // NOTHING TO DO.
    }

    /**
     * Get the rate limit remaining.
     *
     * @return int Returns the rate limit remaining.
     */
    public function getRateLimitRemaining() {
        return $this->rateLimitRemaining;
    }

    /**
     * Get the raw response.
     *
     * @return string Returns the raw response.
     */
    public function getRawResponse() {
        return $this->rawResponse;
    }

    /**
     * Set the rate limit remaining.
     *
     * @param int $rateLimitRemaining The rate limit remaining.
     * @return AbstractResponse Returns this response.
     */
    public function setRateLimitRemaining($rateLimitRemaining) {
        $this->rateLimitRemaining = $rateLimitRemaining;
        return $this;
    }

    /**
     * Set the raw response.
     *
     * @param string $rawResponse The raw response.
     * @return AbstractResponse Returns this response.
     */
    public function setRawResponse($rawResponse) {
        $this->rawResponse = $rawResponse;
        return $this;
    }
}
