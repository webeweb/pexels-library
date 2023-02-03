<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Tests\Fixtures\Provider;

use WBW\Library\Pexels\Provider\ApiProvider;
use WBW\Library\Pexels\Response\AbstractResponse;

/**
 * Test API provider.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\Pexels\Tests\Fixtures\Provider
 */
class TestApiProvider extends ApiProvider {

    /**
     * {@inheritdoc}
     */
    public function populateResponse(AbstractResponse $response): AbstractResponse {
        return parent::populateResponse($response);
    }
}
