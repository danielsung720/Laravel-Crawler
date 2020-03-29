<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Constellation extends Model
{
    protected $primarykey = 'id';
    protected $table = 'constellation';
    protected $fillable = [
        'date',
        'constellation',
        'overall_star',
        'overall_description',
        'love_star',
        'love_description',
        'career_star',
        'career_description',
        'money_star',
        'money_description'
    ];
}
