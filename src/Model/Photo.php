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

use WBW\Library\Pexels\Traits\UrlTrait;

/**
 * Photo.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Model
 */
class Photo {

    use UrlTrait;

    /**
     * Height.
     *
     * @var int
     */
    private $height;

    /**
     * Photographer.
     *
     * @var string
     */
    private $photographer;

    /**
     * Source.
     *
     * @var Source
     */
    private $src;

    /**
     * Width.
     *
     * @var int
     */
    private $width;

    /**
     * Constructor.
     */
    public function __construct() {
        // NOTHING TO DO.
    }

    /**
     * Get the height.
     *
     * @return int Returns the height.
     */
    public function getHeight() {
        return $this->height;
    }

    /**
     * Get the photographer.
     *
     * @return string Returns the photographer.
     */
    public function getPhotographer() {
        return $this->photographer;
    }

    /**
     * Get the source.
     *
     * @return Source Returns the source.
     */
    public function getSrc() {
        return $this->src;
    }

    /**
     * Get the width.
     *
     * @return int Returns the width.
     */
    public function getWidth() {
        return $this->width;
    }

    /**
     * Set the height.
     *
     * @param int $height The height.
     * @return Photo Returns this photo.
     */
    public function setHeight($height) {
        $this->height = $height;
        return $this;
    }

    /**
     * Set the photographer.
     *
     * @param string $photographer The photographer.
     * @return Photo Returns this photo.
     */
    public function setPhotographer($photographer) {
        $this->photographer = $photographer;
        return $this;
    }

    /**
     * Set the source.
     *
     * @param Source|null $src The source.
     * @return Photo Returns this photo.
     */
    public function setSrc(Source $src = null) {
        $this->src = $src;
        return $this;
    }

    /**
     * Set the width.
     *
     * @param int $width The width.
     * @return Photo Returns this photo.
     */
    public function setWidth($width) {
        $this->width = $width;
        return $this;
    }
}
