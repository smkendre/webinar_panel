<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use App\Libraries\CommonClass;

class QuestionController extends Controller
{
    public $common;

    public function __construct()
    {
        $this->common = new CommonClass();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            if ($request->isMethod('post')) {
                $question = $request->question;
                $user_id =  $request->session()->get('daid');
    
                Question::create(
                    [
                        'aq_au_id' => $user_id,
                        'aq_question' => $question,
                        'aq_created_at' => date('Y-m-d H:i:s'),
                    ]
                );

                $html = '	<p
                style="color:#000;margin:0 auto;padding:8px 0;margin:0 7px 0 5px;line-height:24px;font-family:Verdana,&#39;sans-serif&#39;,Calibri,Arial;font-size:13px;font-weight:normal">
                <span>'.session()->get('username').' asked a question on Agilent 2020 event.</p>
                <p style="font-weight:normal;color:#000000;font-size:14px;font-family:Verdana,sans-serif;padding:10px;line-height:25px;font-style: italic; background-color: #cccccc;">'.$question.'</p>';


                $subject = 'Ask a Question -  Agilent 2020 event';

                $this->common->send_mail('Sangita Kendre', 'sangita.kendre@indianexpress.com', $html, $subject, 'mail');
                $this->common->send_mail('pavneet sahni', 'pavneet.sahni@indianexpress.com', $html, $subject, 'mail');
                $this->common->send_mail('viraj mehta', 'viraj.mehta@indianexpress.com', $html, $subject, 'mail');


                return  response()->json([
                    'status' => 200,
                    'msg' => 'User Registered',
                ], 200);
                
            }else {
                return  response()->json([
                    'status' => 201,
                    'msg' => 'Wrong Request',
                ], 200);
            }
        }
        catch (Exception $e) {
            return response()->json([ 'status' => 304, 'msg' => $e->getMessage()], 200);
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
