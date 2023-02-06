<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2021 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Tests\Request;

use WBW\Library\Pexels\Request\AbstractRequest;
use WBW\Library\Pexels\Request\CollectionsRequest;
use WBW\Library\Pexels\Response\CollectionsResponse;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * Collections request test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\Pexels\Tests\Request
 */
class CollectionsRequestTest extends AbstractTestCase {

    /**
     * Tests deserializeResponse()
     *
     * @return void
     */
    public function testDeserializeResponse(): void {

        $obj = new CollectionsRequest();

        $res = $obj->deserializeResponse("");
        $this->assertInstanceOf(CollectionsResponse::class, $res);
    }

    /**
     * Tests serializeRequest()
     *
     * @return void
     */
    public function testSerializeRequest(): void {

        $obj = new CollectionsRequest();

        $res = $obj->serializeRequest();
        $this->assertIsArray($res);
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("/v1/collections", CollectionsRequest::COLLECTIONS_RESOURCE_PATH);

        $obj = new CollectionsRequest();

        $this->assertInstanceOf(AbstractRequest::class, $obj);

        $this->assertEquals(CollectionsRequest::COLLECTIONS_RESOURCE_PATH, $obj->getResourcePath());
        $this->assertEquals(1, $obj->getPage());
        $this->assertEquals(15, $obj->getPerPage());
    }
}
