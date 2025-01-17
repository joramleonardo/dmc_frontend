<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\SDD_dostv;
use App\SDD_hr;
use App\SDD_Library;
use App\SDD_PJS;
use App\SDD_SJA;
use App\SDD_Starbooks;
use App\SDD_Dashboard;
use App\MaterialRequestt;
use App\SDD_OG_expertalk;
use App\SDD_OG_ollp;
use App\SDD_OG_sja;

class SddControllerController extends Controller
{

    public function getAllListDraft(Request $request){
        $data = SDD_Starbooks::get('*');
        return response()->json($data, 200);
    }

    public function getAllListSTARBOOKS(Request $request){
        $data = SDD_Starbooks::get('*');
        return response()->json($data, 200);
    }

    public function getAllListDOSTv(Request $request){
        $data = SDD_dostv::get('*');
        return response()->json($data, 200);
    }

    public function getAllListDOSTv_guest_female(Request $request, $expertalk_id){
        $data = SDD_dostv::join('dostv_expertalk_guest','dostv_expertalk.id', '=', 'dostv_expertalk_guest.expertalk_id')
                        ->where('dostv_expertalk_guest.expertalk_id', $expertalk_id)
                        ->where('dostv_expertalk_guest.sex', "F")
                        ->count();
        return response()->json($data, 200);
    }

    public function getAllListDOSTv_guest_male(Request $request, $expertalk_id){
        
        $data = SDD_dostv::join('dostv_expertalk_guest','dostv_expertalk.id', '=', 'dostv_expertalk_guest.expertalk_id')
                        ->where('dostv_expertalk_guest.expertalk_id', $expertalk_id)
                        ->where('dostv_expertalk_guest.sex', "F")
                        ->count();
        return response()->json($data, 200);
    }

    public function getAllListDOSTv_views(Request $request){
        $data = SDD_dostv::join('dostv_expertalk_views','dostv_expertalk.id', '=', 'dostv_expertalk_views.expertalk_id')
                        ->join('dostv_expertalk_guest','dostv_expertalk_views.expertalk_id', '=', 'dostv_expertalk_guest.expertalk_id')
                        ->get('*');
        // $data = SDD_dostv::get('*');
        return response()->json($data, 200);
    }

    public function getAllListHR(Request $request){
        $data = SDD_hr::get('*');
        return response()->json($data, 200);
    }
    public function getDOSTv_withTotalParticipants(Request $request){
        $data = SDD_dostv::join('dostv_expertalk_views', 'dostv_expertalk.id', '=', 'dostv_expertalk_views.expertalk_id')
                        ->join('dostv_expertalk_guest', 'dostv_expertalk_views.expertalk_id', '=', 'dostv_expertalk_guest.expertalk_id')
                        ->select(
                            'dostv_expertalk.id as id',
                            'dostv_expertalk.dateAired as dateAired',
                            'dostv_expertalk.topic as topic',
                            'dostv_expertalk_views.reach as reach',
                            'dostv_expertalk_views.views as views',
                            'dostv_expertalk_views.engagement as engagement',
                            'dostv_expertalk_views.platform as platform',
                            DB::raw('COUNT(dostv_expertalk_guest.name) as total_participants_attended'),
                            DB::raw('SUM(CASE WHEN dostv_expertalk_guest.sex = "M" THEN 1 ELSE 0 END) as total_male_participants'),
                            DB::raw('SUM(CASE WHEN dostv_expertalk_guest.sex = "F" THEN 1 ELSE 0 END) as total_female_participants')
                        )
                        ->groupBy('dostv_expertalk_guest.expertalk_id')
                        ->get();
        return response()->json($data, 200);
    }

    public function getTrainings_withTotalParticipants(Request $request){
        $data = SDD_hr::select(
                            'employee_trainings.training_id as training_id',
                            'employee_trainings.training_title as training_title',
                            'employee_trainings.training_startDate as training_startDate',
                            'employee_trainings.training_endDate as training_endDate',
                            DB::raw('COUNT(employee_trainings.training_participants) as total_participants_attended'),
                            DB::raw('SUM(CASE WHEN employee_trainings.training_participantsGender = "Male" THEN 1 ELSE 0 END) as total_male_participants'),
                            DB::raw('SUM(CASE WHEN employee_trainings.training_participantsGender = "Female" THEN 1 ELSE 0 END) as total_female_participants')
                        )
                        ->groupBy('employee_trainings.training_id', 'employee_trainings.training_title')
                        ->get();
        return response()->json($data, 200);
    }

    public function getOLLP_withTotalParticipants(Request $request){
        $data = SDD_Library::select(
                            'ollp.category as category',
                            'ollp.sex as sex',
                            DB::raw('COUNT(ollp.sex) as total_participants_attended'),
                            DB::raw('SUM(CASE WHEN ollp.sex = "Male" THEN 1 ELSE 0 END) as total_male_participants'),
                            DB::raw('SUM(CASE WHEN ollp.sex = "Female" THEN 1 ELSE 0 END) as total_female_participants')
                        )
                        ->groupBy('ollp.category')
                        ->get();
        return response()->json($data, 200);
    }

