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
use WBW\Library\Pexels\Request\GetPhotoRequest;
use WBW\Library\Pexels\Response\PhotoResponse;
use WBW\Library\Pexels\Tests\AbstractTestCase;
use WBW\Library\Provider\Api\SubstituableRequestInterface;

/**
 * Get photo request test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\Pexels\Tests\Request
 */
class GetPhotoRequestTest extends AbstractTestCase {

    /**
     * Tests deserializeResponse()
     *
     * @return void
     */
    public function testDeserializeResponse(): void {

        // Set a raw response mock.
        $json = file_get_contents(__DIR__ . "/SearchPhotosRequestTest.testDeserializeResponse.json");
        $data = json_decode($json, true);

        $rawResponse = json_encode($data["photos"][0]);

        $obj = new GetPhotoRequest();

        $res = $obj->deserializeResponse($rawResponse);
        $this->assertInstanceOf(PhotoResponse::class, $res);

        $this->assertEquals($rawResponse, $res->getRawResponse());
        $this->assertEquals(1181292, $res->getPhoto()->getId());
        $this->assertEquals(3756, $res->getPhoto()->getWidth());
        $this->assertEquals(5627, $res->getPhoto()->getHeight());
        $this->assertEquals("https://www.pexels.com/photo/photography-of-a-woman-using-laptop-1181292/", $res->getPhoto()->getUrl());
        $this->assertEquals("Christina Morillo", $res->getPhoto()->getPhotographer());
        $this->assertEquals("https://www.pexels.com/@divinetechygirl", $res->getPhoto()->getPhotographerUrl());
        $this->assertNotNull($res->getPhoto()->getSrc());
    }

    /**
     * Tests deserializeResponse()
     *
     * @return void
     */
    public function testDeserializeResponseWithBadRawResponse(): void {

        // Set a raw response mock.
        $rawResponse = "";

        $obj = new GetPhotoRequest();

        $res = $obj->deserializeResponse($rawResponse);
        $this->assertInstanceOf(PhotoResponse::class, $res);

        $this->assertEquals($rawResponse, $res->getRawResponse());
        $this->assertNull($res->getPhoto());
    }

    /**
     * Tests getSubstituables()
     *
     * @return void
     */
    public function testGetSubstituables(): void {

        $obj = new GetPhotoRequest();

        $obj->setId(1);
        $this->assertEquals([":id" => 1], $obj->getSubstituables());
    }

    /**
     * Tests serializeRequest()
     *
     * @return void
     */
    public function testSerializeRequest(): void {

        $obj = new GetPhotoRequest();

        $res = $obj->serializeRequest();
        $this->assertEquals([], $res);
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("/v1/photos/:id", GetPhotoRequest::GET_PHOTO_RESOURCE_PATH);

        $obj = new GetPhotoRequest();

        $this->assertInstanceOf(AbstractRequest::class, $obj);
        $this->assertInstanceOf(SubstituableRequestInterface::class, $obj);

        $this->assertEquals(GetPhotoRequest::GET_PHOTO_RESOURCE_PATH, $obj->getResourcePath());
        $this->assertNull($obj->getId());
        $this->assertEquals([":id" => null], $obj->getSubstituables());
    }
}
