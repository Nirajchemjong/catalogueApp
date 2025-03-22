<?php

namespace App\Services;

class Content
{
    protected string $colour;
    protected string $layout;
    protected string $clickEvent;
    private string $fullname;
    private string $imageurl;
    private string $summarytext;
    private string $contentType;

    public function set(array $data): void
    {
        $this->fullname = $data['fullname'] ?? '';
        $this->imageurl = $data['imageurl'] ?? '';
        $this->summarytext = $data['summarytext'] ?? '';
        $this->contentType = $data['contenttype'] ?? '';
    }

    public function toArray(): array
    {
        return [
            'colour' => $this->colour,
            'fullname' => $this->fullname,
            'summarytext' => $this->summarytext,
            'imageurl' => $this->imageurl,
            'contentType' => $this->contentType,
            'layout' => $this->layout,
            'clickEvent' => $this->clickEvent,
        ];
    }
}