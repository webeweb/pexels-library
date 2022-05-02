<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2020 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Tests\Model;

use WBW\Library\Pexels\Model\User;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * User test.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\Pexels\Tests\Model
 */
class UserTest extends AbstractTestCase {

    /**
     * Tests __construct()
     *
     * @return void
     */
    public function test__construct(): void {

        $obj = new User();

        $this->assertNull($obj->getId());
        $this->assertNull($obj->getName());
        $this->assertNull($obj->getRawData());
        $this->assertNull($obj->getUrl());
    }
}
