<?php

namespace App\Http\Controllers;

use App\Attendees;
use App\Libraries\CommonClass;
use DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $common;

    public function __construct()
    {
        $this->common = new CommonClass();
    }

    public function index()
    {
        if (session()->get('is_verified')) {
            return redirect('conference');
        }

        return $this->common->front_view('layouts.home');
    }

    public function login(Request $request)
    {
        try {
            // update user status
            $user = Attendees::select('au_id', 'au_unique_id', 'au_email', 'au_phone', 'au_fname', 'au_lname', 'au_company', 'au_job_title')->where('au_forms', '=', 'agilent_disease_mechanisms')->where('au_email', '=', $request->email)->orWhere('au_phone', '=', $request->email)->get()->first();


            if (!empty($user)) {
                $request->session()->put('username', $user->au_fname.' '.$user->au_lname);
                $request->session()->put('useremail', $user->au_email);
                $request->session()->put('userphone', $user->au_phone);
                $request->session()->put('userid', $user->au_unique_id);
                $request->session()->put('job_title', $user->au_job_title);
                $request->session()->put('company', $user->au_company);
                $request->session()->put('daid', $user->au_id);
                $request->session()->put('is_verified', 1);

                $this->common->session_start_tracking($user->au_id, 'login', $request->ip());

                // return redirect('/conference');
                return redirect('/survey');
                // return redirect('/countdown');
            } else {
                return redirect()->back()->with('msg', 'You have not registered for event.');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('msg', $e->getMessage());
        }
    }

    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            
            try {
                $fname = $request->fname;
                $lname = $request->lname;
                $email = $request->email;
                $phone = $request->phone;
                $company = $request->company;
                $job_title = $request->job_title;
                $address = $request->address;
                $city = $request->city;
                $country = $request->country;
                $form_id = $request->form;
                $source = $request->source;
                $pincode = $request->pincode;
                $sessionData = $request->join_urls;

                // create unique key
                $unique_id = $this->common->getToken(10);

                $is_exists = Attendees::select('au_id')->where('au_email', '=', $email)->where('au_forms', '=', $form_id)->get()->first();
                // dd($is_exists);
                if (!empty($is_exists)) {
                    $attendee_id = $is_exists->au_id;
                } else {
                    DB::enableQueryLog();
                    $data = Attendees::create(
                    [
                        'au_name' => $fname.' '.$lname,
                        'au_fname' => $fname,
                        'au_lname' => $lname,
                        'au_email' => $email,
                        'au_phone' => $phone,
                        'au_company' => $company,
                        'au_job_title' => $job_title,
                        'au_address' => $address,
                        'au_city' => $city,
                        'au_country' => $country,
                        'au_forms' => $form_id,
                        'au_unique_id' => $unique_id,
                        'au_source' => $source,
                        'au_pincode' => $pincode,
                        'created_at' => date('Y-m-d H:i:s'),
                    ]
                );

                    $query = DB::getQueryLog();

                    $attendee_id = $data->id;
                }

                // foreach ($sessionData as $key => $value) {
                //     DB::enableQueryLog();
                //     $is_added = DB::table('sessions')
                //     ->select('sessions.as_id', 'session_attendees_mappings.asam_id')
                //     ->join('session_attendees_mappings', 'session_attendees_mappings.asam_as_id', '=', 'sessions.as_id')
                //     ->join('session_speakers_mapping', 'session_speakers_mapping.assm_as_id', '=', 'sessions.as_id')
                //     ->where('session_attendees_mappings.asam_au_id', '=', $attendee_id)->where('session_speakers_mapping.assm_webinar_id', '=', $key)->get()->first();

                //     if (empty($is_added)) {
                //         // $session = DB::table('sessions')
                //         // ->select('as_id')
                //         // ->join('session_speakers_mapping', 'session_speakers_mapping.assm_as_id', '=', 'sessions.as_id')

                //         // ->where('assm_webinar_id', '=', $row['key'])->get()->first();

                //         // $query = DB::getQueryLog();

                //         // if (!empty($session)) {
                //             DB::table('session_attendees_mappings')->insert([
                //                 'asam_au_id' => $attendee_id,
                //                 'asam_as_id' => $key,
                //                 'asam_login_url' => $value,
                //                 'asam_created_at' => date('Y-m-d H:i:s'),
                //             ]);
                //         // }
                //     } else {
                //         //   dd($is_added, $session);
                //         DB::table('session_attendees_mappings')->where('asam_id', '=', $is_added->asam_id)->update([
                //             'asam_au_id' => $attendee_id,
                //             'asam_as_id' => $key,
                //             'asam_login_url' => $value,
                //             'asam_updated_at' => date('Y-m-d H:i:s'),
                //         ]);
                //     }
                // }

                return  response()->json([
                'status' => 200,
                'msg' =>  $email .' User Registered',
            ], 200);
            } catch (Exception $e) {
                return response()->json(['error' => $e->getMessage()], 304);
            }
        } else {
            return  response()->json([
                'status' => 400,
                'msg' => 'Wrong Request',
            ], 400);
        }
    }

    public function logout()
    {
        session()->forget('username');
        session()->forget('useremail');
        session()->forget('userphone');
        session()->forget('userid');
        session()->forget('job_title');
        session()->forget('company');
        session()->forget('daid');
        session()->forget('is_verified');

        $this->common->session_end_tracking(session()->get('session_id'));

        return redirect('/');
    }

    public function view_profile(Request $request)
    {
        // get attendees details
        $user = Attendees::where('au_id', '=', $request->session()->get('daid'))->get()->first();

        // get attendees session details
        $sessions = DB::table('event')
        ->select('event.ae_title', 'event.ae_chat_channel', 'event.ae_id', 'event.ae_start_datetime', 'event.ae_end_datetime', 'as_id', 'as_url', 'as_date', 'as_start_time', 'as_end_time', 'as_status', 'as_asp_id', 'as_title')
        ->join('sessions', 'sessions.as_ae_id', '=', 'event.ae_id')
        ->where('event.ae_id', 1)
        ->get();

        foreach ($sessions  as $session) {
            $titles = DB::table('session_speakers_mapping')->where('assm_as_id', '=', $session->as_id)->pluck('assm_title')->toArray();
            $session->ds_title = implode('<br>', $titles);
            $url = DB::table('session_attendees_mappings')
            ->select('asam_login_url')
            ->where('asam_au_id', '=', session()->get('daid'))
            ->where('asam_as_id', '=', $session->as_id)
            ->get()->first();

            $session->login_url = (!empty($url)) ? $url->asam_login_url : '';

            if ($session->as_status == 1) {
                unset($sessions[$index]);
            }

            ++$index;
        }

        // return view
        return $this->common->front_view('auth.profile', compact('user', 'sessions'));
    }

    public function edit_profile(Request $request)
    {
        // get attendees details
        $user = Attendees::where('au_id', '=', $request->session()->get('daid'))->get()->first();
        // update on post
        if ($request->isMethod('post')) {
            Attendees::where('au_id', '=', $request->session()->get('daid'))->update([
                'au_fname' => $request->fname,
                'au_lname' => $request->lname,
           //     'au_phone' => $request->phone,
                'au_company' => $request->organization,
                'au_job_title' => $request->job_title,
                'au_address' => $request->address,
                'au_city' => $request->city,
                'au_pincode' => $request->zipCode,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            return redirect()->back();
        } else {
            return $this->common->front_view('auth.edit-profile', compact('user'));
        }
    }

    public function ajaxlogin(Request $request)
    {
        try {
            // update user status
            $user = Attendees::select('au_id', 'au_unique_id', 'au_email', 'au_phone', 'au_fname', 'au_lname', 'au_company', 'au_job_title')->where('au_forms', '=', 'agilent_disease_mechanisms')->where('au_email', '=', $request->email)->orWhere('au_phone', '=', $request->email)->get()->first();


            if (!empty($user)) {
                return  response()->json([
                    'status' => 200,
                    'msg' => 'User Registered',
                ], 200);
            } else {
                return  response()->json([
                    'status' => 300,
                    'msg' => 'User not Registered',
                ], 200);
            }
        } catch (Exception $e) {
            return  response()->json([
                'status' => 500,
                'msg' =>  $e->getMessage(),
            ], 500);
        }
    }


    public function countdown(){
        return view('layouts.countdown');
    }
}
