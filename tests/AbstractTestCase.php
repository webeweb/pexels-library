<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Tests;

use PHPUnit\Framework\TestCase;

/**
 * Abstract test case.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\Pexels\Tests
 * @abstract
 */
abstract class AbstractTestCase extends TestCase {

    /**
     * Get a token.
     *
     * @return string Returns the token.
     */
    public static function getToken(): string {

        $path = __DIR__ . "/../.token";
        if (true === file_exists($path)) {
            return file_get_contents($path);
        }

        return "API_TOKEN_MOCK";
    }
}
