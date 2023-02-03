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
use WBW\Library\Pexels\Request\GetVideoRequest;
use WBW\Library\Pexels\Response\VideoResponse;
use WBW\Library\Pexels\Tests\AbstractTestCase;
use WBW\Library\Provider\Api\SubstituableRequestInterface;

/**
 * Get video request test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\Pexels\Tests\Request
 */
class GetVideoRequestTest extends AbstractTestCase {

    /**
     * Tests deserializeResponse()
     *
     * @return void
     */
    public function testDeserializeResponse(): void {

        // Set a raw response mock.
        $json = file_get_contents(__DIR__ . "/SearchVideosRequestTest.testDeserializeResponse.json");
        $data = json_decode($json, true);

        $rawResponse = json_encode($data["videos"][0]);

        $obj = new GetVideoRequest();

        $res = $obj->deserializeResponse($rawResponse);
        $this->assertInstanceOf(VideoResponse::class, $res);

        $this->assertEquals($rawResponse, $res->getRawResponse());
        $this->assertEquals(1972034, $res->getVideo()->getId());
        $this->assertEquals(1920, $res->getVideo()->getWidth());
        $this->assertEquals(1080, $res->getVideo()->getHeight());
        $this->assertEquals("https://videos.pexels.com/videos/following-a-woman-in-slow-motion-1972034", $res->getVideo()->getUrl());
        $this->assertEquals("https://images.pexels.com/videos/1972034/free-video-1972034.jpg?fit=crop&w=1200&h=630&auto=compress&cs=tinysrgb", $res->getVideo()->getImage());
        $this->assertNull($res->getVideo()->getFullRes());
        $this->assertEquals(129, $res->getVideo()->getDuration());
        $this->assertCount(3, $res->getVideo()->getVideoFiles());
        $this->assertCount(15, $res->getVideo()->getVideoPictures());
    }

    /**
     * Tests deserializeResponse()
     *
     * @return void
     */
    public function testDeserializeResponseWithBadRewResponse(): void {

        // Set a raw response mock.
        $rawResponse = "";

        $obj = new GetVideoRequest();

        $res = $obj->deserializeResponse($rawResponse);
        $this->assertInstanceOf(VideoResponse::class, $res);

        $this->assertEquals($rawResponse, $res->getRawResponse());
        $this->assertNull($res->getVideo());
    }

    /**
     * Tests getSubstituables()
     *
     * @return void
     */
    public function testGetSubstituables(): void {

        $obj = new GetVideoRequest();

        $obj->setId(1);
        $this->assertEquals([":id" => 1], $obj->getSubstituables());
    }

    /**
     * Tests serializeRequest()
     *
     * @return void
     */
    public function testSerializeRequest(): void {

        $obj = new GetVideoRequest();

        $res = $obj->serializeRequest();
        $this->assertEquals([], $res);
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("/v1/videos/videos/:id", GetVideoRequest::GET_VIDEO_RESOURCE_PATH);

        $obj = new GetVideoRequest();

        $this->assertInstanceOf(AbstractRequest::class, $obj);
        $this->assertInstanceOf(SubstituableRequestInterface::class, $obj);

        $this->assertEquals(GetVideoRequest::GET_VIDEO_RESOURCE_PATH, $obj->getResourcePath());
        $this->assertNull($obj->getId());
        $this->assertEquals([":id" => null], $obj->getSubstituables());
    }
}
