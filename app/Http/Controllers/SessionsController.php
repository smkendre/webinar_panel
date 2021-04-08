<?php

namespace App\Http\Controllers;

use App\Libraries\CommonClass;
use DB;
use Illuminate\Http\Request;

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
        $bgImgClass = 'conferencebg';
        return $this->common->front_view('pages.conference', compact('bgImgClass'));
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

    public function survey()
    {
        return $this->common->front_view('pages.survey');
    }

    public function save_response(Request $request)
    {
        if ($request->isMethod('post')) {
            
            try {
                $form = 'crn_channel_leadership';
                $name = session()->get('username');
                $cname = session()->get('company');
                $email = session()->get('useremail');
                $objectives = $request->objectives;
                $session_useful = implode(', ',$request->session_useful);
                $area_research = implode(', ',$request->area_research);
                $technologies = $request->technologies;
                $instruments = $request->instruments;
                $rd_developing = $request->rd_developing;
                $chk_interested = implode(', ',$request->chk_interested);
                $rd_timeframe = $request->rd_timeframe;
                $marketing = $request->marketing;
                $tas_know_instrument = $request->rd_software;
                $rd_developing_others = $request->rd_developing_others;
                $rd_developing = $rd_developing . $rd_developing_others;
                $chk_interested_others = $request->chk_interested_others;
                $chk_interested = $chk_interested . $chk_interested_others;
                $tas_know_instrument_others= $request->rd_software_others;

                DB::table('aligent_survey')->insert([
                    'tas_forms' => $form,
                    'tas_au_id' => session()->get('daid'),
                    'tas_webinar_adjective' => $objectives,
                    'tas_useful_session' => $session_useful,
                    'tas_area_of_research' => $area_research,
                    'tas_technologies_frequently_use' => $technologies,
                    'tas_instruments_research' => $instruments,
                    'tas_developing' => $rd_developing,
                    'tas_timeframe' => $rd_timeframe,
                    'tas_purchase_instrument' => $chk_interested,
                    'tas_purchase_others' => $chk_interested_others,
                    'tas_know_instrument' => $tas_know_instrument,
                    'tas_know_instrument_others' => $tas_know_instrument_others,
                    'tas_developing_other' => $rd_developing_others,
                    'tas_ip' => $request->ip(),
                    'tas_created_on' => date('Y-m-d H:i:s'),
                ]);


                // send message to admin

                $subject = 'Survey Feedback for Omics and its relevance in understanding disease mechanisms';

                $headers = '<p style="font-weight: normal; color: #000; font-size: 13px;font-family: Verdana, \'sans-serif\', Calibri, Arial; margin: 10px 7px 0 3px;word-spacing:0px;padding:8px 0;font-weight:600;">Survey Data for Omics and its relevance in understanding disease mechanisms as follows: - </p><br>';
              
                $headers .= '<p style="color:#000;margin:0 auto;padding:8px 0 0; margin: 0 7px 0 5px;font-family: Verdana, \'sans-serif\', Calibri, Arial; font-size: 13px;font-weight:normal;"> <strong>(1)Did the webinar meet your objective?: </strong> - ' . $objectives . "</p>";
                $headers .= '<p style="color:#000;margin:0 auto;padding:8px 0 0; margin: 0 7px 0 5px;font-family: Verdana, \'sans-serif\', Calibri, Arial; font-size: 13px;font-weight:normal;"> <strong>(2) Which session was most useful for you?: -  </strong>' . $session_useful . "</p>";
                $headers .= '<p style="color:#000;margin:0 auto;padding:8px 0 0; margin: 0 7px 0 5px;font-family: Verdana, \'sans-serif\', Calibri, Arial; font-size: 13px;font-weight:normal;"> <strong>(3)What is your area of research?: -  </strong>' . $area_research . "</p>";
                $headers .= '<p style="color:#000;margin:0 auto;padding:8px 0 0; margin: 0 7px 0 5px;font-family: Verdana, \'sans-serif\', Calibri, Arial; font-size: 13px;font-weight:normal;"> <strong>(4) Which omics technologies you frequently use?: -  </strong>' . $technologies . "</p>";
                $headers .= '<p style="color:#000;margin:0 auto;padding:8px 0 0; margin: 0 7px 0 5px;font-family: Verdana, \'sans-serif\', Calibri, Arial; font-size: 13px;font-weight:normal;"> <strong>(5) Please specify instruments you currently use for your research.: -  </strong>' . $instruments . "</p>";
                $headers .= '<p style="color:#000;margin:0 auto;padding:8px 0 ; margin: 0 7px 0 5px;font-family: Verdana, \'sans-serif\', Calibri, Arial; font-size: 13px;font-weight:normal;"> <strong>(6) Do you need help in developing any of your applications? If yes, please specify: -  </strong>' . $rd_developing . "</p>";
                $headers .= '<p style="color:#000;margin:0 auto;padding:8px 0 ; margin: 0 7px 0 5px;font-family: Verdana, \'sans-serif\', Calibri, Arial; font-size: 13px;font-weight:normal;"> <strong>(7) Please specify instruments that you would be interested to purchase: -  </strong>' . $chk_interested . "</p>";
                $headers .= '<p style="color:#000;margin:0 auto;padding:8px 0 ; margin: 0 7px 0 5px;font-family: Verdana, \'sans-serif\', Calibri, Arial; font-size: 13px;font-weight:normal;"> <strong>(8) Buying time frame: -  </strong>' . $rd_timeframe . "</p>";
                $headers .= '<p style="color:#000;margin:0 auto;padding:8px 0 ; margin: 0 7px 0 5px;font-family: Verdana, \'sans-serif\', Calibri, Arial; font-size: 13px;font-weight:normal;"> <strong>(9) Would you like to know more about any particular Agilent instrument/software? If yes, please specify: -  </strong>' . $tas_know_instrument . "</p>";
                $headers .= '<p style="color:#000;margin:0 auto;padding:8px 0 ; margin: 0 7px 0 5px;font-family: Verdana, \'sans-serif\', Calibri, Arial; font-size: 13px;font-weight:normal;"> <strong>Yes, This is co-hosted by Express Healthcare and Agilent Technologies: -  </strong>' . $marketing . "</p>";

                
                $this->common->send_mail('Sangita Kendre', 'sangita.kendre@indianexpress.com', $headers, $subject, 'mail');
                $this->common->send_mail('pavneet sahni', 'pavneet.sahni@indianexpress.com', $html, $subject, 'mail');


                return  response()->json([
                    'status' => 200,
                    'msg' =>  'Responses added',
                ], 200);
            } catch (Exception $e) {
                return response()->json(['status' => 201, 'error' => $e->getMessage()], 201);
            }
        } else {
            return  response()->json([
                'status' => 202,
                'msg' => 'Wrong Request',
            ], 202);
        }
    }
}
