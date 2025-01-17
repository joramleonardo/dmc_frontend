<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SDD_OG_ollp extends Model
{
    protected $table = "og_ollp";
    protected $fillable = [
        'id', //1
        'date',
        'school',
        'zoom_attendance',
        'received_feedback',
        'female',
        'male',
    ];
}
