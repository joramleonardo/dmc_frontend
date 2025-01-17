<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = "tbl_photo";
    protected $fillable = [
        'id', //1
        'aldum_id',
        'photo_id',
        'photo_fileName',
        'photo_personInvolved',
        'photo_title',
        'photo_description',
        'photo_category',
        'photo_photographer',
        'photo_tags', //10
    ];
}
