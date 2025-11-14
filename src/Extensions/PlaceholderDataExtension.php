<?php

namespace StevenPaw\SilverstripeStyleguide\Extensions;

use StevenPaw\SilverstripeStyleguide\Models\SafeArrayData;
use SilverStripe\Core\Extension;

/**
 * Extension that provides placeholder data for all Elemental blocks
 * Used for typography examples and prototyping
 */
class PlaceholderDataExtension extends Extension
{
    /**
     * Get placeholder data configuration for this element type
     */
    public function getPlaceholderData()
    {
        // Get Custom Data from element
        if ($this->owner->hasMethod('providePlaceholderData')) {
            $customData = $this->owner->providePlaceholderData();
        } else {
            $customData = [];
        }

        // Convert array to SafeArrayData to preserve objects in templates
        return SafeArrayData::create($customData);
    }
}
