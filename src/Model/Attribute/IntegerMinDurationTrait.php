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
 * Integer min duration trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Model\Attribute
 */
trait IntegerMinDurationTrait {

    /**
     * Min duration.
     *
     * @var int
     */
    private $minDuration;

    /**
     * Get the min duration.
     *
     * @return int Returns the min duration.
     */
    public function getMinDuration() {
        return $this->minDuration;
    }

    /**
     * Set the min duration.
     *
     * @param int $minDuration The min duration.
     */
    public function setMinDuration($minDuration) {
        $this->minDuration = $minDuration;
        return $this;
    }
}
