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
 * Source.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Model
 */
class Source {

    /**
     * Landscape.
     *
     * @var string
     */
    private $landscape;

    /**
     * Large.
     *
     * @var string
     */
    private $large;

    /**
     * Large 2X.
     *
     * @var string
     */
    private $large2x;

    /**
     * Medium.
     *
     * @var string
     */
    private $medium;

    /**
     * Original.
     *
     * @var string
     */
    private $original;

    /**
     * Portrait.
     *
     * @var string
     */
    private $portrait;

    /**
     * Small.
     *
     * @var string
     */
    private $small;

    /**
     * Tiny.
     *
     * @var string
     */
    private $tiny;

    /**
     * Constructor.
     */
    public function __construct() {
        // NOTHING TO DO.
    }

    /**
     * Get the landscape.
     *
     * @return string Returns the landscape.
     */
    public function getLandscape() {
        return $this->landscape;
    }

    /**
     * Get the large.
     *
     * @return string Returns the large.
     */
    public function getLarge() {
        return $this->large;
    }

    /**
     * Get the large 2x.
     *
     * @return string Returns the large 2x.
     */
    public function getLarge2x() {
        return $this->large2x;
    }

    /**
     * Get the medium.
     *
     * @return string Returns the medium.
     */
    public function getMedium() {
        return $this->medium;
    }

    /**
     * Get the original.
     *
     * @return string Returns the original.
     */
    public function getOriginal() {
        return $this->original;
    }

    /**
     * Get the portrait.
     *
     * @return string Returns the portrait.
     */
    public function getPortrait() {
        return $this->portrait;
    }

    /**
     * Get the small.
     *
     * @return string Returns the small.
     */
    public function getSmall() {
        return $this->small;
    }

    /**
     * Get the tiny.
     *
     * @return string Returns the tiny.
     */
    public function getTiny() {
        return $this->tiny;
    }

    /**
     * Set the landscape.
     *
     * @param string $landscape The landscape.
     * @return Source Returns this source.
     */
    public function setLandscape($landscape) {
        $this->landscape = $landscape;
        return $this;
    }

    /**
     * Set the large.
     *
     * @param string $large The large.
     * @return Source Returns this source.
     */
    public function setLarge($large) {
        $this->large = $large;
        return $this;
    }

    /**
     * Set the large 2x.
     *
     * @param string $large2x The large 2x.
     * @return Source Returns this source.
     */
    public function setLarge2x($large2x) {
        $this->large2x = $large2x;
        return $this;
    }

    /**
     * Set the medium.
     *
     * @param string $medium The medium.
     * @return Source Returns this source.
     */
    public function setMedium($medium) {
        $this->medium = $medium;
        return $this;
    }

    /**
     * Set the original.
     *
     * @param string $original The original.
     * @return Source Returns this source.
     */
    public function setOriginal($original) {
        $this->original = $original;
        return $this;
    }

    /**
     * Set the portrait.
     *
     * @param string $portrait The portrait.
     * @return Source Returns this source.
     */
    public function setPortrait($portrait) {
        $this->portrait = $portrait;
        return $this;
    }

    /**
     * Set the small.
     *
     * @param string $small The small.
     * @return Source Returns this source.
     */
    public function setSmall($small) {
        $this->small = $small;
        return $this;
    }

    /**
     * Set the tiny.
     *
     * @param string $tiny The tiny.
     * @return Source Returns this source.
     */
    public function setTiny($tiny) {
        $this->tiny = $tiny;
        return $this;
    }
}
