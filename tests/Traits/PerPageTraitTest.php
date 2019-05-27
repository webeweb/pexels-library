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
use WBW\Library\Pexels\Tests\Fixtures\Traits\TestPerPageTrait;

/**
 * Per page trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Traits
 */
class PerPageTraitTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new TestPerPageTrait();

        $this->assertNull($obj->getPerPage());
    }

    /**
     * Tests the setPerPage() method.
     *
     * @return void
     */
    public function testSetPerPage() {

        $obj = new TestPerPageTrait();

        $obj->setPerPage(15);
        $this->assertEquals(15, $obj->getPerPage());
    }
}
