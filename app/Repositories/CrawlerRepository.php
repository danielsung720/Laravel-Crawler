<?php

namespace App\Repositories;

use App\Model\Constellation;

class CrawlerRepository extends Constellation
{
    public function createData($data)
    {
        $this->create([
            'date' => $data['date'],
            'constellation' => $data['Constellation'],
            'overall_star' => $data['OverallStar'],
            'overall_description' => $data['OverallDescription'],
            'love_star' => $data['LoveStar'],
            'love_description' => $data['LoveDescription'],
            'career_star' => $data['CareerStar'],
            'career_description' => $data['CareerDescription'],
            'money_star' => $data['MoneyStar'],
            'money_description' => $data['MoneyDescription'],
        ]);
    }
}