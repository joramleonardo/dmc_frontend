<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SDD_SJA extends Model
{
    protected $table = "sja_trainings_participants";
    protected $fillable = [
        'id', //1
        'name',
        'email',
        'sex',
        'age',
        'school',
        'gradeLevel',
        'position',
        'affiliation',
        'clientType',
        'event_id',
    ];
}
