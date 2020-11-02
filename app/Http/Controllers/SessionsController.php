<?php

namespace App\Http\Controllers;

use App\Libraries\CommonClass;
use DB;

class SessionsController extends Controller
{
    public $common;

    public function __construct()
    {
        $this->common = new CommonClass();
    }

    public function index()
    {
        // $sessions = DB::table('sessions')
        // ->select('as_date', 'as_start_time', 'as_end_time', 'as_status', 'as_id')
        // ->where('as_ae_id', env('EVENT_ID'))
        // ->get();

        // foreach ($sessions  as $session) {
        //     // $sponsors_ids = explode(',', $session->ds_dsp_id);

        //     // get speakers and title from mapping table
        //     $session->individual_sessions = DB::table('session_speakers_mapping')
        //     ->select('assm_title', 'assm_ap_id', 'assm_start_time', 'assm_end_time', 'assm_webinar_id', 'ap_image', 'ap_name', 'ap_designation', 'ap_company')
        //     ->join('speakers', 'speakers.ap_id', '=', 'session_speakers_mapping.assm_ap_id')
        //     ->where('assm_as_id', $session->as_id)->get();

        //     foreach ($session->individual_sessions as $sp) {
        //         $url = DB::table('session_attendees_mappings')
        //         ->select('asam_login_url')
        //         ->where('asam_au_id', '=', session()->get('daid'))
        //         ->where('asam_as_id', '=', $session->assm_as_id)
        //         ->where('asam_login_url', 'like', '%'.$sp->assm_webinar_id.'%')
        //         ->get()->first();
        //         $sp->login_url = (!empty($url)) ? $url->asam_login_url : '';
        //     }

        //     // $session->sponsors = DB::table('sponsors')
        //     //     ->select('dsp_slug', 'dsp_logo')
        //     //     ->whereIn('dsp_id', $sponsors_ids)->get();

        //     // $url = DB::table('session_attendees_mappings')
        //     //     ->select('asam_login_url')
        //     //     ->where('asam_au_id', '=', session()->get('daid'))
        //     //     ->where('asam_as_id', '=', $session->as_id)
        //     //     ->get()->first();

        //     // $session->login_url = (!empty($url)) ? $url->asam_login_url : '';

        //     // if ($session->as_status == 1) {
        //     //     $pastSessions[] = $session;
        //     // } else {
        //     //     $activeSessions[] = $session;
        //     // }
        //     //     unset($tracks->sessions[$index]);
        //     // }

        //     ++$index;
        // }

        // //dd($sessions);

        // //  $pastSessions = array_reverse($pastSessions);

        return $this->common->front_view('pages.conference');
    }

    public function agenda()
    {
        return $this->common->front_view('auth.agenda');
    }

    public function assets()
    {
        $agile = DB::table('downloads')->select('ad_url', 'ad_title', 'ad_id')->where('ad_asp_slug', '=', 'agile-content-management')->get();

        $data = DB::table('downloads')->select('ad_url', 'ad_title', 'ad_id')->where('ad_asp_slug', '=', 'data-driven-insights')->get();

        $experience = DB::table('downloads')->select('ad_url', 'ad_title', 'ad_id')->where('ad_asp_slug', '=', 'experience-driven-commerce')->get();

        return $this->common->front_view('auth.assets', compact('data', 'agile', 'experience'));
    }

    public function lobby()
    {
        return $this->common->front_view('pages.lobby');
    }

    public function awards()
    {
        return $this->common->front_view('pages.awards');
    }
}
