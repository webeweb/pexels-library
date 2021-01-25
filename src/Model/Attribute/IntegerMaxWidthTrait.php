<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Model\Attribute;

/**
 * Integer max width trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Model\Attribute
 */
trait IntegerMaxWidthTrait {

    /**
     * Max width.
     *
     * @var int|null
     */
    private $maxWidth;

    /**
     * Get the max width.
     *
     * @return int|null Returns the max width.
     */
    public function getMaxWidth(): ?int {
        return $this->maxWidth;
    }

    /**
     * Set the max width.
     *
     * @param int|null $maxWidth The max width.
     * @return self Returns this instance.
     */
    public function setMaxWidth(?int $maxWidth): self {
        $this->maxWidth = $maxWidth;
        return $this;
    }
}
