<?php

namespace softwork\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class blogController extends Controller
{
     public function index(Request $request)
    {	
    	$blog_posts = DB::select('select * from blog_post');
    	foreach($blog_posts as $blog_post){
    		$blog_post->time_posted= new Carbon($blog_post->time_posted);
    	}
    	return view('blog_post',['blog_posts'=>$blog_posts]);
    }
     public function blog_page(Request $request)
    {	
    	$blog_post_id=$request->blog_post_id;
    	$blog_post = DB::select('select * from blog_post where id = ?',[$blog_post_id]);
    	foreach($blog_post as $blog_post){
    		$blog_post_id=$blog_post->id;
    		$title=$blog_post->title;
    		$content=$blog_post->content;
    		$time_posted= new Carbon($blog_post->time_posted);
    		$image_name=$blog_post->image_name;
    		$number_of_comments=$blog_post->number_of_comments;
    	}
        $comments = DB::select('select * from Blog_comments where blog_post_id = ?',[$blog_post_id]);
        foreach($comments as $comment){
            $comment->time_commented= new Carbon($comment->time_commented);
            $users=DB::select('select username from users where id = ?',[$comment->user_id]);
            $temp_username="";
            foreach($users as $user){
                $temp_username= $user->username;
            }
            $comment->comment_username=$temp_username;
        }
    	return view('blog_page',['comments'=>$comments, 'blog_post_id'=>$blog_post_id, 'title'=>$title,'content'=>$content, 'time_posted'=>$time_posted,'image_name'=>$image_name, 'number_of_comments'=>$number_of_comments]);
    }
}
