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

use WBW\Library\Core\Model\Attribute\IntegerHeightTrait;
use WBW\Library\Core\Model\Attribute\IntegerIdTrait;
use WBW\Library\Core\Model\Attribute\IntegerWidthTrait;
use WBW\Library\Core\Model\Attribute\StringLinkTrait;

/**
 * Video file.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Model
 */
class VideoFile {

    use IntegerHeightTrait;
    use IntegerIdTrait {
        setId as public;
    }
    use IntegerWidthTrait;
    use StringLinkTrait;

    /**
     * File type.
     *
     * @var string
     */
    private $fileType;

    /**
     * Quality.
     *
     * @var string
     */
    private $quality;

    /**
     * Get the file type.
     *
     * @return string Returns the file type.
     */
    public function getFileType() {
        return $this->fileType;
    }

    /**
     * Get the quality.
     *
     * @return string Returns the quality.
     */
    public function getQuality() {
        return $this->quality;
    }

    /**
     * Set the file type.
     *
     * @param string $fileType The file type.
     * @return VideoFile Returns this video file.
     */
    public function setFileType($fileType) {
        $this->fileType = $fileType;
        return $this;
    }

    /**
     * Set the quality.
     *
     * @param string $quality Returns the quality.
     * @return VideoFile Returns this video file.
     */
    public function setQuality($quality) {
        $this->quality = $quality;
        return $this;
    }

}
