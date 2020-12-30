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

use WBW\Library\Core\Model\Attribute\IntegerPageTrait;
use WBW\Library\Core\Model\Attribute\StringUrlTrait;
use WBW\Library\Pexels\API\PaginateResponseInterface;
use WBW\Library\Pexels\Model\AbstractResponse;
use WBW\Library\Pexels\Model\Attribute\IntegerPerPageTrait;
use WBW\Library\Pexels\Model\Attribute\IntegerTotalResultsTrait;
use WBW\Library\Pexels\Model\Attribute\StringNextPageTrait;
use WBW\Library\Pexels\Model\Attribute\StringPrevPageTrait;
use WBW\Library\Pexels\Model\Video;

/**
 * Videos response.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Model\Response
 */
class VideosResponse extends AbstractResponse implements PaginateResponseInterface {

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
     * Add a video.
     *
     * @param Video $video The video.
     * @return VideosResponse Returns this video response.
     */
    public function addVideo(Video $video): VideosResponse {
        return $this->addMedia($video);
    }

    /**
     * Get the videos.
     *
     * @return Video[] Returns the videos.
     */
    public function getVideos(): array {
        return $this->getMedias();
    }
}
