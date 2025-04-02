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
                DB::raw('(SELECT tbl_video.video_id
                          FROM tbl_video
                          WHERE tbl_video.album_id = tbl_album.album_id
                          ORDER BY tbl_video.created_at ASC
                          LIMIT 1) as video_id'),
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


    public function getAllEventsSummary(Request $request)
    {
        $query = DB::table('tbl_album')
            ->leftJoin('tbl_album_status', 'tbl_album.album_id', '=', 'tbl_album_status.album_id')
            ->select([
                'tbl_album.album_id',
                'tbl_album.event_title',
                'tbl_album.event_category',
                'tbl_album.event_description',
                'tbl_album.event_date',
                'tbl_album.event_organizingAgency as organizing_agency',
                'tbl_album.views_count',
                DB::raw('(SELECT COUNT(*) FROM tbl_photo WHERE tbl_photo.album_id = tbl_album.album_id) as photo_count'),
                DB::raw('(SELECT COUNT(*) FROM tbl_video WHERE tbl_video.album_id = tbl_album.album_id) as video_count'),
                DB::raw('(SELECT photo_fileName FROM tbl_photo WHERE tbl_photo.album_id = tbl_album.album_id ORDER BY created_at ASC LIMIT 1) as first_photo'),
            ])
            ->where('tbl_album.is_deleted', 0)
            ->where('tbl_album_status.album_status', 'Published');

        // Search
        if ($request->has('search') && $request->search !== '') {
            $query->where(function ($subQuery) use ($request) {
                $subQuery->where('tbl_album.event_title', 'like', '%' . $request->search . '%')
                    ->orWhere('tbl_album.event_category', 'like', '%' . $request->search . '%')
                    ->orWhere('tbl_album.event_organizingAgency', 'like', '%' . $request->search . '%');
            });
        }

        // Filter by year
        if ($request->has('year') && $request->year !== '') {
            $query->whereYear('tbl_album.event_date', $request->year);
        }

        // Filter by month
        if ($request->has('month') && $request->month !== '') {
            $query->whereMonth('tbl_album.event_date', $request->month);
        }

        $result = $query->orderBy('tbl_album.created_at', 'desc')->paginate(5);

        return response()->json($result);
    }


    public function getAllPhotos(Request $request)
    {
        $limit = $request->input('limit', 15);
        $photos = DB::table('tbl_photo')
            ->leftJoin('tbl_album', 'tbl_album.album_id', '=', 'tbl_photo.album_id')
            ->select(
                'tbl_photo.photo_fileName',
                'tbl_photo.photo_title',
                'tbl_photo.photo_description',
                'tbl_photo.photo_id',
                'tbl_album.album_id',
                'tbl_album.event_title as album_title'
            )
            ->orderBy('tbl_photo.created_at', 'desc')
            ->paginate($limit);

        return response()->json($photos, 200);
    }










}
