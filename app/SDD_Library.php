<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SDD_Library extends Model
{
    protected $table = "ollp";
    protected $fillable = [
        'id', //1
        'startTime',
        'completionTime',
        'email',
        'name',
        'sex',
        'category',
        'comments',
        'howLikely'
    ];
}
