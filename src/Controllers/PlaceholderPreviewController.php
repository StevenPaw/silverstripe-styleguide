<?php

namespace StevenPaw\SilverstripeStyleguide\Controllers;

use SilverStripe\Model\ArrayData;
use SilverStripe\Control\Controller;
use SilverStripe\Control\HTTPRequest;
use StevenPaw\SilverstripeStyleguide\Extensions\PlaceholderDataExtension;
use StevenPaw\SilverstripeStyleguide\Models\PlaceholderButton;

/**
 * Class SilverstripePlaceholders\Controllers\PlaceholderPreviewController
 *
 */
class PlaceholderPreviewController extends Controller
    {
        private static $allowed_actions = [''];
        private static $url_segment = 'placeholderpreview';

        public function index(HTTPRequest $request)
        {
            return $this->customise([])->renderWith(['StevenPaw\SilverstripeStyleguide\Controllers\PlaceholderPreviewController', 'App\Controllers\PlaceholderPreviewController']);
        }

        /**
         * Get placeholder data for a specific element type
         * Usage: $getPlaceholdersForElement("TeaserElement")
         */
        public function getPlaceholdersForElement($elementType)
        {
            $elementClass = "App\\Elements\\{$elementType}";

            if (!class_exists($elementClass)) {
                return ArrayData::create();
            }

            $element = $elementClass::create();
            $placeholderData = $element->getPlaceholderData();

            // Extension returns SafeArrayData with preserved objects
            return $placeholderData;
        }
        /**
         * Legacy helper for backward compatibility
         * Usage: $getPlaceholderImage(600, 400)
         */
        public static function getPlaceholderImage($width = 300, $height = 200)
        {
            return PlaceholderDataExtension::createPlaceholderImage($width, $height);
        }

        /**
         * Legacy helper for backward compatibility
         * Usage: $getPlaceholderText(400)
         */
        public static function getPlaceholderText($length = 100)
        {
            $loremIpsum = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
            return substr($loremIpsum, 0, $length);
        }

        /**
         * Get placeholder button
         * Usage: $getPlaceholderButton()
         */
        public static function getPlaceholderButton($title = 'Mehr erfahren', $url = '#', $opensInNewWindow = false)
        {
            return new PlaceholderButton($title, $url, $opensInNewWindow);
        }
    }
