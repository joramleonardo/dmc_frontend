import { http, httpFile } from './http_service';



export function getFeaturedEvents(){
    return http().get('/getFeaturedEvents');
}

export function getRecentEvents() {
    return http().get('/getRecentEvents');
}

export function getRecentVideos() {
    return http().get('/getRecentVideos');
}

export function getEventByAlbumId(album_id) {
    return http().get(`/getEventByAlbumId/${album_id}`);
}
