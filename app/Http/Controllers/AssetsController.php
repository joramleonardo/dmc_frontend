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
        ->where('tbl_album_status.album_featured', 1) // Only featured albums
        ->orderBy('tbl_album.created_at', 'desc')
        ->groupBy('tbl_album.album_id')
        ->limit(3) // Limit the results to 3
        ->get([
            DB::raw('(SELECT tbl_photo.photo_fileName
                      FROM tbl_photo
                      WHERE tbl_photo.album_id = tbl_album.album_id
                      ORDER BY tbl_photo.created_at ASC
                      LIMIT 1) as photo'), // 1. Photo
            'tbl_album.event_category', // 2. Event Category
            'tbl_album.event_title',    // 3. Event Title
            'tbl_album.event_date',     // 4. Event Date
            'tbl_album.event_organizingAgency as organizing_agency' // 5. Event Organizing Agency
        ]);

        return response()->json($data, 200);
    }

    public function getRecentEvents(Request $request) {
        $data = DB::table('tbl_album')
            ->leftJoin('tbl_album_status', 'tbl_album.album_id', '=', 'tbl_album_status.album_id')
            ->leftJoin('tbl_photo', 'tbl_album.album_id', '=', 'tbl_photo.album_id')
            ->where('tbl_album.is_deleted', "0")
            ->whereNotNull('tbl_album.album_id')
            ->where('tbl_album_status.album_status', 'Published') // ✅ Select only Published events
            ->orderBy('tbl_album.created_at', 'desc') // Order by newest events
            ->groupBy('tbl_album.album_id')
            ->limit(5) // Limit the results to 5
            ->get([
                DB::raw('(SELECT tbl_photo.photo_fileName
                          FROM tbl_photo
                          WHERE tbl_photo.album_id = tbl_album.album_id
                          ORDER BY tbl_photo.created_at ASC
                          LIMIT 1) as photo'), // 1. Photo
                'tbl_album.event_category', // 2. Event Category
                'tbl_album.event_title',    // 3. Event Title
                'tbl_album.event_date',     // 4. Event Date
                'tbl_album.event_organizingAgency as organizing_agency' // 5. Event Organizing Agency
            ]);

        return response()->json($data, 200);
    }


}
