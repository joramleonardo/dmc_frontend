<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SDD_OG_sja extends Model
{
    protected $table = "og_sja";
    protected $fillable = [
        'id', //1
        'title',
        'date',
        'participants',
        'female',
        'male',
        'prefer_not',
    ];
}
