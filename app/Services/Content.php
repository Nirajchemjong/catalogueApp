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
    private string $summary;
    private string $contentstatus;

    public function set(array $data): void
    {
        $this->fullname = $data['fullname'] ?? '';
        $this->imageurl = $data['imageurl'] ?? '';
        $this->summary = $data['summary'] ?? '';
        $this->summarytext = $data['summarytext'] ?? '';
        $this->contentType = $data['contenttype'] ?? '';
        $this->contentstatus = $data['contentstatus'] ?? '';
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
            'summary' => $this->summary,
            'contentstatus' => $this->contentstatus,
        ];
    }
}
