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

use WBW\Library\Pexels\Model\Request\CuratedPhotosRequest;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * Curated request test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Model\Request
 */
class CuratedPhotosRequestTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct() {

        $this->assertEquals("/v1/curated", CuratedPhotosRequest::CURATED_PHOTO_RESOURCE_PATH);

        $obj = new CuratedPhotosRequest();

        $this->assertEquals(CuratedPhotosRequest::CURATED_PHOTO_RESOURCE_PATH, $obj->getResourcePath());
        $this->assertEquals(1, $obj->getPage());
        $this->assertEquals(15, $obj->getPerPage());
    }
}
