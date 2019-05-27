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

use WBW\Library\Pexels\Model\Request\SearchPhotosRequest;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * Search photos request test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Model\Request
 */
class SearchPhotosRequestTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $this->assertEquals("/v1/search", SearchPhotosRequest::SEARCH_PHOTOS_RESOURCE_PATH);

        $obj = new SearchPhotosRequest();

        $this->assertEquals(SearchPhotosRequest::SEARCH_PHOTOS_RESOURCE_PATH, $obj->getResourcePath());
        $this->assertEquals(1, $obj->getPage());
        $this->assertEquals(15, $obj->getPerPage());
        $this->assertNull($obj->getQuery());
    }
}
