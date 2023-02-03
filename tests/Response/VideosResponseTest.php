<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Tests\Response;

use WBW\Library\Pexels\Api\PaginateResponseInterface;
use WBW\Library\Pexels\Model\Video;
use WBW\Library\Pexels\Response\AbstractResponse;
use WBW\Library\Pexels\Response\VideosResponse;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * Videos response test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\Pexels\Tests\Response
 */
class VideosResponseTest extends AbstractTestCase {

    /**
     * Tests addVideo()
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
     * Tests deserializeResponse()
     *
     * @return void
     */
    public function testDeserializeResponse(): void {

        $obj = new VideosResponse();

        $res = $obj->deserializeResponse("");
        $this->assertInstanceOf(VideosResponse::class, $res);
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new VideosResponse();

        $this->assertInstanceOf(AbstractResponse::class, $obj);
        $this->assertInstanceOf(PaginateResponseInterface::class, $obj);

        $this->assertNull($obj->getNextPage());
        $this->assertNull($obj->getPage());
        $this->assertNull($obj->getPerPage());
        $this->assertNull($obj->getPrevPage());
        $this->assertNull($obj->getTotalResults());
        $this->assertNull($obj->getUrl());
        $this->assertEquals([], $obj->getVideos());
    }
}
