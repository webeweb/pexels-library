<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Tests\Model\Request;

use WBW\Library\Pexels\Model\Request\GetPhotoRequest;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * Get photo request test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Model\Request
 */
class GetPhotoRequestTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $this->assertEquals("/v1/photo/:id", GetPhotoRequest::GET_PHOTO_RESOURCE_PATH);

        $obj = new GetPhotoRequest();

        $this->assertEquals(GetPhotoRequest::GET_PHOTO_RESOURCE_PATH, $obj->getResourcePath());
        $this->assertNull($obj->getId());
        $this->assertEquals(":id", $obj->getSubstituteName());
    }

    /**
     * Tests the getSubstituteValue() method.
     *
     * @return void
     */
    public function testGetSubstituteValue() {

        $obj = new GetPhotoRequest();

        $obj->setId(1);
        $this->assertEquals(1, $obj->getSubstituteValue());
    }
}