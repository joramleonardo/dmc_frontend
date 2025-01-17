<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Session;
// use Storage;
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

    public function addEventData(Request $request){
        $data = new Album(); 
        $data->album_id = $request->album_id;
        $data->event_title = $request->event_title;
        $data->event_category = $request->event_category;
        $data->event_sector = $request->event_sector;
        $data->event_description = $request->event_description;
        $data->event_organizingAgency = $request->event_organizingAgency;
        $data->event_date = $request->event_date;
        $data->event_venue = $request->event_venue;
        $data->event_tags = $request->event_tags;
        $data->is_deleted = $request->is_deleted;
        
        $data->save();
    }

    public function addTrackingLog(Request $request){
        $data = new EventTrackingLog(); 
        $data->album_id = $request->album_id;
        $data->activity = $request->activity;
        $data->date = $request->date;
 
        $data->save();
    }

    public function addAlbumStatus_withAuthor(Request $request){
        $data = new AlbumStatus();
        $data->album_id = $request->album_id;
        $data->album_status = $request->album_status;
        $data->name_author = $request->name_author;
        
        $data->save();
    }
    
    public function updateAlbumStatus(Request $request, $album_id){
        $data = AlbumStatus::where('album_id', $album_id)->first();

        //UPDATE
        $data->album_status = $request->album_status;
        $data->save();
    }
    
    public function updateAlbumStatus_withPublisher(Request $request, $album_id){
        $data = AlbumStatus::where('album_id', $album_id)->first();

        //UPDATE
        $data->album_status = $request->album_status;
        $data->name_publisher = $request->name_publisher;
        $data->save();
    }


    public function addComment(Request $request){
        $data = new Comment(); 
        $data->album_id = $request->album_id;
        $data->section_id = $request->section_id;
        $data->section_title = $request->section_title;
        $data->section_comment = $request->section_comment;
        
        $data->save();
    }

    public function addAlbumTags(Request $request){
        $data = new AlbumTags();
        $data->album_id = $request->album_id;
        $data->album_tagName = $request->album_tagName;
        
        $data->save();
    }

    public function addPhotoTags(Request $request){
        $data = new PhotoTags();
        $data->photo_id = $request->photo_id;
        $data->photo_tagName = $request->photo_tagName;
        
        $data->save();
    }

    public function addVideoTags(Request $request){
        $data = new VideoTags();
        $data->video_id = $request->video_id;
        $data->video_tagName = $request->video_tagName;
        
        $data->save();
    }

    // public function deletePhoto($filename){
    //     // Define the path to the photo
    //     $filePath = 'public/images/' . $filename;

    //     // Check if the file exists
    //     if (Storage::exists($filePath)) {
    //         // Delete the file
    //         Storage::delete($filePath);
    //         return response()->json(['message' => 'Photo deleted successfully.']);
    //     } else {
    //         return response()->json(['message' => 'Photo not found.'], 404);
    //     }
    // }

    public function addVideoData(Request $request){
        foreach($request->video_form as $item){

            $data = new Video(); 
            $data->album_id = $item['album_id'];
            $data->video_id = $item['video_id'];
            $data->video_link = $item['video_link'];
            $data->video_youtubeID = $item['video_youtubeID'];
            $data->video_videographer = $item['video_videographer'];
            $data->video_category = $item['video_category'];
            $data->video_type = $item['video_type'];
            $data->video_duration = $item['video_duration'];
            $data->video_description = $item['video_description'];
            $data->video_tags = $item['video_tags'];

            $data->save();
        }
        
        
    }

    public function countAlbumEntry(){
        $data = Album::count();
        return response()->json($data, 200);
    }

    public function countAlbumPhotoEntry(Request $request, $album_id){
        $data = Photo::where('album_id', $album_id)
                            ->count();
        return response()->json($data, 200);
    }

    public function countAlbumVideoEntry(Request $request, $album_id){
        $data = Video::where('album_id', $album_id)
                            ->count();
        return response()->json($data, 200);
    }

    public function checkAlbumTagsExists(Request $request, $album_id, $tag_name){
        // Check if the tag exists
        $exists = AlbumTags::where('album_id', $album_id)
                            ->where('album_tagName', $tag_name)->exists();

        if ($exists) {
            return response()->json(['message' => 'exists']);
        } else {
            return response()->json(['message' => 'none']);
        }
    }
    
    public function countAlbumTags(Request $album_id){
        $data = Photo::where('tbl_photo.photo_id', $album_id)
                            ->count();
        return response()->json($data, 200);
    }

    public function countAlbumComment(Request $request, $album_id){
        $data = Comment::where('album_id', $album_id)
                            ->count();
        return response()->json($data, 200);
    }

    public function getAlbumStatus(Request $request, $album_id){
        $data = AlbumStatus::where('album_id', $album_id)
                            ->get('*');
    
        return response()->json($data, 200);
    }

    public function getTrackingLog(Request $request, $album_id){
        // $data = EventTrackingLog::where('album_id', $album_id)
        $data = EventTrackingLog::join('tbl_album_status','tbl_tracking_event_log.album_id', '=', 'tbl_album_status.album_id')
                                ->where('tbl_album_status.album_id', $album_id)
                                ->get('*');
    
        return response()->json($data, 200);
    }
    
    public function getCommentLog(Request $request, $album_id){
        $data = Comment::where('album_id', $album_id)
                            ->get('*');
        return response()->json($data, 200);
    }

