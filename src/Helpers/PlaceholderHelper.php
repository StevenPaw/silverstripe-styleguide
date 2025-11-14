<?php

namespace StevenPaw\SilverstripeStyleguide\Extensions;

use StevenPaw\SilverstripeStyleguide\Models\PlaceholderImage;
use StevenPaw\SilverstripeStyleguide\Models\PlaceholderButton;
use StevenPaw\SilverstripeStyleguide\Models\SafeArrayData;
use SilverStripe\Core\Extension;
use SilverStripe\ORM\FieldType\DBHTMLText;

/**
 * Extension that provides placeholder data for all Elemental blocks
 * Used for typography examples and prototyping
 */
class PlaceholderHelper
{
    /**
     * Static helper for creating placeholder images
     */
    public static function createPlaceholderImage($width = 400, $height = 300)
    {
        return new PlaceholderImage($width, $height);
    }

    /**
     * Static helper for creating placeholder buttons
     */
    public static function createPlaceholderButton($title = 'Mehr erfahren', $url = '#', $opensInNewWindow = false)
    {
        return new PlaceholderButton($title, $url, $opensInNewWindow);
    }

    /**
     * Get placeholder text of specified length
     */
    public static function createPlaceholderText($length = 150)
    {
        $lorem = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.";

        //If Length is more than lorem, repeat it and add random words and line breaks
        while (strlen($lorem) < $length) {
            $words = ["consectetur", "adipiscing", "elit", "sed", "do", "eiusmod", "tempor", "incididunt", "ut", "labore", "et", "dolore", "magna", "aliqua"];
            $randomWord = $words[array_rand($words)];
            $lorem .= " " . $randomWord;
            $lorem .= " " . $lorem;
            $lorem .= "\n";
        }

        $text = substr($lorem, 0, $length);

        if ($length < strlen($lorem)) {
            $lastSpace = strrpos($text, ' ');
            if ($lastSpace !== false && $lastSpace > $length * 0.8) {
                $text = substr($text, 0, $lastSpace);
            }
        }

        return DBHTMLText::create()->setValue("<p>{$text}</p>");
    }
}
