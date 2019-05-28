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

use WBW\Library\Pexels\Traits\IdTrait;

/**
 * Video picture.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Model
 */
class VideoPicture {

    use IdTrait;

    /**
     * Number.
     *
     * @var int
     */
    private $nr;

    /**
     * Picture.
     *
     * @var string
     */
    private $picture;

    /**
     * Get the number.
     *
     * @return int Returns the number.
     */
    public function getNr() {
        return $this->nr;
    }

    /**
     * Get the picture.
     *
     * @return string Returns the picture.
     */
    public function getPicture() {
        return $this->picture;
    }

    /**
     * Set the number.
     *
     * @param int $nr The number.
     * @return VideoPicture Returns this video picture.
     */
    public function setNr($nr) {
        $this->nr = $nr;
        return $this;
    }

    /**
     * Set the picture.
     *
     * @param string $picture The picture.
     * @return VideoPicture Returns this picture.
     */
    public function setPicture($picture) {
        $this->picture = $picture;
        return $this;
    }
}
