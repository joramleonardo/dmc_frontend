<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Session;
use App\Assets;
use App\Album;
use App\AlbumTags;
use App\AlbumStatus;
use App\Photo;
use App\PhotoTags;
use App\Video;
use App\VideoTags;

use App\EventTrackingLog;
use App\Comment;

class AssetsController extends Controller
{

    public function getFeaturedEvents(Request $request) {
        $data = DB::table('tbl_album')
        ->leftJoin('tbl_album_status', 'tbl_album.album_id', '=', 'tbl_album_status.album_id')
        ->leftJoin('tbl_photo', 'tbl_album.album_id', '=', 'tbl_photo.album_id')
        ->where('tbl_album.is_deleted', "0")
        ->whereNotNull('tbl_album.album_id')
        ->where('tbl_album_status.album_featured', 1)
        ->orderBy('tbl_album.created_at', 'desc')
        ->groupBy('tbl_album.album_id')
        ->limit(3)
        ->get([
            DB::raw('(SELECT tbl_photo.photo_fileName
                      FROM tbl_photo
                      WHERE tbl_photo.album_id = tbl_album.album_id
                      ORDER BY tbl_photo.created_at ASC
                      LIMIT 1) as photo'),
            'tbl_album.event_category',
            'tbl_album.event_title',
            'tbl_album.event_date',
            'tbl_album.event_organizingAgency as organizing_agency',
            'tbl_album.album_id'
        ]);

        return response()->json($data, 200);
    }

    public function getRecentEvents(Request $request) {
        $data = DB::table('tbl_album')
            ->leftJoin('tbl_album_status', 'tbl_album.album_id', '=', 'tbl_album_status.album_id')
            ->leftJoin('tbl_photo', 'tbl_album.album_id', '=', 'tbl_photo.album_id')
            ->where('tbl_album.is_deleted', "0")
            ->whereNotNull('tbl_album.album_id')
            ->where('tbl_album_status.album_status', 'Published')
            ->orderBy('tbl_album.created_at', 'desc')
            ->groupBy('tbl_album.album_id')
            ->limit(5)
            ->get([
                DB::raw('(SELECT tbl_photo.photo_fileName
                          FROM tbl_photo
                          WHERE tbl_photo.album_id = tbl_album.album_id
                          ORDER BY tbl_photo.created_at ASC
                          LIMIT 1) as photo'),
                'tbl_album.event_category',
                'tbl_album.event_title',
                'tbl_album.event_date',
                'tbl_album.event_organizingAgency as organizing_agency',
                'tbl_album.album_id',
                'tbl_album.id'
            ]);

        return response()->json($data, 200);
    }

    public function getRecentVideos(Request $request) {
        $data = DB::table('tbl_album')
            ->leftJoin('tbl_album_status', 'tbl_album.album_id', '=', 'tbl_album_status.album_id')
            ->leftJoin('tbl_video', 'tbl_album.album_id', '=', 'tbl_video.album_id')
            ->where('tbl_album.is_deleted', "0")
            ->whereNotNull('tbl_album.album_id')
            ->where('tbl_album_status.album_status', 'Published')
            ->orderBy('tbl_album.created_at', 'desc')
            ->groupBy('tbl_album.album_id')
            ->limit(5)
            ->get([
                DB::raw('(SELECT tbl_video.video_link
                          FROM tbl_video
                          WHERE tbl_video.album_id = tbl_album.album_id
                          ORDER BY tbl_video.created_at ASC
                          LIMIT 1) as video_link'),
                'tbl_album.event_category',
                'tbl_album.event_title',
                'tbl_album.event_date',
                'tbl_album.event_organizingAgency as organizing_agency',
                'tbl_album.album_id',
                'tbl_album.id'
            ]);

        return response()->json($data, 200);
    }


    public function getEventByAlbumId(Request $request, $album_id)
    {
        $event = Album::with([
            'status',
            'photos.tags',
            'videos.tags'
        ])
        ->where('album_id', $album_id)
        ->where('is_deleted', "0")
        ->first();

        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        // 👇 Increment the views_count
        $event->increment('views_count');

        return response()->json($event, 200);
    }

    public function getPopularEvents(Request $request)
    {
        $data = DB::table('tbl_album')
            ->leftJoin('tbl_album_status', 'tbl_album.album_id', '=', 'tbl_album_status.album_id')
            ->where('tbl_album.is_deleted', "0")
            ->whereNotNull('tbl_album.album_id')
            ->where('tbl_album_status.album_status', 'Published')
            ->orderByDesc('tbl_album.views_count')
            ->select([
                DB::raw('(SELECT tbl_photo.photo_fileName
                          FROM tbl_photo
                          WHERE tbl_photo.album_id = tbl_album.album_id
                          ORDER BY tbl_photo.created_at ASC
                          LIMIT 1) as first_photo'),
                'tbl_album.views_count',
                'tbl_album.event_category',
                'tbl_album.event_title',
                'tbl_album.event_date',
                'tbl_album.event_organizingAgency as organizing_agency',
                'tbl_album.album_id',
                'tbl_album.id'
            ])
            ->limit(5)
            ->get();

        return response()->json($data, 200);
    }


    public function getAllEventsSummary (Request $request){

        $data = DB::table('tbl_album')
        ->leftJoin('tbl_album_status', 'tbl_album.album_id', '=', 'tbl_album_status.album_id')
        ->where('tbl_album.is_deleted', "0")
        ->whereNotNull('tbl_album.album_id')
        ->where('tbl_album_status.album_status', 'Published')
        ->orderBy('tbl_album.created_at', 'desc')
        ->select([
            DB::raw('(SELECT tbl_photo.photo_fileName
                    FROM tbl_photo
                    WHERE tbl_photo.album_id = tbl_album.album_id
                    ORDER BY tbl_photo.created_at ASC
                    LIMIT 1) as first_photo'),
            DB::raw('(SELECT COUNT(*) FROM tbl_photo WHERE tbl_photo.album_id = tbl_album.album_id) as photo_count'),
            DB::raw('(SELECT COUNT(*) FROM tbl_video WHERE tbl_video.album_id = tbl_album.album_id) as video_count'),
            'tbl_album.event_category',
            'tbl_album.event_title',
            'tbl_album.event_description',
            'tbl_album.event_date',
            'tbl_album.event_organizingAgency as organizing_agency',
            'tbl_album.album_id',
            'tbl_album.id',
            'tbl_album.views_count'
        ])
        ->get();


        return response()->json($data, 200);
    }





}
