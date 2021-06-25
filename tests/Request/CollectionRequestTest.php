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

use WBW\Library\Pexels\Request\CollectionRequest;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * Collection request test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Request
 */
class CollectionRequestTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new CollectionRequest();

        $this->assertEquals(CollectionRequest::COLLECTIONS_RESOURCE_PATH . "/", $obj->getResourcePath());

        $obj->setId("id");
        $this->assertEquals(CollectionRequest::COLLECTIONS_RESOURCE_PATH . "/id", $obj->getResourcePath());
    }
}
