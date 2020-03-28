<?php

namespace App\Services;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class CrawlerService
{
    /** @var Client  */
    private $client;

    public function __construct()
    {
        $this->client = app(Client::class);
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

    public function getOneData($crawler)
    {
        $data['date'] = array_first($this->getDate($crawler));
        $data['Constellation'] = array_first($this->getConstellation($crawler));
        $data['OverallStar'] = array_first($this->getOverallStar($crawler));
        $data['OverallStarDescription'] = array_first($this->getOverallDescription($crawler));
        $data['LoveStar'] = array_first($this->getLoveStar($crawler));
        $data['LoveDescription'] = array_first($this->getLoveDescription($crawler));
        $data['CareerStar'] = array_first($this->getCareerStar($crawler));
        $data['CareerDescription'] = array_first($this->getCareerDescription($crawler));
        $data['MoneyStar'] = array_first($this->getMoneyStar($crawler));
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