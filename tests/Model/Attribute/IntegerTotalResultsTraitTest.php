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
use WBW\Library\Pexels\Tests\Fixtures\Model\Attribute\TestIntegerTotalResultsTrait;

/**
 * Integer total results trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Model\Attribute
 */
class IntegerTotalResultsTraitTest extends AbstractTestCase {

    /**
     * Tests the setTotalResults() method.
     *
     * @return void
     */
    public function testSetTotalResults(): void {

        $obj = new TestIntegerTotalResultsTrait();

        $obj->setTotalResults(1);
        $this->assertEquals(1, $obj->getTotalResults());
    }
}