// =================================================================================================================


    public function getAllListEvents(Request $request, $author) {
        $data = DB::table('tbl_album')
            ->leftJoin('tbl_album_status', 'tbl_album.album_id', '=', 'tbl_album_status.album_id')
            ->leftJoin('tbl_photo', 'tbl_album.album_id', '=', 'tbl_photo.album_id')
            ->where('tbl_album_status.name_author', $author)
            ->where('tbl_album.is_deleted', "0")
            ->whereNotNull('tbl_album.album_id') 
            ->orderBy('tbl_album.created_at', 'desc')
            ->groupBy('tbl_album.album_id') 
            ->get([
                'tbl_album.*',
                'tbl_album_status.*',
                DB::raw('(SELECT tbl_photo.photo_fileName 
                          FROM tbl_photo 
                          WHERE tbl_photo.album_id = tbl_album.album_id 
                          ORDER BY tbl_photo.created_at ASC 
                          LIMIT 1) as first_photo_fileName')
            ]);
    
        return response()->json($data, 200);
    }

    public function getAllListDraft(Request $request, $author){
            
            $data = DB::table('tbl_album')
            ->leftJoin('tbl_album_status', 'tbl_album.album_id', '=', 'tbl_album_status.album_id')
            ->leftJoin('tbl_photo', 'tbl_album.album_id', '=', 'tbl_photo.album_id')
            ->where('tbl_album_status.name_author', $author)
            ->where('tbl_album_status.album_status', "Saved as Draft")
            ->where('tbl_album.is_deleted', "0")
            ->whereNotNull('tbl_album.album_id') 
            ->orderBy('tbl_album.created_at', 'desc')
            ->groupBy('tbl_album.album_id') 
            ->get([
                'tbl_album.*',
                'tbl_album_status.*',
                DB::raw('(SELECT tbl_photo.photo_fileName 
                        FROM tbl_photo 
                        WHERE tbl_photo.album_id = tbl_album.album_id 
                        ORDER BY tbl_photo.created_at ASC 
                        LIMIT 1) as first_photo_fileName')
            ]);

        return response()->json($data, 200);
    }

    public function getAllListUnderReview(Request $request, $author){
            $data = DB::table('tbl_album')
            ->leftJoin('tbl_album_status', 'tbl_album.album_id', '=', 'tbl_album_status.album_id')
            ->leftJoin('tbl_photo', 'tbl_album.album_id', '=', 'tbl_photo.album_id')
            ->where('tbl_album_status.name_author', $author)
            ->where('tbl_album_status.album_status', ["Under Review", "For Comment"])
            ->where('tbl_album.is_deleted', "0")
            ->whereNotNull('tbl_album.album_id') 
            ->orderBy('tbl_album.created_at', 'desc')
            ->groupBy('tbl_album.album_id') 
            ->get([
                'tbl_album.*',
                'tbl_album_status.*',
                DB::raw('(SELECT tbl_photo.photo_fileName 
                        FROM tbl_photo 
                        WHERE tbl_photo.album_id = tbl_album.album_id 
                        ORDER BY tbl_photo.created_at ASC 
                        LIMIT 1) as first_photo_fileName')
            ]);

        return response()->json($data, 200);
    }

    public function getAllListForReview(Request $request, $author){
            $data = DB::table('tbl_album')
            ->leftJoin('tbl_album_status', 'tbl_album.album_id', '=', 'tbl_album_status.album_id')
            ->leftJoin('tbl_photo', 'tbl_album.album_id', '=', 'tbl_photo.album_id')
            ->where('tbl_album_status.name_author', $author)
            ->where('tbl_album_status.album_status', ["Submitted for Review", "Done Revision", "Revision For Review"])
            ->where('tbl_album.is_deleted', "0")
            ->whereNotNull('tbl_album.album_id') 
            ->orderBy('tbl_album.created_at', 'desc')
            ->groupBy('tbl_album.album_id') 
            ->get([
                'tbl_album.*',
                'tbl_album_status.*',
                DB::raw('(SELECT tbl_photo.photo_fileName 
                        FROM tbl_photo 
                        WHERE tbl_photo.album_id = tbl_album.album_id 
                        ORDER BY tbl_photo.created_at ASC 
                        LIMIT 1) as first_photo_fileName')
            ]);

        return response()->json($data, 200);
    }

    public function getAllListForRevision(Request $request, $author){
            $data = DB::table('tbl_album')
            ->leftJoin('tbl_album_status', 'tbl_album.album_id', '=', 'tbl_album_status.album_id')
            ->leftJoin('tbl_photo', 'tbl_album.album_id', '=', 'tbl_photo.album_id')
            ->where('tbl_album_status.name_author', $author)
            ->where('tbl_album_status.album_status', "For Revision")
            ->where('tbl_album.is_deleted', "0")
            ->whereNotNull('tbl_album.album_id') 
            ->orderBy('tbl_album.created_at', 'desc')
            ->groupBy('tbl_album.album_id') 
            ->get([
                'tbl_album.*',
                'tbl_album_status.*',
                DB::raw('(SELECT tbl_photo.photo_fileName 
                        FROM tbl_photo 
                        WHERE tbl_photo.album_id = tbl_album.album_id 
                        ORDER BY tbl_photo.created_at ASC 
                        LIMIT 1) as first_photo_fileName')
            ]);

        return response()->json($data, 200);
    }

    public function getAllListUnpublished(Request $request, $author){
            $data = DB::table('tbl_album')
            ->leftJoin('tbl_album_status', 'tbl_album.album_id', '=', 'tbl_album_status.album_id')
            ->leftJoin('tbl_photo', 'tbl_album.album_id', '=', 'tbl_photo.album_id')
            ->where('tbl_album_status.name_author', $author)
            ->where('tbl_album_status.album_status', "Unpublished")
            ->where('tbl_album.is_deleted', "0")
            ->whereNotNull('tbl_album.album_id') 
            ->orderBy('tbl_album.created_at', 'desc')
            ->groupBy('tbl_album.album_id') 
            ->get([
                'tbl_album.*',
                'tbl_album_status.*',
                DB::raw('(SELECT tbl_photo.photo_fileName 
                        FROM tbl_photo 
                        WHERE tbl_photo.album_id = tbl_album.album_id 
                        ORDER BY tbl_photo.created_at ASC 
                        LIMIT 1) as first_photo_fileName')
            ]);

        return response()->json($data, 200);
    }

    public function getAllListPublished(Request $request, $author){
            $data = DB::table('tbl_album')
            ->leftJoin('tbl_album_status', 'tbl_album.album_id', '=', 'tbl_album_status.album_id')
            ->leftJoin('tbl_photo', 'tbl_album.album_id', '=', 'tbl_photo.album_id')
            ->where('tbl_album_status.name_author', $author)
            ->where('tbl_album_status.album_status', "Published")
            ->where('tbl_album.is_deleted', "0")
            ->whereNotNull('tbl_album.album_id') 
            ->orderBy('tbl_album.created_at', 'desc')
            ->groupBy('tbl_album.album_id') 
            ->get([
                'tbl_album.*',
                'tbl_album_status.*',
                DB::raw('(SELECT tbl_photo.photo_fileName 
                        FROM tbl_photo 
                        WHERE tbl_photo.album_id = tbl_album.album_id 
                        ORDER BY tbl_photo.created_at ASC 
                        LIMIT 1) as first_photo_fileName')
            ]);

        return response()->json($data, 200);
    }

