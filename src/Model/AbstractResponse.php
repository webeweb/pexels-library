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

/**
 * Abstract response.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Model
 * @abstract
 */
abstract class AbstractResponse {

    use RateLimitTrait;

    /**
     * Medias.
     *
     * @var AbstractMedia[]
     */
    private $medias;

    /**
     * Raw response.
     *
     * @var string
     */
    private $rawResponse;

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
    protected function addMedia(AbstractMedia $media) {
        $this->medias[] = $media;
        return $this;
    }

    /**
     * Get the medias.
     *
     * @return AbstractMedia[] Returns the medias.
     */
    protected function getMedias() {
        return $this->medias;
    }

    /**
     * Get the raw response.
     *
     * @return string Returns the raw response.
     */
    public function getRawResponse() {
        return $this->rawResponse;
    }

    /**
     * Set the medias.
     *
     * @param AbstractMedia[] $medias The medias.
     * @return AbstractResponse Returns this response.
     */
    protected function setMedias(array $medias) {
        $this->medias = $medias;
        return $this;
    }

    /**
     * Set the raw response.
     *
     * @param string $rawResponse The raw response.
     * @return AbstractResponse Returns this response.
     */
    public function setRawResponse($rawResponse) {
        $this->rawResponse = $rawResponse;
        return $this;
    }
}
