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

/**
 * Max width trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Traits
 */
trait MaxWidthTrait {

    /**
     * Max width.
     *
     * @var int
     */
    private $maxWidth;

    /**
     * Get the max width.
     *
     * @return int Returns the max width.
     */
    public function getMaxWidth() {
        return $this->maxWidth;
    }

    /**
     * Set the max width.
     *
     * @param int $maxWidth The max width.
     */
    public function setMaxWidth($maxWidth) {
        $this->maxWidth = $maxWidth;
        return $this;
    }
}
