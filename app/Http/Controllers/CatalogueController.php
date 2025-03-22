<?php

namespace App\Http\Controllers;

use App\Services\CatalogueServices;
use App\Services\Course;
use App\Services\LiveLearning;
use App\Services\Program;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CatalogueController extends Controller
{
    //
    private $catalogueServices;

    public function __construct(CatalogueServices $catalogueServices)
    {
        $this->catalogueServices = $catalogueServices;
    }

    public function index()
    {
        $data =  [];
        $catalogues = $this->catalogueServices->fetchContent();
        foreach ($catalogues as $catalogue) {
            if ($catalogue['contenttype'] == 'Course') {
                $course = new Course();
                $course->set($catalogue);
                $data[] = $course->toArray();
            } else if ($catalogue['contenttype'] == 'Live Learning') {
                $liveLearning = new LiveLearning();
                $liveLearning->set($catalogue);
                $data[] = $liveLearning->toArray();
            } else if ($catalogue['contenttype'] == 'Program') {
                $program = new Program();
                $program->set($catalogue);
                $data[] = $program->toArray();
            }
        }
        return Inertia::render('Catalogue', [
            'data' => $data,
            'quote' => [
                'message' => 'This is a Acron Take Home Project',
                'author' => 'Niraj Chemjong',
            ],
        ]);
    }
}
