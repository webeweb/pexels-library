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
use WBW\Library\Pexels\Tests\Fixtures\Traits\TestLinkTrait;

/**
 * Link trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Traits
 */
class LinkTraitTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestLinkTrait();

        $this->assertNull($obj->getLink());
    }

    /**
     * Tests the setLink() method.
     *
     * @return void
     */
    public function testSetLink() {

        $obj = new TestLinkTrait();

        $obj->setLink("link");
        $this->assertEquals("link", $obj->getLink());
    }
}
