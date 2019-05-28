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
 * Height trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Traits
 */
trait HeightTrait {

    /**
     * Height.
     *
     * @var int
     */
    private $height;

    /**
     * Get the height.
     *
     * @return int Returns the height.
     */
    public function getHeight() {
        return $this->height;
    }

    /**
     * Set the height.
     *
     * @param int $height The height.
     */
    public function setHeight($height) {
        $this->height = $height;
        return $this;
    }

}
