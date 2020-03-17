<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Tests\Model\Attribute;

use WBW\Library\Pexels\Tests\AbstractTestCase;
use WBW\Library\Pexels\Tests\Fixtures\Model\Attribute\TestIntegerPerPageTrait;

/**
 * Integer per page trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Model\Attribute
 */
class IntegerPerPageTraitTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestIntegerPerPageTrait();

        $this->assertNull($obj->getPerPage());
    }

    /**
     * Tests the setPerPage() method.
     *
     * @return void
     */
    public function testSetPerPage() {

        $obj = new TestIntegerPerPageTrait();

        $obj->setPerPage(15);
        $this->assertEquals(15, $obj->getPerPage());
    }
}
