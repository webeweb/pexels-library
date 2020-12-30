<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Model\Request;

use WBW\Library\Core\Model\Attribute\IntegerIdTrait;
use WBW\Library\Pexels\API\SubstituteRequestInterface;
use WBW\Library\Pexels\Model\AbstractRequest;

/**
 * Get video request.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Model\Request
 */
class GetVideoRequest extends AbstractRequest implements SubstituteRequestInterface {

    use IntegerIdTrait {
        setId as public;
    }

    /**
     * Get video resource path.
     *
     * @var string
     */
    const GET_VIDEO_RESOURCE_PATH = "/v1/videos/videos/:id";

    /**
     * {@inheritDoc}
     */
    public function getResourcePath(): string {
        return self::GET_VIDEO_RESOURCE_PATH;
    }

    /**
     * {@inheritdoc}
     */
    public function getSubstituteName(): string {
        return ":id";
    }

    /**
     * {@inheritdoc}
     */
    public function getSubstituteValue() {
        return $this->getId();
    }
}
