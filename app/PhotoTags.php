<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoTags extends Model
{
    protected $table = "tbl_photo_tags";
    protected $fillable = [
        'id', 
        'photo_id',
        'photo_tagName'
    ];
}
