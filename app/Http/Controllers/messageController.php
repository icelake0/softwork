<?php

namespace Softwork\Http\Controllers;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class messageController extends Controller
{
	public function index(Request $request)
    {	
    	$user_id=Auth::user()->id;
    	$messages=DB::select('select * from messages where user_id = ? ORDER BY message_time DESC',[$user_id]);
    	foreach($messages as $message){
    		$message->message_time= new Carbon($message->message_time);
    	}
    	DB::update('update users set number_of_new_messages = ? where id = ?',[0, $user_id]);
    	return view('message', ['messages'=>$messages]);

	}
}
