<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Response;

use WBW\Library\Core\Model\Attribute\IntegerPageTrait;
use WBW\Library\Core\Model\Attribute\StringUrlTrait;
use WBW\Library\Pexels\API\PaginateResponseInterface;
use WBW\Library\Pexels\Model\Attribute\IntegerPerPageTrait;
use WBW\Library\Pexels\Model\Attribute\IntegerTotalResultsTrait;
use WBW\Library\Pexels\Model\Attribute\StringNextPageTrait;
use WBW\Library\Pexels\Model\Attribute\StringPrevPageTrait;
use WBW\Library\Pexels\Model\Photo;

/**
 * Photos response.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Response
 */
class PhotosResponse extends AbstractMediaResponse implements PaginateResponseInterface {

    use IntegerPageTrait;
    use IntegerPerPageTrait;
    use IntegerTotalResultsTrait;
    use StringNextPageTrait;
    use StringPrevPageTrait;
    use StringUrlTrait;

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
    public function addPhoto(Photo $photo): PhotosResponse {
        return $this->addMedia($photo);
    }

    /**
     * Get the photos.
     *
     * @return Photo[] Returns the photos.
     */
    public function getPhotos(): array {
        return $this->getMedias();
    }
}
