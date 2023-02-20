<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Tests\Traits\Strings;

use WBW\Library\Pexels\Tests\AbstractTestCase;
use WBW\Library\Pexels\Tests\Fixtures\Traits\Strings\TestStringPrevPageTrait;

/**
 * String prev page trait test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\Pexels\Tests\Traits\Strings
 */
class StringPrevPageTraitTest extends AbstractTestCase {

    /**
     * Tests setPrevPage()
     *
     * @return void
     */
    public function testSetPrevPage(): void {

        $obj = new TestStringPrevPageTrait();

        $obj->setPrevPage("prevPage");
        $this->assertEquals("prevPage", $obj->getPrevPage());
    }
}
