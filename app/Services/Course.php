<?php

namespace App\Services;

class Course extends Content
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $this->colour = "green";
        $this->layout = "circle";
        $this->clickEvent = "alert";
    }
}
