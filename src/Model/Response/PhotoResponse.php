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
     * Get the photo.
     *
     * @return Photo Returns the photo.
     */
    public function getPhoto() {
        $medias = $this->getMedias();
        return 1 === count($medias) ? $medias[0] : null;
    }

    /**
     * Set the photo.
     *
     * @param Photo $photo The photo.
     * @return PhotoResponse Returns this photo response.
     */
    public function setPhoto(Photo $photo) {
        return $this->setMedias([$photo]);
    }
}
