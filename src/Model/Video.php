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
 * Video.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Model
 */
class Video extends AbstractMedia {

    /**
     * Duration.
     *
     * @var int
     */
    private $duration;

    /**
     * Full res.
     *
     * @var mixed
     */
    private $fullRes;

    /**
     * Image.
     *
     * @var string
     */
    private $image;

    /**
     * Video files.
     *
     * @var VideoFile[]
     */
    private $videoFiles;

    /**
     * Video pictures.
     *
     * @var VideoPicture[]
     */
    private $videoPictures;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setVideoFiles([]);
        $this->setVideoPictures([]);
    }

    /**
     * Add a video file.
     *
     * @param VideoFile $videoFile The video file.
     * @return Video Returns this video.
     */
    public function addVideoFile(VideoFile $videoFile) {
        $this->videoFiles[] = $videoFile;
        return $this;
    }

    /**
     * Add a video picture.
     *
     * @param VideoPicture $videoPicture The video picture.
     * @return Video Returns this video.
     */
    public function addVideoPicture(VideoPicture $videoPicture) {
        $this->videoPictures[] = $videoPicture;
        return $this;
    }

    /**
     * Get the duration.
     *
     * @return int Returns the duration.
     */
    public function getDuration() {
        return $this->duration;
    }

    /**
     * Get the full res.
     *
     * @return mixed Returns the full res.
     */
    public function getFullRes() {
        return $this->fullRes;
    }

    /**
     * Get the image.
     *
     * @return string Returns the image.
     */
    public function getImage() {
        return $this->image;
    }

    /**
     * Get the video files.
     *
     * @return VideoFile[] Returns teh video files.
     */
    public function getVideoFiles() {
        return $this->videoFiles;
    }

    /**
     * Get the video pictures.
     *
     * @return VideoPicture[] Returns teh video pictures.
     */
    public function getVideoPictures() {
        return $this->videoPictures;
    }

    /**
     * Set the duration.
     *
     * @param int $duration The duration.
     * @return Video Returns this video.
     */
    public function setDuration($duration) {
        $this->duration = $duration;
        return $this;
    }

    /**
     * Set the full re.
     *
     * @param mixed $fullRes The full res.
     * @return Video Returns this video.
     */
    public function setFullRes($fullRes) {
        $this->fullRes = $fullRes;
        return $this;
    }

    /**
     * Set the image.
     *
     * @param string $image The image.
     * @return Video Returns this video.
     */
    public function setImage($image) {
        $this->image = $image;
        return $this;
    }

    /**
     * Set the video files.
     *
     * @param VideoFile[] $videoFiles The video files.
     * @return Video Returns this video.
     */
    protected function setVideoFiles(array $videoFiles) {
        $this->videoFiles = $videoFiles;
        return $this;
    }

    /**
     * Set the video pictures.
     *
     * @param VideoPicture[] $videoPictures The video pictures.
     * @return Video Returns this video.
     */
    protected function setVideoPictures(array $videoPictures) {
        $this->videoPictures = $videoPictures;
        return $this;
    }
}
