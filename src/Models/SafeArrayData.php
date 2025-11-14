<?php

namespace StevenPaw\SilverstripeStyleguide\Models;

use SilverStripe\Model\ArrayData;

/**
 * Extended ArrayData that doesn't convert objects unnecessarily
 */
class SafeArrayData extends ArrayData
{
    /**
     * Override the getValue method to return objects as-is
     */
    public function getValue($field)
    {
        $value = parent::getValue($field);
        return $value;
    }

    /**
     * Override magic getter to return objects as-is
     */
    public function __get(string $property): mixed
    {
        // Check if the property exists in our data array directly
        $data = $this->toMap();
        if (isset($data[$property])) {
            return $data[$property];
        }

        // Fallback to parent behavior
        return parent::__get($property);
    }
}
