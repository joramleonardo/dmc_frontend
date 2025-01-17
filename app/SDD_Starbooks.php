<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SDD_Starbooks extends Model
{
    protected $table = "tbllogbooks";
    protected $fillable = [
        'id', //1
        'Date',
        'intGender',
        'intCategory'
    ];
}
