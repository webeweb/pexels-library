<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Library\Pexels\Tests\Request;

use WBW\Library\Common\Provider\SubstituableRequestInterface;
use WBW\Library\Pexels\Request\AbstractRequest;
use WBW\Library\Pexels\Request\GetVideoRequest;
use WBW\Library\Pexels\Response\VideoResponse;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * Get video request test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\Pexels\Tests\Request
 */
class GetVideoRequestTest extends AbstractTestCase {

    /**
     * Test deserializeResponse()
     *
     * @return void
     */
    public function testDeserializeResponse(): void {

        $obj = new GetVideoRequest();

        $res = $obj->deserializeResponse("");
        $this->assertInstanceOf(VideoResponse::class, $res);
    }

    /**
     * Test getSubstituables()
     *
     * @return void
     */
    public function testGetSubstituables(): void {

        $obj = new GetVideoRequest();

        $obj->setId(1);
        $this->assertEquals([":id" => 1], $obj->getSubstituables());
    }

    /**
     * Test serializeRequest()
     *
     * @return void
     */
    public function testSerializeRequest(): void {

        $obj = new GetVideoRequest();

        $res = $obj->serializeRequest();
        $this->assertEquals([], $res);
    }

    /**
     * Test __construct()
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
