<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SDD_dostv extends Model
{
    protected $table = "dostv_expertalk";
    protected $fillable = [
        'id', //1
        'dateAired',
        'topic',
        'description',
        'links',
        'socAgenda'
    ];
}
