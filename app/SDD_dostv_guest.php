<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SDD_dostv_guest extends Model
{
    protected $table = "dostv_expertalk_guest";
    protected $fillable = [
        'id', //1
        'expertalk_id',
        'name',
        'sex'
    ];
}
