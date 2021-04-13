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

use WBW\Library\Pexels\Request\PopularVideosRequest;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * Popular videos request test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Request
 */
class PopularVideosRequestTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function test__construct(): void {

        $this->assertEquals("/videos/popular", PopularVideosRequest::POPULAR_VIDEOS_RESOURCE_PATH);

        $obj = new PopularVideosRequest();

        $this->assertEquals(PopularVideosRequest::POPULAR_VIDEOS_RESOURCE_PATH, $obj->getResourcePath());
        $this->assertNull($obj->getMaxDuration());
        $this->assertNull($obj->getMaxWidth());
        $this->assertNull($obj->getMinDuration());
        $this->assertNull($obj->getMinWidth());
        $this->assertEquals(1, $obj->getPage());
        $this->assertEquals(15, $obj->getPerPage());
    }
}
