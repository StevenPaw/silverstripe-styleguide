<?php

namespace StevenPaw\SilverstripeStyleguide\Models;

/**
 * PlaceholderButton class that mimics SilverStripe Link behavior
 * but doesn't store anything in the database
 */
class PlaceholderButton
{
    private $title;
    private $url;
    private $linkText;
    private $opensInNewWindow;

    public function __construct($title = 'Mehr erfahren', $url = '#', $opensInNewWindow = false)
    {
        $this->title = $title;
        $this->url = $url;
        $this->linkText = $title;
        $this->opensInNewWindow = $opensInNewWindow;
    }

    /**
     * Get the title of the button/link
     */
    public function Title()
    {
        return $this->title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the URL
     */
    public function URL()
    {
        return $this->url;
    }

    public function getURL()
    {
        return $this->url;
    }

    /**
     * Get link text (often same as title)
     */
    public function LinkText()
    {
        return $this->linkText;
    }

    public function getLinkText()
    {
        return $this->linkText;
    }

    /**
     * Check if link opens in new window
     */
    public function OpenInNew()
    {
        return $this->opensInNewWindow;
    }

    public function getOpenInNew()
    {
        return $this->opensInNewWindow;
    }

    /**
     * Returns true so templates can check if button exists
     */
    public function exists()
    {
        return true;
    }

    /**
     * Get target attribute for link
     */
    public function getTarget()
    {
        return $this->opensInNewWindow ? '_blank' : '_self';
    }

    public function Target()
    {
        return $this->getTarget();
    }
}
