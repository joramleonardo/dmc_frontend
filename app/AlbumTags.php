<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlbumTags extends Model
{
    protected $table = "tbl_album_tags";
    protected $fillable = [
        'id', 
        'album_id',
        'album_tagName'
    ];
}
