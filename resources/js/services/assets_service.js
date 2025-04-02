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

export function getPopularEvents() {
    return http().get('/getPopularEvents');
}

export function getAllPhotos(page = 1) {
    return http().get(`/getAllPhotos?page=${page}`);
}

export async function getAllEventsSummary(params = {}) {
    const queryString = new URLSearchParams(params).toString();
    return http().get(`/getAllEventsSummary?${queryString}`);
}

export async function getEventYears() {
    return http().get('/getEventYears');
}
