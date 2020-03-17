<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Model\Attribute;

/**
 * Integer max duration trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Model\Attribute
 */
trait IntegerMaxDurationTrait {

    /**
     * Max duration.
     *
     * @var int
     */
    private $maxDuration;

    /**
     * Get the max duration.
     *
     * @return int Returns the max duration.
     */
    public function getMaxDuration() {
        return $this->maxDuration;
    }

    /**
     * Set the max duration.
     *
     * @param int $maxDuration The max duration.
     */
    public function setMaxDuration($maxDuration) {
        $this->maxDuration = $maxDuration;
        return $this;
    }
}
