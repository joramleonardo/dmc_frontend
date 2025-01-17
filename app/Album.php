<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = "tbl_album";
    protected $fillable = [
        'id', //1
        'aldum_id',
        'event_title',
        'event_category',
        'event_sector',
        'event_description',
        'event_organizingAgency',
        'event_date',
        'event_venue',
        'event_tags',
    ];
}
