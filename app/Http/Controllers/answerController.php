<?php

namespace Softwork\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
class answerController extends Controller
{
     public function index(Request $request)
    {	
    	$question_id=$request->question_id;
    	$question = DB::select('select * from questions where id = ?',[$question_id]);
    	foreach($question as $question){
    		$question_id= $question->id;
    		$question_title=$question->title;
    		$question_content=$question->content;
    		$question_number_of_answers=$question->number_of_answers;
    		$question_time_asked=new Carbon($question->time_asked);
    		$question_user_id=$question->user_id;
            $question_softwork_answer=$question->softwork_answer;
            $question_profile_pic="";
            $users=DB::select('select profile_pic from users where id = ?',[$question->user_id]);
            foreach($users as $user){
                $question_profile_pic= $user->profile_pic;
            }
    	}
    	$user=DB::select('select username from users where id = ?',[$question_user_id]);
    	foreach($user as $user){
    		$username= $user->username;
    	}
    	$answers = DB::select('select * from answers where question_id = ?',[$question_id]);
        foreach($answers as $answer){
            $users=DB::select('select username, profile_pic from users where id = ?',[$answer->user_id]);
            $temp_username="";
            $temp_profile_pic="";
            foreach($users as $user){
                $temp_username= $user->username;
                $temp_profile_pic= $user->profile_pic;
            }
            $answer->answer_username=$temp_username;
            $answer->answer_profile_pic=$temp_profile_pic;
            $answer->time_answered=new Carbon($answer->time_answered);
        }
    	return view('answer',['answers'=>$answers, 'question_id'=>$question_id, 'question_title'=>$question_title, 'question_content'=>$question_content, 'question_number_of_answers'=>$question_number_of_answers, 'question_time_asked'=>$question_time_asked, 'question_username'=>$username, 'question_softwork_answer'=>$question_softwork_answer, 'question_profile_pic'=>$question_profile_pic]);
    }
}
