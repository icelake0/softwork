<?php

namespace Softwork\Http\Controllers;

use Illuminate\Http\Request;

use DB;use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class askQuestionController extends Controller
{
	public function __construct()
    {
        $this->middleware('askQuestionMiddleware');
    }

    public function index(Request $request)
    {	
    	$title= $request->input('title');
    	$catigory=$request->input('catigory');
    	$content=$request->input('content');
    	$time=date("Y-m-d H:i:s");
    	$user_id=Auth::user()->id;
    	DB::insert('insert into questions (title, catigory, content, time_asked, user_id) values(?,?,?,?,?)',[$title, $catigory, $content, $time, $user_id]); 
    	return redirect('/qanda');
    }

     public function answerQuestion(Request $request)
    {   
        $content=$request->input('content');
        $time=date("Y-m-d H:i:s");
        $user_id=Auth::user()->id;
        $question_id=$request->input('question_id');
        $answers=DB::select('select number_of_answers from questions where id = ?', [$question_id]);
        foreach($answers as $answer){
            $number_of_answers=$answer->number_of_answers;
        }
        $number_of_answers++;
        DB::update('update questions set number_of_answers= ? where id = ?',[$number_of_answers, $question_id]);
        DB::insert('insert into answers (content, time_answered, user_id, question_id) values(?,?,?,?)',[$content, $time, $user_id, $question_id]); 
        $redirect_url="/answer?question_id={$question_id}";
        return redirect($redirect_url);
    }

     public function comment_on_blog_page(Request $request)
    {   
        $comment=$request->input('content');
        $time=date("Y-m-d H:i:s");
        $user_id=Auth::user()->id;
        $blog_post_id=$request->input('blog_post_id');
        $comment_number=DB::select('select number_of_comments from blog_post where id = ?', [$blog_post_id]);
        foreach($comment_number as $comment_number){
            $number_of_comments=$comment_number->number_of_comments;
        }
        $number_of_comments++;
        DB::update('update blog_post set number_of_comments= ? where id = ?',[$number_of_comments, $blog_post_id]);
        DB::insert('insert into blog_comments (comment, time_commented, user_id, blog_post_id) values(?,?,?,?)',[$comment, $time, $user_id, $blog_post_id]); 
        $redirect_url="/blog_page?blog_post_id={$blog_post_id}";
        return redirect($redirect_url);
    }
    public function report_fault(Request $request)
    {   
        $faultdescription= $request->input('faultdescription');
        $time=date("Y-m-d H:i:s");
        $user_id=Auth::user()->id;
        DB::insert('insert into faults (content, user_id, time_posted) values(?,?,?)',[$faultdescription, $user_id, $time]);
        $content='we have recived your fault report and we will get back to you as soon as possible';
        $direction='r';
        $message_time=date("Y-m-d H:i:s");
        DB::insert('insert into messages (content, user_id, direction, message_time) values(?,?,?,?)',[$content, $user_id, $direction, $message_time]);
        $messages=DB::select('select number_of_new_messages from users where id = ?',[$user_id]);
        $number_of_new_messages=0;
        foreach($messages as $message){
            $number_of_new_messages=$message->number_of_new_messages;
        }
        $number_of_new_messages++;
        DB::update('update users set number_of_new_messages = ? where id = ?',[$number_of_new_messages, $user_id]);
        return redirect('/');
    }
    public function update_profilepic(Request $request)
    {  
        $user_id=Auth::user()->id;
        $file = $request->file('image');
        if($file==null) {
            $upload_error='Please select an image';
            return view('home',['pp_upload_error'=>$upload_error]);
        }
        $upload_error= '';
        $file_new_name='user'.$user_id.'.'.$file->getClientOriginalExtension();
        $file_extention=$file->getClientOriginalExtension();
        if($file_extention != 'jpg' && $file_extention != 'PNG' && $file_extention != 'jpeg' && $file_extention != 'gif' ) {
            $upload_error='file is not an image';
            return view('home',['pp_upload_error'=>$upload_error]);
        }
        if($file->getSize()>205000){
            $upload_error= 'maximum file size allowed is 200kb';
            return view('home',['pp_upload_error'=>$upload_error]);
        }
        $destinationPath = 'images/profilePics';
        $file->move($destinationPath,$file_new_name);
        DB::update('update users set profile_pic = ? where id = ?',[$file_new_name,$user_id]);
        return view('home',['pp_upload_error'=>$upload_error]);
    }
     public function sendMessage(Request $request)
    {  
        $content=$request->input('content');
        $user_id= Auth::user()->id;
        $direction='s';
        $message_time=date("Y-m-d H:i:s");
        DB::insert('insert into messages (content, user_id, direction, message_time) values(?,?,?,?)',[$content, $user_id, $direction, $message_time]);
        return redirect('/message');
        
    }
}