// =================================================================================================================


public function getAllListForReview_publisher(Request $request){
        $data = DB::table('tbl_album')
        ->leftJoin('tbl_album_status', 'tbl_album.album_id', '=', 'tbl_album_status.album_id')
        ->leftJoin('tbl_photo', 'tbl_album.album_id', '=', 'tbl_photo.album_id')
        ->where('tbl_album_status.album_status', ["Submitted for Review", "Done Revision", "Revision For Review"])
        ->where('tbl_album.is_deleted', "0")
        ->whereNotNull('tbl_album.album_id') 
        ->orderBy('tbl_album.created_at', 'desc')
        ->groupBy('tbl_album.album_id') 
        ->get([
            'tbl_album.*',
            'tbl_album_status.*',
            DB::raw('(SELECT tbl_photo.photo_fileName 
                    FROM tbl_photo 
                    WHERE tbl_photo.album_id = tbl_album.album_id 
                    ORDER BY tbl_photo.created_at ASC 
                    LIMIT 1) as first_photo_fileName')
        ]);

    return response()->json($data, 200);
}

public function getAllListUnderReview_publisher(Request $request){
        $data = DB::table('tbl_album')
        ->leftJoin('tbl_album_status', 'tbl_album.album_id', '=', 'tbl_album_status.album_id')
        ->leftJoin('tbl_photo', 'tbl_album.album_id', '=', 'tbl_photo.album_id')
        ->where('tbl_album_status.album_status', ["Under Review", "For Comment"])
        ->where('tbl_album.is_deleted', "0")
        ->whereNotNull('tbl_album.album_id') 
        ->orderBy('tbl_album.created_at', 'desc')
        ->groupBy('tbl_album.album_id') 
        ->get([
            'tbl_album.*',
            'tbl_album_status.*',
            DB::raw('(SELECT tbl_photo.photo_fileName 
                    FROM tbl_photo 
                    WHERE tbl_photo.album_id = tbl_album.album_id 
                    ORDER BY tbl_photo.created_at ASC 
                    LIMIT 1) as first_photo_fileName')
        ]);

    return response()->json($data, 200);
}

