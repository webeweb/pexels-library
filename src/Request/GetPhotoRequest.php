<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace WBW\Library\Pexels\Request;

use WBW\Library\Common\Provider\SubstituableRequestInterface;
use WBW\Library\Common\Traits\Integers\IntegerIdTrait;
use WBW\Library\Pexels\Response\AbstractResponse;
use WBW\Library\Pexels\Serializer\ResponseDeserializer;

/**
 * Get photo request.
 *
 * @author webeweb <https://github.com/webeweb>
 * @package WBW\Library\Pexels\Request
 */
class GetPhotoRequest extends AbstractRequest implements SubstituableRequestInterface {

    use IntegerIdTrait {
        setId as public;
    }

    /**
     * Get photo resource path.
     *
     * @var string
     */
    public const GET_PHOTO_RESOURCE_PATH = "/v1/photos/:id";

    /**
     * {@inheritDoc}
     */
    public function deserializeResponse(string $rawResponse): AbstractResponse {
        return ResponseDeserializer::deserializePhotoResponse($rawResponse);
    }

    /**
     * {@inheritDoc}
     */
    public function getResourcePath(): string {
        return self::GET_PHOTO_RESOURCE_PATH;
    }

    /**
     * {@inheritDoc}
     */
    public function getSubstituables(): array {

        return [
            ":id" => $this->getId(),
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function serializeRequest(): array {
        return [];
    }
}
