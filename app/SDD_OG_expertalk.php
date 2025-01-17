<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SDD_OG_expertalk extends Model
{
    protected $table = "og_expertalk";
    protected $fillable = [
        'id', //1
        'date_aired',
        'topic',
        'guest_name',
        'guest_gender',
        'reach',
        'views',
        'engagement'
    ];
}