public function getAllListForRevision_publisher(Request $request){
        $data = DB::table('tbl_album')
        ->leftJoin('tbl_album_status', 'tbl_album.album_id', '=', 'tbl_album_status.album_id')
        ->leftJoin('tbl_photo', 'tbl_album.album_id', '=', 'tbl_photo.album_id')
        ->where('tbl_album_status.album_status', "For Revision")
        ->where('tbl_album.is_deleted', "0")
        ->whereNotNull('tbl_album.album_id') 
        ->orderBy('tbl_album.created_at', 'desc')
        ->groupBy('tbl_album.album_id') 
        ->get([
            'tbl_album.*',
            'tbl_album_status.*',
            DB::raw('(SELECT tbl_photo.photo_fileName 
                    FROM tbl_photo 
                    WHERE tbl_photo.album_id = tbl_album.album_id 
                    ORDER BY tbl_photo.created_at ASC 
                    LIMIT 1) as first_photo_fileName')
        ]);

    return response()->json($data, 200);
}

public function getAllListUnpublished_publisher(Request $request){
        $data = DB::table('tbl_album')
        ->leftJoin('tbl_album_status', 'tbl_album.album_id', '=', 'tbl_album_status.album_id')
        ->leftJoin('tbl_photo', 'tbl_album.album_id', '=', 'tbl_photo.album_id')
        ->where('tbl_album_status.album_status', "Unpublished")
        ->where('tbl_album.is_deleted', "0")
        ->whereNotNull('tbl_album.album_id') 
        ->orderBy('tbl_album.created_at', 'desc')
        ->groupBy('tbl_album.album_id') 
        ->get([
            'tbl_album.*',
            'tbl_album_status.*',
            DB::raw('(SELECT tbl_photo.photo_fileName 
                    FROM tbl_photo 
                    WHERE tbl_photo.album_id = tbl_album.album_id 
                    ORDER BY tbl_photo.created_at ASC 
                    LIMIT 1) as first_photo_fileName')
        ]);

    return response()->json($data, 200);
}

