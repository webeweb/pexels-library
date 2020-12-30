<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Model;

use WBW\Library\Core\Model\Attribute\StringRawResponseTrait;

/**
 * Abstract response.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Model
 * @abstract
 */
abstract class AbstractResponse {

    use RateLimitTrait;
    use StringRawResponseTrait;

    /**
     * Medias.
     *
     * @var AbstractMedia[]
     */
    private $medias;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setMedias([]);
    }

    /**
     * Add a media.
     *
     * @param AbstractMedia $media The media.
     * @return AbstractResponse Returns this response.
     */
    protected function addMedia(AbstractMedia $media): AbstractResponse {
        $this->medias[] = $media;
        return $this;
    }

    /**
     * Get the medias.
     *
     * @return AbstractMedia[] Returns the medias.
     */
    protected function getMedias(): array {
        return $this->medias;
    }

    /**
     * Set the medias.
     *
     * @param AbstractMedia[] $medias The medias.
     * @return AbstractResponse Returns this response.
     */
    protected function setMedias(array $medias): AbstractResponse {
        $this->medias = $medias;
        return $this;
    }
}
