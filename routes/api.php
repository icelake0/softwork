<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::get('/getjson','LSPGPController@index');
Route::get('/getjson', ['middleware' => 'cors', function()
{
   		$path = storage_path() . "/sim1result.json"; 
		$json = json_decode(file_get_contents($path), true);
        return response()->json($json);
}]);
Route::get('getsim1Result{matricNumber?}', ['middleware' => 'cors', function(Request $request)
{		
	$matricNumber=$request->matricNumber;
	$path=$matricNumber;
	if(Storage::exists($path)){
		$json = json_decode(file_get_contents(storage_path()."/App//".$path."/sim1result.json"), true);
		return response()->json($json);
	}
	else{
		Storage::makeDirectory($path);
		//populate the folder with all needed files
		$sim1result=file_get_contents(storage_path()."/sim1result.json");
		$sim2result=file_get_contents(storage_path()."/sim2result.json");
		$sim3result=file_get_contents(storage_path()."/sim3result.json");
		$sim4result=file_get_contents(storage_path()."/sim4result.json");
		File::put(storage_path()."/App"."/".$path."/sim1result.json",$sim1result);
		File::put(storage_path()."/App"."/".$path."/sim2result.json",$sim2result);
		File::put(storage_path()."/App"."/".$path."/sim3result.json",$sim3result);
		File::put(storage_path()."/App"."/".$path."/sim4result.json",$sim4result);
		//$json = json_decode(file_get_contents(storage_path()."/App//".$path."/sim1result.json"), true);
		//return response()->json($json);
	}
}]);
Route::get('getsim2Result{matricNumber?}', ['middleware' => 'cors', function(Request $request)
{		
	$matricNumber=$request->matricNumber;
	$path=$matricNumber;
		$json = json_decode(file_get_contents(storage_path()."/App//".$path."/sim2result.json"), true);
		return response()->json($json);
}]);
Route::get('getsim3Result{matricNumber?}', ['middleware' => 'cors', function(Request $request)
{		
	$matricNumber=$request->matricNumber;
	$path=$matricNumber;
		$json = json_decode(file_get_contents(storage_path()."/App//".$path."/sim3result.json"), true);
		return response()->json($json);
}]);
Route::get('getsim4Result{matricNumber?}', ['middleware' => 'cors', function(Request $request)
{		
	$matricNumber=$request->matricNumber;
	$path=$matricNumber;
		$json = json_decode(file_get_contents(storage_path()."/App//".$path."/sim4result.json"), true);
		return response()->json($json);
}]);
Route::get('/updateSim1Result/{matricNumber}/{sim1result}', ['middleware' => 'cors', function(Request $request)
{  		$path = storage_path() ."/app"."/".$request->matricNumber."/sim1result.json";
		File::put($path,$request->sim1result); 
}]);
Route::get('/updateSim2Result/{matricNumber}/{sim2result}', ['middleware' => 'cors', function(Request $request)
{  		$path = storage_path() ."/app"."/".$request->matricNumber."/sim2result.json";
		File::put($path,$request->sim2result); 
}]);
Route::get('/updateSim3Result/{matricNumber}/{sim3result}', ['middleware' => 'cors', function(Request $request)
{  		$path = storage_path() ."/app"."/".$request->matricNumber."/sim3result.json";
		File::put($path,$request->sim3result); 
}]);
Route::get('/updateSim4Result/{matricNumber}/{sim4result}', ['middleware' => 'cors', function(Request $request)
{  		$path = storage_path() ."/app"."/".$request->matricNumber."/sim4result.json";
		File::put($path,$request->sim4result); 
}]);
