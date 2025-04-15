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
        ->where('tbl_album_status.album_status', 'Published')
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
    public function getPopularEvents_Footer(Request $request)
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
            ->limit(3)
            ->get();

        return response()->json($data, 200);
    }

    public function getAllEventsSummary(Request $request)
    {
        $query = DB::table('tbl_album')
            ->leftJoin('tbl_album_status', 'tbl_album.album_id', '=', 'tbl_album_status.album_id')
            ->leftJoin('tbl_album_tags', 'tbl_album.album_id', '=', 'tbl_album_tags.album_id')
            ->leftJoin('tbl_photo', 'tbl_album.album_id', '=', 'tbl_photo.album_id')
            ->leftJoin('tbl_photo_tags', 'tbl_photo.photo_id', '=', 'tbl_photo_tags.photo_id')
            ->leftJoin('tbl_video', 'tbl_album.album_id', '=', 'tbl_video.album_id')
            ->leftJoin('tbl_video_tags', 'tbl_video.video_id', '=', 'tbl_video_tags.video_id')
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
            ->where('tbl_album_status.album_status', 'Published')
            ->groupBy('tbl_album.album_id');

        // ✅ General Search
        if ($request->has('search') && $request->search !== '') {
            $search = $request->search;

            $query->where(function ($subQuery) use ($search) {
                $subQuery->where('tbl_album.event_title', 'like', '%' . $search . '%')
                    ->orWhere('tbl_album.event_category', 'like', '%' . $search . '%')
                    ->orWhere('tbl_album.event_organizingAgency', 'like', '%' . $search . '%')
                    ->orWhere('tbl_album_tags.album_tagName', 'like', '%' . $search . '%')
                    ->orWhere('tbl_photo_tags.photo_tagName', 'like', '%' . $search . '%')
                    ->orWhere('tbl_video_tags.video_tagName', 'like', '%' . $search . '%');
            });
        }

        // ✅ Filter by Year
        if ($request->has('year') && $request->year !== '') {
            $query->whereYear('tbl_album.event_date', intval($request->year));
        }

        // ✅ Filter by Month
        if ($request->has('month') && $request->month !== '') {
            $query->whereMonth('tbl_album.event_date', intval($request->month));
        }

        return response()->json(
            $query->orderByDesc('tbl_album.created_at')->paginate(5)
        );
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

    public function getAllTagsByAlbumId($album_id)
    {
        $albumTags = DB::table('tbl_album_tags')
            ->where('album_id', $album_id)
            ->pluck('album_tagName');

        $photoTags = DB::table('tbl_photo_tags')
            ->join('tbl_photo', 'tbl_photo.photo_id', '=', 'tbl_photo_tags.photo_id')
            ->where('tbl_photo.album_id', $album_id)
            ->pluck('photo_tagName');

        $videoTags = DB::table('tbl_video_tags')
            ->join('tbl_video', 'tbl_video.video_id', '=', 'tbl_video_tags.video_id')
            ->where('tbl_video.album_id', $album_id)
            ->pluck('video_tagName');

        return response()->json([
            'album_tags' => $albumTags,
            'photo_tags' => $photoTags,
            'video_tags' => $videoTags
        ]);
    }

    public function getEventsByTag(Request $request)
    {
        \Log::info('Tag filter:', $request->all());

        $tag = $request->searchTag;

        $albumIdsFromAlbumTags = DB::table('tbl_album_tags')
            ->where('album_tagName', 'LIKE', "%$tag%")
            ->pluck('album_id');

        $albumIdsFromPhotoTags = DB::table('tbl_photo_tags')
            ->join('tbl_photo', 'tbl_photo.photo_id', '=', 'tbl_photo_tags.photo_id')
            ->where('photo_tagName', 'LIKE', "%$tag%")
            ->pluck('tbl_photo.album_id');

        $albumIdsFromVideoTags = DB::table('tbl_video_tags')
            ->join('tbl_video', 'tbl_video.video_id', '=', 'tbl_video_tags.video_id')
            ->where('video_tagName', 'LIKE', "%$tag%")
            ->pluck('tbl_video.album_id');

        $albumIds = $albumIdsFromAlbumTags
            ->merge($albumIdsFromPhotoTags)
            ->merge($albumIdsFromVideoTags)
            ->unique();

        $query = DB::table('tbl_album')
            ->leftJoin('tbl_album_status', 'tbl_album.album_id', '=', 'tbl_album_status.album_id')
            ->whereIn('tbl_album.album_id', $albumIds)
            ->where('tbl_album.is_deleted', 0)
            ->where('tbl_album_status.album_status', 'Published');

        if ($request->filled('year')) {
            $query->whereYear('tbl_album.event_date', $request->year);
        }

        if ($request->filled('month')) {
            $query->whereMonth('tbl_album.event_date', $request->month);
        }

        $query->select([
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
        ]);

        return response()->json($query->orderByDesc('tbl_album.created_at')->paginate(5));
    }

    public function getRelatedEvents($album_id)
    {
        // Get current event
        $current = DB::table('tbl_album')
            ->where('album_id', $album_id)
            ->first();

        if (!$current) {
            return response()->json([], 404);
        }

        // Find related events
        $related = DB::table('tbl_album')
            ->leftJoin('tbl_album_status', 'tbl_album.album_id', '=', 'tbl_album_status.album_id')
            ->where('tbl_album.event_category', $current->event_category)
            ->where('tbl_album.album_id', '!=', $album_id)
            ->where('tbl_album_status.album_status', 'Published')
            ->where('tbl_album.is_deleted', 0)
            ->orderByDesc('tbl_album.created_at')
            ->limit(3)
            ->get([
                'tbl_album.album_id',
                'tbl_album.event_title',
                'tbl_album.event_category',
                'tbl_album.event_organizingAgency as organizing_agency',
                DB::raw('(SELECT photo_fileName FROM tbl_photo WHERE tbl_photo.album_id = tbl_album.album_id ORDER BY created_at ASC LIMIT 1) as thumbnail')
            ]);

        return response()->json($related);
    }


    public function getUpcomingEvents()
    {
        $events = DB::table('upcoming_events')
            ->select('id','event_title', 'event_date', 'event_location', 'event_organizing_agency', 'event_description', 'event_banner')
            ->where('is_deleted', 0)
            ->orderBy('event_date', 'asc')
            ->limit(5)
            ->get();

        return response()->json($events);
    }












}
