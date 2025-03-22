<?php

namespace App\Services;

class LiveLearning extends Content
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $this->colour = "blue";
        $this->layout = "rectangle";
        $this->clickEvent = "success";
    }
}