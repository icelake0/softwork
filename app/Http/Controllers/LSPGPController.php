<?php

namespace Softwork\Http\Controllers;

use Illuminate\Http\Request;

class LSPGPController extends Controller
{
	 public function index()
    {
        //return response()->asset('sim1result.json');
        $path = storage_path() . "/sim1result.json"; 
		$json = json_decode(file_get_contents($path), true);
        return response()->json(['response' => $json]);
    }
	
}
