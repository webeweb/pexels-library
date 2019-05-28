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
 * Photo.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Model
 */
class Photo extends AbstractMedia {

    /**
     * Photographer.
     *
     * @var string
     */
    private $photographer;

    /**
     * Photographer URL.
     *
     * @var string
     */
    private $photographerUrl;

    /**
     * Source.
     *
     * @var Source
     */
    private $src;

    /**
     * Get the photographer.
     *
     * @return string Returns the photographer.
     */
    public function getPhotographer() {
        return $this->photographer;
    }

    /**
     * Get the photographer URL.
     *
     * @return string Returns the photographer URL.
     */
    public function getPhotographerUrl() {
        return $this->photographerUrl;
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
     * Set the photographer URL.
     *
     * @param string $photographerUrl The photographer URL.
     * @return Photo Returns this photo.
     */
    public function setPhotographerUrl($photographerUrl) {
        $this->photographerUrl = $photographerUrl;
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

}
