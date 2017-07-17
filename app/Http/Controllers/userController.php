<?php

namespace Softwork\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Softwork\Http\Requests;
use Softwork\Http\Controllers\Controller;

class userController extends Controller
{
    public function getUsername($user_id){
		$username = DB::select('select username from questions where id = value(?)', [$user_id]);
		return($username);
	}
}
