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
use WBW\Library\Pexels\Traits\PageTrait;
use WBW\Library\Pexels\Traits\PerPageTrait;
use WBW\Library\Pexels\Traits\UrlTrait;

/**
 * Photos response.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Model\Response
 */
class PhotosResponse extends AbstractResponse {

    use PageTrait;
    use PerPageTrait;
    use UrlTrait;

    /**
     * Next page.
     *
     * @var string
     */
    private $nextPage;

    /**
     * Photos.
     *
     * @var Photo[]
     */
    private $photos;

    /**
     * Total results.
     *
     * @var int
     */
    private $totalResults;

    public function __construct() {
        parent::__construct();
        $this->setPhotos([]);
    }

    /**
     * Add a photo.
     *
     * @param Photo $photo The photo.
     * @return PhotosResponse Returns this photo response.
     */
    public function addPhoto(Photo $photo) {
        $this->photos[] = $photo;
        return $this;
    }

    /**
     * Get the next page.
     *
     * @return string Returns the next page.
     */
    public function getNextPage() {
        return $this->nextPage;
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
     * Get the total results.
     *
     * @return int Returns the total results.
     */
    public function getTotalResults() {
        return $this->totalResults;
    }

    /**
     * Set the next page.
     *
     * @param string $nextPage The next page.
     * @return AbstractResponse Returns this response.
     */
    public function setNextPage($nextPage) {
        $this->nextPage = $nextPage;
        return $this;
    }

    /**
     * Set the photos.
     *
     * @param Photo[] $photos The photo.
     * @return PhotosResponse Returns this photo response.
     */
    protected function setPhotos(array $photos) {
        $this->photos = $photos;
        return $this;
    }

    /**
     * Set the total results.
     *
     * @param int $totalResults The total result.
     * @return AbstractResponse Returns this response.
     */
    public function setTotalResults($totalResults) {
        $this->totalResults = $totalResults;
        return $this;
    }
}
