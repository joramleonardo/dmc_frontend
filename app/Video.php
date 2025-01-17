<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = "tbl_video";
    protected $fillable = [
        'id', //1
        'aldum_id',
        'video_id',
        'video_link',
        'video_type',
        'video_personInvolved',
        'video_title',
        'video_description',
        'video_category',
        'video_duration',
        'video_videographer',
        'video_tags'
    ];

}
