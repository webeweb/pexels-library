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
use WBW\Library\Pexels\Request\CollectionRequest;
use WBW\Library\Pexels\Request\CollectionsRequest;
use WBW\Library\Pexels\Response\CollectionResponse;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * Collection request test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\Pexels\Tests\Request
 */
class CollectionRequestTest extends AbstractTestCase {

    /**
     * Tests deserializeResponse()
     *
     * @return void
     */
    public function testDeserializeResponse(): void {

        $obj = new CollectionRequest();

        $res = $obj->deserializeResponse("");
        $this->assertInstanceOf(CollectionResponse::class, $res);
    }

    /**
     * Tests serializeRequest()
     *
     * @return void
     */
    public function testSerializeRequest(): void {

        $obj = new CollectionRequest();
        $obj->setType("photos");

        $res = $obj->serializeRequest();
        $this->assertIsArray($res);

        $this->assertEquals("photos", $res["type"]);
    }

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new CollectionRequest();

        $this->assertInstanceOf(AbstractRequest::class, $obj);

        $this->assertEquals(CollectionsRequest::COLLECTIONS_RESOURCE_PATH . "/", $obj->getResourcePath());
        $this->assertNull($obj->getId());
        $this->assertNull($obj->getType());

        $obj->setId("id");
        $this->assertEquals(CollectionsRequest::COLLECTIONS_RESOURCE_PATH . "/id", $obj->getResourcePath());
    }
}
