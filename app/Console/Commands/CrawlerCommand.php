<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CrawlerService;

class CrawlerCommand extends Command
{
    protected $signature = 'constellation:Log';

    protected $description = '儲存星座資訊';

    protected $crawlerService;

    public function __construct(CrawlerService $crawlerService)
    {
        parent::__construct();
        $this->crawlerService = $crawlerService;
    }

    public function handle()
    {
        $this->crawlerService->getAllData();
    }
}