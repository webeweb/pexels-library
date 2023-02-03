<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Tests\Request;

use WBW\Library\Pexels\Request\AbstractRequest;
use WBW\Library\Pexels\Request\PopularVideosRequest;
use WBW\Library\Pexels\Response\VideosResponse;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * Popular videos request test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\Pexels\Tests\Request
 */
class PopularVideosRequestTest extends AbstractTestCase {

    /**
     * Tests deserializeResponse()
     *
     * @return void
     */
    public function testDeserializeResponse(): void {

        $obj = new PopularVideosRequest();

        $res = $obj->deserializeResponse("{}");
        $this->assertInstanceOf(VideosResponse::class, $res);
    }

    /**
     * Tests serializeRequest()
     *
     * @return void
     */
    public function testSerializeRequest(): void {

        $obj = new PopularVideosRequest();
        $obj->setMinWidth(1280);
        $obj->setMinHeight(1024);
        $obj->setMinDuration(1);
        $obj->setMaxDuration(60);
        $obj->setPage(2);
        $obj->setPerPage(80);

        $res = $obj->serializeRequest();
        $this->assertCount(6, $res);

        $this->assertEquals(1280, $res["min_width"]);
        $this->assertEquals(1024, $res["min_height"]);
        $this->assertEquals(1, $res["min_duration"]);
        $this->assertEquals(60, $res["max_duration"]);
        $this->assertEquals(2, $res["page"]);
        $this->assertEquals(80, $res["per_page"]);
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("/videos/popular", PopularVideosRequest::POPULAR_VIDEOS_RESOURCE_PATH);

        $obj = new PopularVideosRequest();

        $this->assertInstanceOf(AbstractRequest::class, $obj);

        $this->assertEquals(PopularVideosRequest::POPULAR_VIDEOS_RESOURCE_PATH, $obj->getResourcePath());
        $this->assertNull($obj->getMaxDuration());
        $this->assertNull($obj->getMinDuration());
        $this->assertNull($obj->getMinHeight());
        $this->assertNull($obj->getMinWidth());
        $this->assertEquals(1, $obj->getPage());
        $this->assertEquals(15, $obj->getPerPage());
    }
}
