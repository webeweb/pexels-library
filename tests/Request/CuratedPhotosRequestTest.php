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
use WBW\Library\Pexels\Request\CuratedPhotosRequest;
use WBW\Library\Pexels\Response\PhotosResponse;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * Curated photos request test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\Pexels\Tests\Request
 */
class CuratedPhotosRequestTest extends AbstractTestCase {

    /**
     * Tests deserializeResponse()
     *
     * @return void
     */
    public function testDeserializeResponse(): void {

        $obj = new CuratedPhotosRequest();

        $res = $obj->deserializeResponse("");
        $this->assertInstanceOf(PhotosResponse::class, $res);
    }

    /**
     * Tests serializeRequest()
     *
     * @return void
     */
    public function testSerializeRequest(): void {

        $obj = new CuratedPhotosRequest();

        $res = $obj->serializeRequest();
        $this->assertIsArray($res);
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("/v1/curated", CuratedPhotosRequest::CURATED_PHOTO_RESOURCE_PATH);

        $obj = new CuratedPhotosRequest();

        $this->assertInstanceOf(AbstractRequest::class, $obj);

        $this->assertEquals(CuratedPhotosRequest::CURATED_PHOTO_RESOURCE_PATH, $obj->getResourcePath());
        $this->assertEquals(1, $obj->getPage());
        $this->assertEquals(15, $obj->getPerPage());
    }
}
