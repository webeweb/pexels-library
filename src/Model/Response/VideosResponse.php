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
use WBW\Library\Pexels\Model\Video;
use WBW\Library\Pexels\Traits\NextPageTrait;
use WBW\Library\Pexels\Traits\PageTrait;
use WBW\Library\Pexels\Traits\PerPageTrait;
use WBW\Library\Pexels\Traits\PrevPageTrait;
use WBW\Library\Pexels\Traits\TotalResultsTrait;
use WBW\Library\Pexels\Traits\UrlTrait;

/**
 * Videos response.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Model\Response
 */
class VideosResponse extends AbstractResponse implements PaginateResponseInterface {

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
     * Add a video.
     *
     * @param Video $video The video.
     * @return VideosResponse Returns this video response.
     */
    public function addVideo(Video $video) {
        return $this->addMedia($video);
    }

    /**
     * Get the videos.
     *
     * @return Video[] Returns the videos.
     */
    public function getVideos() {
        return $this->getMedias();
    }
}
