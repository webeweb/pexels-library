<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Traits;

use DateTime;

/**
 * Rate limit trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Traits
 */
trait RateLimitTrait {

    /**
     * Limit.
     *
     * @var int
     */
    private $limit;

    /**
     * Remaining.
     *
     * @var int
     */
    private $remaining;

    /**
     * Reset.
     *
     * @var DateTime
     */
    private $reset;

    /**
     * Get the limit.
     *
     * @return int Returns the limit.
     */
    public function getLimit() {
        return $this->limit;
    }

    /**
     * Get the remaining.
     *
     * @return int Returns the remaining.
     */
    public function getRemaining() {
        return $this->remaining;
    }

    /**
     * Get the reset.
     *
     * @return DateTime Returns reset.
     */
    public function getReset() {
        return $this->reset;
    }

    /**
     * Set the limit.
     *
     * @param int $limit The limit.
     */
    public function setLimit($limit) {
        $this->limit = $limit;
        return $this;
    }

    /**
     * Set the remaining.
     *
     * @param int $remaining The remaining.
     */
    public function setRemaining($remaining) {
        $this->remaining = $remaining;
        return $this;
    }

    /**
     * Set the reset.
     *
     * @param DateTime|null $reset The reset.
     */
    public function setReset(DateTime $reset = null) {
        $this->reset = $reset;
        return $this;
    }
}
