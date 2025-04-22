<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UpcomingEvent extends Model
{
    protected $table = 'upcoming_events';
    protected $fillable = [
        'album_id',
        'event_title',
        'event_category',
        'event_sector',
        'event_description',
        'event_organizingAgency',
        'event_date',
        'event_venue',
        'event_tags',
        'is_deleted'
    ];
}
