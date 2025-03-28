<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\AlbumStatus;
use App\Photo;
use App\Video;


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
        'views_count',
    ];


    public function status()
    {
        return $this->hasOne(AlbumStatus::class, 'album_id', 'album_id');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class, 'album_id', 'album_id');
    }

    public function videos()
    {
        return $this->hasMany(Video::class, 'album_id', 'album_id');
    }
}
