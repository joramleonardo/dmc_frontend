<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlbumStatus extends Model
{
    protected $table = "tbl_album_status";
    protected $fillable = [
        'id', //1
        'aldum_id',
        'album_status',
        'name_author', 
        'name_publisher', 
    ];
}
