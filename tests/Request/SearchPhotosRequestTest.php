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

use WBW\Library\Pexels\Request\SearchPhotosRequest;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * Search photos request test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\Pexels\Tests\Request
 */
class SearchPhotosRequestTest extends AbstractTestCase {

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("/v1/search", SearchPhotosRequest::SEARCH_PHOTOS_RESOURCE_PATH);

        $obj = new SearchPhotosRequest();

        $this->assertEquals(SearchPhotosRequest::SEARCH_PHOTOS_RESOURCE_PATH, $obj->getResourcePath());
        $this->assertNull($obj->getColor());
        $this->assertNull($obj->getLocale());
        $this->assertNull($obj->getOrientation());
        $this->assertEquals(1, $obj->getPage());
        $this->assertEquals(15, $obj->getPerPage());
        $this->assertNull($obj->getQuery());
        $this->assertNull($obj->getSize());
    }
}
