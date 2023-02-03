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
use WBW\Library\Pexels\Model\Photo;
use WBW\Library\Pexels\Response\AbstractResponse;
use WBW\Library\Pexels\Response\PhotosResponse;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * Photos response test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\Pexels\Tests\Response
 */
class PhotosResponseTest extends AbstractTestCase {

    /**
     * Tests addPhoto()
     *
     * @return void
     */
    public function testAddPhoto(): void {

        // Set a Photo mock.
        $photo = new Photo();

        $obj = new PhotosResponse();

        $obj->addPhoto($photo);
        $this->assertSame($photo, $obj->getPhotos()[0]);
    }

    /**
     * Tests deserializeResponse()
     *
     * @return void
     */
    public function testDeserializeResponse(): void {

        $obj = new PhotosResponse();

        $res = $obj->deserializeResponse("");
        $this->assertInstanceOf(PhotosResponse::class, $res);
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new PhotosResponse();

        $this->assertInstanceOf(AbstractResponse::class, $obj);
        $this->assertInstanceOf(PaginateResponseInterface::class, $obj);

        $this->assertNull($obj->getNextPage());
        $this->assertNull($obj->getPage());
        $this->assertNull($obj->getPerPage());
        $this->assertEquals([], $obj->getPhotos());
        $this->assertNull($obj->getPrevPage());
        $this->assertNull($obj->getTotalResults());
        $this->assertNull($obj->getUrl());
    }
}
