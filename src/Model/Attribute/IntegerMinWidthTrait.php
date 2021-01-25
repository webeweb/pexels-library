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
 * Integer min width trait.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Model\Attribute
 */
trait IntegerMinWidthTrait {

    /**
     * Min width.
     *
     * @var int|null
     */
    private $minWidth;

    /**
     * Get the min width.
     *
     * @return int|null Returns the min width.
     */
    public function getMinWidth(): ?int {
        return $this->minWidth;
    }

    /**
     * Set the min width.
     *
     * @param int|null $minWidth The min width.
     * @return self Returns this instance.
     */
    public function setMinWidth(?int $minWidth): self {
        $this->minWidth = $minWidth;
        return $this;
    }
}