public function getAllListPublished_publisher(Request $request){
        $data = DB::table('tbl_album')
        ->leftJoin('tbl_album_status', 'tbl_album.album_id', '=', 'tbl_album_status.album_id')
        ->leftJoin('tbl_photo', 'tbl_album.album_id', '=', 'tbl_photo.album_id')
        ->where('tbl_album_status.album_status', "Published")
        ->where('tbl_album.is_deleted', "0")
        ->whereNotNull('tbl_album.album_id') 
        ->orderBy('tbl_album.created_at', 'desc')
        ->groupBy('tbl_album.album_id') 
        ->get([
            'tbl_album.*',
            'tbl_album_status.*',
            DB::raw('(SELECT tbl_photo.photo_fileName 
                    FROM tbl_photo 
                    WHERE tbl_photo.album_id = tbl_album.album_id 
                    ORDER BY tbl_photo.created_at ASC 
                    LIMIT 1) as first_photo_fileName')
        ]);

    return response()->json($data, 200);
}





// =================================================================================================================

    public function getEventDetails(Request $request, $album_id){
              $data = Assets::where('album_id', $album_id)
                    ->get('*');
        return response()->json($data, 200);
    }

    public function getAllListPhoto(Request $request){
              $data = Photo::get('*');
        return response()->json($data, 200);
    }

    public function getListPhoto_selected(Request $request, $album_id){
        // return $request;
              $data = Photo::where('album_id', $album_id)
                    ->get('*');
        return response()->json($data, 200);
    }
    
    public function getPhotoDetails(Request $request, $id){
            $data = Photo::where('id', $id)
                ->get('*');
            return response()->json($data, 200);
    }
    
    public function getVideoDetails(Request $request, $id){
            $data = Video::where('id', $id)
                ->get('*');
        return response()->json($data, 200);
    }

    public function getAlbumID(Request $request, $id){
        // return $request;
              $data = Assets::where('id', $id)
                    ->get('*');
        return response()->json($data, 200);
    }

    public function getAlbumTags_selected(Request $request, $album_id){
              $data = AlbumTags::where('tbl_album_tags.album_id', $album_id)
                    ->get('*');
        return response()->json($data, 200);
    }

    public function getPhotoTags_selected(Request $request, $photo_id){
              $data = PhotoTags::where('photo_id', $photo_id)
                    ->get('*');
        return response()->json($data, 200);
    }

    public function getVideoTags_selected(Request $request, $video_id){
              $data = VideoTags::where('video_id', $video_id)
                    ->get('*');
        return response()->json($data, 200);
    }

    public function getListVideo_selected(Request $request, $album_id){
        // return $request;
              $data = Video::where('album_id', $album_id)
                    ->get('*');
        return response()->json($data, 200);
    }

    public function getAllListVideo(Request $request){
              $data = Video::get('*');
        return response()->json($data, 200);
    }
    
    public function deleteAlbum(Request $request, $albumID){
        $data = Assets::where('album_id', $albumID)->first();

        $data->is_deleted = $request->is_deleted;
        $data->save();
    }
    
    public function updateAlbum(Request $request, $albumID){
        $data = Assets::where('album_id', $albumID)->first();

        //IN PROGRESS UPDATE
        $data->event_title = $request->event_title;
        $data->event_description = $request->event_description;
        $data->event_date = $request->event_date;
        $data->event_venue = $request->event_venue;
        $data->event_organizingAgency = $request->event_organizingAgency;
        $data->event_category = $request->event_category;
        $data->event_sector = $request->event_sector;
        $data->event_tags = $request->event_tags;
        $data->save();
    }
    
    public function updateVideo(Request $request, $photo_id){
        $data = Video::where('id', $photo_id)->first();

       
        //UPDATE
       
        $data->video_description = $request->video_description;
        $data->video_videographer = $request->video_videographer;
        $data->video_category = $request->video_category;
        $data->video_duration = $request->video_duration;
        $data->video_type = $request->video_type;
        $data->video_tags = $request->video_tags;
        $data->save();
    }
    
    public function updatePhoto(Request $request, $photo_id){
        $data = Photo::where('id', $photo_id)->first();

        //UPDATE
        $data->photo_fileName = $request->photo_fileName;
        $data->photo_description = $request->photo_description;
        $data->photo_photographer = $request->photo_photographer;
        $data->photo_category = $request->photo_category;
        $data->photo_tags = $request->photo_tags;
        $data->save();
    }
    
    public function addPhotoData(Request $request){
        

        foreach($request->photo_form as $item){

            $validator = \Validator::make($item, [
                'photo_fileName' => 'required|file|mimes:jpeg,png,jpg,gif|max:30720',
                
            ]);

            // Check if validation fails
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Invalid file type or missing required fields.',
                    'errors' => $validator->errors(),
                ], 400);
            }

            $file_location = null;
                if ($item['photo_fileName'] && is_file($item['photo_fileName'])) {
                    
                    $file = $item['photo_fileName'];
                    $filePath = $item['photo_fileName']->store('public/images');
                    $filePathArray = explode('/', $filePath);
                    $file_newName = $filePathArray[2];

                    $data = new Photo(); 
                    $data->album_id = $item['album_id'];
                    $data->photo_id = $item['photo_id'];
                    $data->photo_fileName = $file_newName;
                    // $data->photo_title = $item['photo_title'];
                    $data->photo_category = $item['photo_category'];
                    $data->photo_description = $item['photo_description'];
                    $data->photo_photographer = $item['photo_photographer'];
                    $data->photo_tags = $item['photo_tags'];

                    $data->save();
            }
        }
    }

    public function replacePhoto(Request $request){
        $request->validate([
            'old_filename' => 'required|string', // Validate the old filename
            'new_photo' => 'required|file|mimes:jpeg,png,jpg,gif|max:30720', // Validate the new photo
        ]);

        $oldFilename = $request->input('old_filename');
        $filePath = 'public/images/' . $oldFilename;

        // Check if the old file exists and delete it
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        }

        // Store the new photo
        $newPhoto = $request->file('new_photo');
        $newFilename = time() . '_' . $newPhoto->getClientOriginalName();
        $newPhotoPath = $newPhoto->storeAs('public/images', $newFilename);

        // Update the database record
        $photo = Photo::where('photo_fileName', $oldFilename)->first();
        if ($photo) {
            $photo->photo_fileName = $newFilename; // Replace the old filename with the new one
            $photo->save();
        } else {
            // If no database entry exists for the old file, create a new one
            Photo::create(['photo_fileName' => $newFilename]);
        }

        return response()->json([
            'message' => 'Photo replaced successfully.',
            'new_filename' => $newFilename,
        ]);
    }

    public function deletePhoto(Request $request){
        $filename = $request->input('filename'); // Get filename from the request
        $filePath = 'public/images/' . $filename;

        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
            return response()->json(['message' => 'Photo deleted successfully.']);
        } else {
            return response()->json(['message' => 'Photo not found.'], 404);
        }

        $photo = Photo::where('photo_fileName', $filename)->first();
        if ($photo) {
            $photo->delete();
            return response()->json(['message' => 'Photo and database entry deleted successfully.']);
        } else {
            return response()->json(['message' => 'Database entry not found.'], 404);
        }

    }
}
