<?php

namespace App\Services;

class Program extends Content
{

    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $this->colour = 'Red';
        $this->layout = "polygon";
        $this->clickEvent = "warning";
    }
}
