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
 * Min width trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Traits
 */
trait MinWidthTrait {

    /**
     * Min width.
     *
     * @var int
     */
    private $minWidth;

    /**
     * Get the min width.
     *
     * @return int Returns the min width.
     */
    public function getMinWidth() {
        return $this->minWidth;
    }

    /**
     * Set the min width.
     *
     * @param int $minWidth The min width.
     */
    public function setMinWidth($minWidth) {
        $this->minWidth = $minWidth;
        return $this;
    }
}
