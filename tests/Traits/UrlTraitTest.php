<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Tests\Traits;

use WBW\Library\Pexels\Tests\AbstractTestCase;
use WBW\Library\Pexels\Tests\Fixtures\Traits\TestUrlTrait;

/**
 * URL trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Traits
 */
class UrlTraitTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestUrlTrait();

        $this->assertNull($obj->getUrl());
    }

    /**
     * Tests the setUrl() method.
     *
     * @return void
     */
    public function testSetUrl() {

        $obj = new TestUrlTrait();

        $obj->setUrl("url");
        $this->assertEquals("url", $obj->getUrl());
    }
}
