<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventTrackingLog extends Model
{
    protected $table = "tbl_tracking_event_log";
    protected $fillable = [
        'id', //1
        'album_id',
        'activity', 
        'date', 
        // 'name_author', 
        // 'name_publisher', 
    ];

    // protected $table = "tbl_event_tracking_log";
    // protected $fillable = [
    //     'id', //1
    //     'album_id',
    //     'name_author', 
    //     'name_publisher', 
    //     'date_created', 
    //     'date_submittedToPublisher', 
    //     'date_reviewedByPublisher', 
    //     'date_returnedForRevision', 
    //     'date_revisedByAuthor', 
    //     'date_publishedByPublisher', 
    //     'date_unpublishedByPublisher', 
    // ];
}
