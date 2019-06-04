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

use WBW\Library\Pexels\API\PaginateResponseInterface;
use WBW\Library\Pexels\Model\AbstractResponse;
use WBW\Library\Pexels\Model\Photo;
use WBW\Library\Pexels\Traits\NextPageTrait;
use WBW\Library\Pexels\Traits\PageTrait;
use WBW\Library\Pexels\Traits\PerPageTrait;
use WBW\Library\Pexels\Traits\PrevPageTrait;
use WBW\Library\Pexels\Traits\TotalResultsTrait;
use WBW\Library\Pexels\Traits\UrlTrait;

/**
 * Photos response.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Model\Response
 */
class PhotosResponse extends AbstractResponse implements PaginateResponseInterface {

    use NextPageTrait;
    use PageTrait;
    use PerPageTrait;
    use PrevPageTrait;
    use TotalResultsTrait;
    use UrlTrait;

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Add a photo.
     *
     * @param Photo $photo The photo.
     * @return PhotosResponse Returns this photo response.
     */
    public function addPhoto(Photo $photo) {
        return $this->addMedia($photo);
    }

    /**
     * Get the photos.
     *
     * @return Photo[] Returns the photos.
     */
    public function getPhotos() {
        return $this->getMedias();
    }
}
