<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Tests\Model\Response;

use WBW\Library\Pexels\Model\Response\VideosResponse;
use WBW\Library\Pexels\Model\Video;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * Videos response test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Model\Response
 */
class VideosResponseTest extends AbstractTestCase {

    /**
     * Tests the addVideo() method.
     *
     * @return void
     */
    public function testAddVideo(): void {

        // Set a Video mock.
        $video = new Video();

        $obj = new VideosResponse();

        $obj->addVideo($video);
        $this->assertSame($video, $obj->getVideos()[0]);
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new VideosResponse();

        $this->assertNull($obj->getNextPage());
        $this->assertNull($obj->getPage());
        $this->assertNull($obj->getPerPage());
        $this->assertCount(0, $obj->getVideos());
        $this->assertNull($obj->getPrevPage());
        $this->assertNull($obj->getTotalResults());
        $this->assertNull($obj->getUrl());
    }
}
