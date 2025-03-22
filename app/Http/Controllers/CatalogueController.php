<?php

namespace App\Http\Controllers;

use App\Services\Catalogue\CatalogueServices;
class CatalogueController extends Controller
{
    //

    private $catalogueServices;  
 
    public function __construct(CatalogueServices $catalogueServices)
    {
    $this -> catalogueServices = $catalogueServices;
     
    }
    
    public function index(){
        $content = $this -> catalogueServices -> fetchContent();
        
    }
    
    
}