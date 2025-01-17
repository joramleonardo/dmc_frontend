<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoTags extends Model
{
    protected $table = "tbl_video_tags";
    protected $fillable = [
        'id', 
        'video_id',
        'video_tagName'
    ];
}
