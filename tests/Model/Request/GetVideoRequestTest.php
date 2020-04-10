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

use WBW\Library\Pexels\Model\Request\GetVideoRequest;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * Get video request test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Model\Request
 */
class GetVideoRequestTest extends AbstractTestCase {

    /**
     * Tests the getSubstituteValue() method.
     *
     * @return void
     */
    public function testGetSubstituteValue() {

        $obj = new GetVideoRequest();

        $obj->setId(1);
        $this->assertEquals(1, $obj->getSubstituteValue());
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $this->assertEquals("/v1/videos/videos/:id", GetVideoRequest::GET_VIDEO_RESOURCE_PATH);

        $obj = new GetVideoRequest();

        $this->assertEquals(GetVideoRequest::GET_VIDEO_RESOURCE_PATH, $obj->getResourcePath());
        $this->assertNull($obj->getId());
        $this->assertEquals(":id", $obj->getSubstituteName());
    }
}
