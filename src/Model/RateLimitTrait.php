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

use DateTime;

/**
 * Rate limit trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Model
 */
trait RateLimitTrait {

    /**
     * Limit.
     *
     * @var int|null
     */
    private $limit;

    /**
     * Remaining.
     *
     * @var int|null
     */
    private $remaining;

    /**
     * Reset.
     *
     * @var DateTime|null
     */
    private $reset;

    /**
     * Get the limit.
     *
     * @return int|null Returns the limit.
     */
    public function getLimit(): ?int {
        return $this->limit;
    }

    /**
     * Get the remaining.
     *
     * @return int|null Returns the remaining.
     */
    public function getRemaining(): ?int {
        return $this->remaining;
    }

    /**
     * Get the reset.
     *
     * @return DateTime|null Returns reset.
     */
    public function getReset(): ?DateTime {
        return $this->reset;
    }

    /**
     * Set the limit.
     *
     * @param int|null $limit The limit.
     */
    public function setLimit(?int $limit): self {
        $this->limit = $limit;
        return $this;
    }

    /**
     * Set the remaining.
     *
     * @param int|null $remaining The remaining.
     */
    public function setRemaining(?int $remaining): self {
        $this->remaining = $remaining;
        return $this;
    }

    /**
     * Set the reset.
     *
     * @param DateTime|null $reset The reset.
     */
    public function setReset(?DateTime $reset): self {
        $this->reset = $reset;
        return $this;
    }
}
