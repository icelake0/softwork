<?php

namespace softwork\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
class qandaController extends Controller
{
    public function index()
    {
    	$questions = DB::select('select * from questions');
    	foreach($questions as $question){
    		$users=DB::select('select username, profile_pic from users where id = ?',[$question->user_id]);
    		$temp_username="";
            $temp_profile_pic="";
    		foreach($users as $user){
    			$temp_username= $user->username;
                $temp_profile_pic= $user->profile_pic;
    		}
    		$question->question_username=$temp_username;
            $question->question_profile_pic=$temp_profile_pic;
            $question->time_asked=new Carbon($question->time_asked);
    	}
    	return view('qanda',['questions'=>$questions]);
    }
}