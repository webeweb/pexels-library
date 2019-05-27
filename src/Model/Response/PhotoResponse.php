<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Model\Response;

use WBW\Library\Pexels\Model\AbstractResponse;
use WBW\Library\Pexels\Model\Photo;

/**
 * Photo response.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Model\Response
 */
class PhotoResponse extends AbstractResponse {

    /**
     * Photos.
     *
     * @var Photo[]
     */
    private $photos;

    public function __construct() {
        parent::__construct();
        $this->setPhotos([]);
    }

    /**
     * Add a photo.
     *
     * @param Photo $photo The photo.
     * @return PhotoResponse Returns this photo response.
     */
    public function addPhoto(Photo $photo) {
        $this->photos[] = $photo;
        return $this;
    }

    /**
     * Get the photos.
     *
     * @return Photo[] Returns the photos.
     */
    public function getPhotos() {
        return $this->photos;
    }

    /**
     * Set the photos.
     *
     * @param Photo[] $photos The photo.
     * @return PhotoResponse Returns this photo response.
     */
    protected function setPhotos(array $photos) {
        $this->photos = $photos;
        return $this;
    }
}
