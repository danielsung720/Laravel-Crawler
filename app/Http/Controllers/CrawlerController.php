<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CrawlerService;

class CrawlerController extends Controller
{
    /** @var  CrawlerService */
    private $crawlerService;

    public function __construct(CrawlerService $crawlerService)
    {
        $this->crawlerService = $crawlerService;
    }

    public function testGetAllData()
    {
            $data = $this->crawlerService->getAllData();
            
            print_r($data);
    }

    public function testGetOneData()
    {
        $i = 1;
        $data = $this->crawlerService->getOneData($i);
            
        print_r($data);
    }
}