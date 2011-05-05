<?php
/**
 * PHPIMS
 *
 * Copyright (c) 2011 Christer Edvartsen <cogo@starzinger.net>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to
 * deal in the Software without restriction, including without limitation the
 * rights to use, copy, modify, merge, publish, distribute, sublicense, and/or
 * sell copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * * The above copyright notice and this permission notice shall be included in
 *   all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS
 * IN THE SOFTWARE.
 *
 * @package PHPIMS
 * @subpackage ImageTransformation
 * @author Christer Edvartsen <cogo@starzinger.net>
 * @copyright Copyright (c) 2011, Christer Edvartsen
 * @license http://www.opensource.org/licenses/mit-license MIT License
 * @link https://github.com/christeredvartsen/phpims
 */

namespace PHPIMS\Image\Transformation;

use PHPIMS\Image\TransformationInterface;
use \Imagine\ImageInterface;

/**
 * Thumbnail transformation
 *
 * @package PHPIMS
 * @subpackage ImageTransformation
 * @author Christer Edvartsen <cogo@starzinger.net>
 * @copyright Copyright (c) 2011, Christer Edvartsen
 * @license http://www.opensource.org/licenses/mit-license MIT License
 * @link https://github.com/christeredvartsen/phpims
 * @see PHPIMS\Operation\Plugin\ManipulateImage
 */
class Thumbnail implements TransformationInterface {
    /**
     * Width of the thumbnail
     *
     * @var int
     */
    private $width = 50;

    /**
     * Height of the thumbnail
     *
     * @var int
     */
    private $height = 50;

    /**
     * Fit type
     *
     * The thumbnail fit style. 'inset' or 'outbound'
     *
     * @var string
     */
    private $fit = 'outbound';

    /**
     * Class constructor
     *
     * @param int $width Width of the thumbnail
     * @param int $height Height of the thumbnail
     * @param string $fit Fit type. 'outbound' or 'inset'
     */
    public function __construct($width = null, $height = null, $fit = null) {
        if ($width !== null) {
            $this->width = (int) $width;
        }

        if ($height !== null) {
            $this->height = (int) $height;
        }

        if ($fit !== null) {
            $this->fit = $fit;
        }
    }

    /**
     * @see PHPIMS\Image\TransformationInterface::applyToImage()
     */
    public function applyToImage(ImageInterface $image) {
        return $image->thumbnail(
            new \Imagine\Image\Box($this->width, $this->height),
            $this->fit
        );
    }

    /**
     * @see PHPIMS\Image\TransformationInterface::getUrlTrigger()
     */
    public function getUrlTrigger() {
        $params = array(
            'width=' . $this->width,
            'height=' . $this->height,
            'fit=' . $this->fit,
        );

        return 'thumbnail:' . implode(',', $params);
    }
}