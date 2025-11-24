<?php

namespace StevenPaw\SilverstripeStyleguide\Models;

use SilverStripe\ORM\FieldType\DBHTMLText;

/**
 * PlaceholderImage class that mimics SilverStripe Image behavior
 * but doesn't store anything in the database
 */
class PlaceholderImage
{
    private $width;
    private $height;
    private $url;

    public function __construct($width = 300, $height = 200)
    {
        $this->width = $width;
        $this->height = $height;
        $randomimage = $this->getRandomImageUrl($width, $height);
        $this->url = $randomimage;
    }

    public function getURL()
    {
        return $this->url;
    }

    public function URL()
    {
        return $this->url;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function Width()
    {
        return $this->width;
    }

    public function Height()
    {
        return $this->height;
    }

    /**
     * Mimics SilverStripe's FillMax method
     */
    public function FillMax($maxWidth, $maxHeight)
    {
        // Calculate aspect ratio preserving dimensions
        $ratio = min($maxWidth / $this->width, $maxHeight / $this->height);
        $newWidth = (int)($this->width * $ratio);
        $newHeight = (int)($this->height * $ratio);

        $randomimage = $this->getRandomImageUrl($newWidth, $newHeight);

        $html = sprintf(
            '<img src="%s" width="%d" height="%d" style="max-width: %dpx; max-height: %dpx;">',
            $randomimage,
            $newWidth,
            $newHeight,
            $maxWidth,
            $maxHeight
        );

        return DBHTMLText::create()->setValue($html);
    }

    /**
     * Mimics SilverStripe's FillMax method
     */
    public function FocusFillMax($maxWidth, $maxHeight)
    {
        // Calculate aspect ratio preserving dimensions
        $ratio = min($maxWidth / $this->width, $maxHeight / $this->height);
        $newWidth = (int)($this->width * $ratio);
        $newHeight = (int)($this->height * $ratio);

        $randomimage = $this->getRandomImageUrl($newWidth, $newHeight);

        $html = sprintf(
            '<img src="%s" width="%d" height="%d" style="max-width: %dpx; max-height: %dpx;">',
            $randomimage,
            $newWidth,
            $newHeight,
            $maxWidth,
            $maxHeight
        );

        return DBHTMLText::create()->setValue($html);
    }

    /**
     * Mimics SilverStripe's FitMax method
     * Fits the image to the given maximum dimensions while maintaining aspect ratio
     */
    public function FitMax($maxWidth, $maxHeight)
    {
        // Calculate aspect ratio preserving dimensions that fit within bounds
        $ratio = min($maxWidth / $this->width, $maxHeight / $this->height, 1);
        $newWidth = (int)($this->width * $ratio);
        $newHeight = (int)($this->height * $ratio);
        $randomimage = $this->getRandomImageUrl($newWidth, $newHeight);

        $html = sprintf(
            '<img src="%s" width="%d" height="%d" style="max-width: %dpx; max-height: %dpx;">',
            $randomimage,
            $newWidth,
            $newHeight,
            $maxWidth,
            $maxHeight
        );

        return DBHTMLText::create()->setValue($html);
    }

    /**
     * Mimics SilverStripe's Fill method
     * Crops and resizes the image to exactly fill the given dimensions
     */
    public function Fill($width, $height)
    {
        $randomimage = $this->getRandomImageUrl($width, $height);

        $html = sprintf(
            '<img src="%s" width="%d" height="%d" style="object-fit: cover;">',
            $randomimage,
            $width,
            $height,
            $width,
            $height
        );

        return DBHTMLText::create()->setValue($html);
    }

    /**
     * Mimics SilverStripe's Fill method
     * Crops and resizes the image to exactly fill the given dimensions
     */
    public function FocusFill($width, $height)
    {
        $randomimage = $this->getRandomImageUrl($width, $height);

        $html = sprintf(
            '<img src="%s" width="%d" height="%d" style="object-fit: cover;">',
            $randomimage,
            $width,
            $height,
            $width,
            $height
        );

        return DBHTMLText::create()->setValue($html);
    }

    /**
     * Mimics SilverStripe's Fit method
     * Fits the image within the given dimensions while maintaining aspect ratio
     */
    public function Fit($width, $height)
    {
        // Calculate aspect ratio preserving dimensions
        $ratio = min($width / $this->width, $height / $this->height);
        $newWidth = (int)($this->width * $ratio);
        $newHeight = (int)($this->height * $ratio);
        $randomimage = $this->getRandomImageUrl($newWidth, $newHeight);

        $html = sprintf(
            '<img src="%s" width="%d" height="%d" style="object-fit: contain;">',
            $randomimage,
            $newWidth,
            $newHeight
        );

        return DBHTMLText::create()->setValue($html);
    }

    /**
     * Mimics SilverStripe's ScaleWidth method
     */
    public function ScaleWidth($width)
    {
        $ratio = $width / $this->width;
        $height = (int)($this->height * $ratio);

        $randomimage = $this->getRandomImageUrl($width, $height);

        $html = sprintf(
            '<img src="%s" width="%d" height="%d">',
            $randomimage,
            $width,
            $height,
        );

        return DBHTMLText::create()->setValue($html);
    }

    /**
     * Mimics SilverStripe's ScaleHeight method
     */
    public function ScaleHeight($height)
    {
        $ratio = $height / $this->height;
        $width = (int)($this->width * $ratio);

        $randomimage = $this->getRandomImageUrl($width, $height);

        $html = sprintf(
            '<img src="%s" width="%d" height="%d">',
            $randomimage,
            $width,
            $height,
            $width,
            $height
        );

        return DBHTMLText::create()->setValue($html);
    }

    public function __toString()
    {
        $randomimage = $this->getRandomImageUrl($this->width, $this->height);
        $html = sprintf(
            '<img src="%s" width="%d" height="%d">',
            $randomimage,
            $this->width,
            $this->height
        );

        return DBHTMLText::create()->setValue($html)->forTemplate();
    }

    /**
     * Returns true so templates can check if image exists
     */
    public function exists()
    {
        return true;
    }

    public function getRandomImageUrl($width, $height, $grayscale = false, $blur = 0)
    {
        if($grayscale || $blur > 0) {
            $url = "https://picsum.photos/{$width}/{$height}";
            $params = [];
            if ($grayscale) {
                $params[] = "grayscale";
            }
            if ($blur > 0) {
                $params[] = "blur={$blur}";
            }
            if (!empty($params)) {
                $url .= "?" . implode("&", $params);
            }
            return $url;
        }
        return "https://picsum.photos/{$width}/{$height}";
    }
}
