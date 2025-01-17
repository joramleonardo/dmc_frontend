<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "tbl_comments";
    protected $fillable = [
        'id', //1
        'album_id',
        'section_id',
        'section_title',
        'section_comment',
    ];
}