    public function getMatReq_withTotalParticipants(Request $request){
        $data = MaterialRequestt::select(
                            'material_requestts.created_at as date',
                            'material_requestts.category as category',
                            'material_requestts.sex as sex',
                            'material_requestts.clientType as clientType',
                            'material_requestts.ageBracket as ageBracket',
                            'material_requestts.researchInterests as researchInterests',
                            'material_requestts.topic as topic',
                            DB::raw('COUNT(material_requestts.sex) as total_participants_attended'),
                            DB::raw('SUM(CASE WHEN material_requestts.sex = "Male" THEN 1 ELSE 0 END) as total_male_participants'),
                            DB::raw('SUM(CASE WHEN material_requestts.sex = "Female" THEN 1 ELSE 0 END) as total_female_participants')
                        )
                        ->groupBy('material_requestts.created_at')
                        ->get();
        return response()->json($data, 200);
    }

    public function getSJA_withTotalParticipants(Request $request){
        $data = SDD_SJA::select(
                            'sja_trainings_participants.clientType as clientType',
                            'sja_trainings_participants.sex as sex',
                            'sja_trainings_participants.event_id as event_id',
                            DB::raw('COUNT(sja_trainings_participants.sex) as total_participants_attended'),
                            DB::raw('SUM(CASE WHEN sja_trainings_participants.sex = "Male" THEN 1 ELSE 0 END) as total_male_participants'),
                            DB::raw('SUM(CASE WHEN sja_trainings_participants.sex = "Female" THEN 1 ELSE 0 END) as total_female_participants')
                        )
                        ->groupBy('sja_trainings_participants.event_id')
                        ->get();
        return response()->json($data, 200);
    }

    public function getSTARBOOKS_withTotalParticipants(Request $request){
        $data = SDD_Starbooks::select(
                            'tbllogbooks.Date as Date',
                            'tbllogbooks.intGender as intGender',
                            'tbllogbooks.intCategory as intCategory',
                            DB::raw('COUNT(tbllogbooks.intGender) as total_participants_attended'),
                            DB::raw('SUM(CASE WHEN tbllogbooks.intGender = "0" THEN 1 ELSE 0 END) as total_male_participants'),
                            DB::raw('SUM(CASE WHEN tbllogbooks.intGender = "1" THEN 1 ELSE 0 END) as total_female_participants')
                        )
                        ->groupBy('tbllogbooks.Date','tbllogbooks.intCategory')
                        ->get();
        return response()->json($data, 200);
    }

    public function get_og_expertalk_withTotalParticipants(Request $request){
        $data = SDD_OG_expertalk::select(
                            'og_expertalk.date_aired as date_aired',
                            'og_expertalk.topic as topic',
                            'og_expertalk.reach as reach',
                            'og_expertalk.views as views',
                            'og_expertalk.engagement as engagement',
                            DB::raw('COUNT(og_expertalk.guest_gender) as total_participants_attended'),
                            DB::raw('SUM(CASE WHEN og_expertalk.guest_gender = "M" THEN 1 ELSE 0 END) as total_male_participants'),
                            DB::raw('SUM(CASE WHEN og_expertalk.guest_gender = "F" THEN 1 ELSE 0 END) as total_female_participants')
                        )
                        ->groupBy('og_expertalk.topic')
                        ->get();
        return response()->json($data, 200);
    }

    public function get_og_sja_withTotalParticipants(Request $request){
        $data = SDD_OG_sja::select(
                            'og_sja.title as title',
                            'og_sja.date as date',
                            'og_sja.participants as participants',
                            'og_sja.female as female',
                            'og_sja.male as male',
                            'og_sja.prefer_not as prefer_not',
                        )
                        ->groupBy('og_sja.id')
                        ->get();
        return response()->json($data, 200);
    }

    public function get_og_ollp_withTotalParticipants(Request $request){
        $data = SDD_OG_ollp::select(
                            'og_ollp.date as date',
                            'og_ollp.school as school',
                            'og_ollp.zoom_attendance as zoom_attendance',
                            'og_ollp.received_feedback as received_feedback',
                            'og_ollp.female as female',
                            'og_ollp.male as male',
                        )
                        ->groupBy('og_ollp.id')
                        ->get();
        return response()->json($data, 200);
    }

    public function getAllListHR_trainings(Request $request){
        $data = SDD_hr::groupBy('training_title')
                        ->get('*');
        return response()->json($data, 200);
    }

    public function getAllListHR_trainings_female(Request $request, $id){
        $data = SDD_hr::groupBy('training_title')
                        ->where('employee_trainings.training_id', $id)
                        ->where('employee_trainings.training_participantsGender', "Female")
                        ->get('*');
        return response()->json($data, 200);
    }

    public function getAllListHR_trainings_male(Request $request, $id){
        $data = SDD_hr::groupBy('training_title')
                        ->where('employee_trainings.training_id', $id)
                        ->where('employee_trainings.training_participantsGender', "Male")
                        ->get('*');
        return response()->json($data, 200);
    }


    // LIBRARY

    public function getAllListLibrary(Request $request){
        $data = SDD_Library::get('*');
        return response()->json($data, 200);
    }

    public function getAllListSJA(Request $request){
        $data = SDD_SJA::get('*');
        return response()->json($data, 200);
    }

    public function getAllListPJS(Request $request){
        $data = SDD_PJS::get('*');
        return response()->json($data, 200);
    }
}
