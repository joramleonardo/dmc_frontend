import { http, httpFile } from './http_service';




export function getAllListDraft(){
    return http().get('/getAllListDraft');
}

export function getAllListSTARBOOKS(){
    return http().get('/getAllListSTARBOOKS');
}

export function getAllListDOSTv(){
    return http().get('/getAllListDOSTv');
}

export function getAllListHR(){
    return http().get('/getAllListHR');
}

export function getAllListLibrary(){
    return http().get('/getAllListLibrary');
}

export function getAllListSJA(){
    return http().get('/getAllListSJA');
}

export function getAllListPJS(){
    return http().get('/getAllListPJS');
}


export function getAllListDOSTv_guest_female(expertalk_id){
    return httpFile().post(`/getAllListDOSTv_guest_female/${expertalk_id}`);
}

export function getAllListDOSTv_guest_male(expertalk_id){
    return httpFile().post(`/getAllListDOSTv_guest_male/${expertalk_id}`);
}

export function getAllListDOSTv_views(){
    return http().get('/getAllListDOSTv_views');
}

export function getAllListHR_trainings(){
    return http().get('/getAllListHR_trainings');
}

export function getAllListHR_trainings_female(id){
    return httpFile().post(`/getAllListHR_trainings_female/${id}`);
}

export function getAllListHR_trainings_male(id){
    return httpFile().post(`/getAllListHR_trainings_male/${id}`);
}

export function getTrainings_withTotalParticipants(){
    return http().get('/getTrainings_withTotalParticipants');
}

export function getDOSTv_withTotalParticipants(){
    return http().get('/getDOSTv_withTotalParticipants');
}

export function getOLLP_withTotalParticipants(){
    return http().get('/getOLLP_withTotalParticipants');
}

export function getMatReq_withTotalParticipants(){
    return http().get('/getMatReq_withTotalParticipants');
}

export function getSJA_withTotalParticipants(){
    return http().get('/getSJA_withTotalParticipants');
}

export function getSTARBOOKS_withTotalParticipants(){
    return http().get('/getSTARBOOKS_withTotalParticipants');
}



export function get_og_expertalk_withTotalParticipants(){
    return http().get('/get_og_expertalk_withTotalParticipants');
}

export function get_og_sja_withTotalParticipants(){
    return http().get('/get_og_sja_withTotalParticipants');
}

export function get_og_ollp_withTotalParticipants(){
    return http().get('/get_og_ollp_withTotalParticipants');
}