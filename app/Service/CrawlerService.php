<?php

namespace App\Services;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use App\Repositories\CrawlerRepository;

class CrawlerService
{
    /** @var Client  */
    private $client;
    private $crawlerRepository;

    public function __construct(CrawlerRepository $crawlerRepository)
    {
        $this->client = app(Client::class);
        $this->crawlerRepository = $crawlerRepository;
    }

    /**
    * @param string $path
    * @return Crawler
    */
    public function getOriginalData(string $path): Crawler
    {
        $content = $this->client->get($path)->getBody()->getContents();
        $crawler = new Crawler();

        $crawler->addHtmlContent($content);

        return $crawler;
    }

    public function getAllData()
    {
        for($i = 0; $i <= 11; $i++) {
            $crawler = $this->getOriginalData("http://astro.click108.com.tw/daily_10.php?iAstro=$i");
            $data = $this->getData($crawler);

            $this->crawlerRepository->createData($data);
        }
    }

    public function getOneData($i)
    {
            $crawler = $this->getOriginalData("http://astro.click108.com.tw/daily_10.php?iAstro=$i");
            $data = $this->getData($crawler);

            $this->crawlerRepository->createData($data);
    }

    public function getData($crawler)
    {
        $data['date'] = array_first($this->getDate($crawler));
        $data['Constellation'] = array_first($this->getConstellation($crawler));
        $data['OverallStar'] = array_first($this->getOverallStar($crawler));
        $data['OverallStar'] = mb_substr($data['OverallStar'], 4, 5,'UTF-8');
        $data['OverallDescription'] = array_first($this->getOverallDescription($crawler));
        $data['LoveStar'] = array_first($this->getLoveStar($crawler));
        $data['LoveStar'] = mb_substr($data['LoveStar'], 4, 5,'UTF-8');
        $data['LoveDescription'] = array_first($this->getLoveDescription($crawler));
        $data['CareerStar'] = array_first($this->getCareerStar($crawler));
        $data['CareerStar'] = mb_substr($data['CareerStar'], 4, 5,'UTF-8');
        $data['CareerDescription'] = array_first($this->getCareerDescription($crawler));
        $data['MoneyStar'] = array_first($this->getMoneyStar($crawler));
        $data['MoneyStar'] = mb_substr($data['MoneyStar'], 4, 5,'UTF-8');
        $data['MoneyDescription'] = array_first($this->getMoneyDescription($crawler));

        return $data;
    }

    public function getDate(Crawler $node)
    {
        return $node->filterXPath('//option[1]')
            ->each(function (Crawler $node) {
                return $node->text();
            });
    }

    public function getConstellation(Crawler $node)
    {
        return $node->filterXPath('//h3[1]')
            ->each(function (Crawler $node) {
                return $node->text();
            });
    }

    public function getOverallStar(Crawler $node)
    {
        return $node->filterXPath('//p[5]')
            ->each(function (Crawler $node) {
                return $node->text();
            });
    }
    
    public function getOverallDescription(Crawler $node)
    {
        return $node->filterXPath('//p[6]')
            ->each(function (Crawler $node) {
                return $node->text();
            });
    }

    public function getLoveStar(Crawler $node)
    {
        return $node->filterXPath('//p[7]')
            ->each(function (Crawler $node) {
                return $node->text();
            });
    }

    public function getLoveDescription(Crawler $node)
    {
        return $node->filterXPath('//p[8]')
            ->each(function (Crawler $node) {
                return $node->text();
            });
    }

    public function getCareerStar(Crawler $node)
    {
        return $node->filterXPath('//p[9]')
            ->each(function (Crawler $node) {
                return $node->text();
            });
    }

    public function getCareerDescription(Crawler $node)
    {
        return $node->filterXPath('//p[10]')
            ->each(function (Crawler $node) {
                return $node->text();
            });
    }

    public function getMoneyStar(Crawler $node)
    {
        return $node->filterXPath('//p[11]')
            ->each(function (Crawler $node) {
                return $node->text();
            });
    }

    public function getMoneyDescription(Crawler $node)
    {
        return $node->filterXPath('//p[12]')
            ->each(function (Crawler $node) {
                return $node->text();
            });
    }
}