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
use WBW\Library\Pexels\Tests\Fixtures\Model\Attribute\TestIntegerMaxDurationTrait;

/**
 * Integer max duration trait test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Model\Attribute
 */
class IntegerMaxDurationTraitTest extends AbstractTestCase {

    /**
     * Tests the setMaxDuration() method.
     *
     * @return void
     */
    public function testSetMaxDuration(): void {

        $obj = new TestIntegerMaxDurationTrait();

        $obj->setMaxDuration(60);
        $this->assertEquals(60, $obj->getMaxDuration());
    }
}
