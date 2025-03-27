import { http, httpFile } from './http_service';



export function getFeaturedEvents(){
    return http().get('/getFeaturedEvents');
}

export function getRecentEvents() {
    return http().get('/getRecentEvents');
}

export function getEventByAlbumId(album_id) {
    return http().get(`/getEventByAlbumId/${album_id}`);
}
