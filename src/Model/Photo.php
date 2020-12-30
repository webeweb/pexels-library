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
     * @var string|null
     */
    private $photographer;

    /**
     * Photographer id.
     *
     * @var string|null
     */
    private $photographerId;

    /**
     * Photographer URL.
     *
     * @var string|null
     */
    private $photographerUrl;

    /**
     * Source.
     *
     * @var Source|null
     */
    private $src;

    /**
     * Get the photographer.
     *
     * @return string|null Returns the photographer.
     */
    public function getPhotographer(): ?string {
        return $this->photographer;
    }

    /**
     * Get the photographer id.
     *
     * @return string|null Returns the photographer id.
     */
    public function getPhotographerId(): ?string {
        return $this->photographerId;
    }

    /**
     * Get the photographer URL.
     *
     * @return string|null Returns the photographer URL.
     */
    public function getPhotographerUrl(): ?string {
        return $this->photographerUrl;
    }

    /**
     * Get the source.
     *
     * @return Source|null Returns the source.
     */
    public function getSrc(): ?Source {
        return $this->src;
    }

    /**
     * Set the photographer.
     *
     * @param string|null $photographer The photographer.
     * @return Photo Returns this photo.
     */
    public function setPhotographer(?string $photographer): Photo {
        $this->photographer = $photographer;
        return $this;
    }

    /**
     * Set the photographer id.
     *
     * @param string|null $photographerId The photographer id.
     * @return Photo Returns this photo.
     */
    public function setPhotographerId(?string $photographerId): Photo {
        $this->photographerId = $photographerId;
        return $this;
    }

    /**
     * Set the photographer URL.
     *
     * @param string|null $photographerUrl The photographer URL.
     * @return Photo Returns this photo.
     */
    public function setPhotographerUrl(?string $photographerUrl): Photo {
        $this->photographerUrl = $photographerUrl;
        return $this;
    }

    /**
     * Set the source.
     *
     * @param Source|null $src The source.
     * @return Photo Returns this photo.
     */
    public function setSrc(?Source $src): Photo {
        $this->src = $src;
        return $this;
    }
}
