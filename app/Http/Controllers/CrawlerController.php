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
        for($i = 0; $i <= 11; $i++) {
            $crawler = $this->crawlerService->getOriginalData("http://astro.click108.com.tw/daily_10.php?iAstro=$i");
            $target = $this->crawlerService->getOneData($crawler);
            
            print_r($target);
        }

    }
}