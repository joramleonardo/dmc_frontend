<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SDD_hr extends Model
{
    protected $table = "employee_trainings";
    protected $fillable = [
        'id', //1
        'training_id',
        'training_title',
        'training_nature',
        'training_startDate',
        'training_endDate',
        'training_location',
        'training_participants',
        'training_participantsPosition',
        'training_participantsGender',
        'training_participantsDivision',
    ];
}
