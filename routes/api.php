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
Route::get('getsim1Result/{matricNumber}', ['middleware' => 'cors', function(Request $request)
{		
	$matricNumber=$request->matricNumber;
	$path=$matricNumber;
	$json = json_decode(file_get_contents(storage_path()."/app//".$path."/sim1result.json"), true);
	return response()->json($json);
}]);
Route::get('getsim2Result/{matricNumber}', ['middleware' => 'cors', function(Request $request)
{		
	$matricNumber=$request->matricNumber;
	$path=$matricNumber;
	$json = json_decode(file_get_contents(storage_path()."/app//".$path."/sim2result.json"), true);
	return response()->json($json);
}]);
Route::get('getsim3Result/{matricNumber}', ['middleware' => 'cors', function(Request $request)
{		
	$matricNumber=$request->matricNumber;
	$path=$matricNumber;
	$json = json_decode(file_get_contents(storage_path()."/app//".$path."/sim3result.json"), true);
	return response()->json($json);
}]);
Route::get('getsim4Result/{matricNumber}', ['middleware' => 'cors', function(Request $request)
{		
	$matricNumber=$request->matricNumber;
	$path=$matricNumber;
	$json = json_decode(file_get_contents(storage_path()."/app//".$path."/sim4result.json"), true);
	return response()->json($json);
}]);
Route::get('getsim5Result/{matricNumber}', ['middleware' => 'cors', function(Request $request)
{		
	$matricNumber=$request->matricNumber;
	$path=$matricNumber;
	$json = json_decode(file_get_contents(storage_path()."/app//".$path."/sim5result.json"), true);
	return response()->json($json);
}]);
Route::get('getsim6Result/{matricNumber}', ['middleware' => 'cors', function(Request $request)
{		
	$matricNumber=$request->matricNumber;
	$path=$matricNumber;
	$json = json_decode(file_get_contents(storage_path()."/app//".$path."/sim6result.json"), true);
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
Route::get('/updateSim5Result/{matricNumber}/{sim5result}', ['middleware' => 'cors', function(Request $request)
{  		$path = storage_path() ."/app"."/".$request->matricNumber."/sim5result.json";
		File::put($path,$request->sim5result); 
}]);
Route::get('/updateSim6Result/{matricNumber}/{sim6result}', ['middleware' => 'cors', function(Request $request)
{  		$path = storage_path() ."/app"."/".$request->matricNumber."/sim6result.json";
		File::put($path,$request->sim6result); 
}]);
/*.........................now using database..................................*/
Route::get('/login/{matricNumber}/{password}', ['middleware' => 'cors', function(Request $request)
{
    	$result = DB::table('cgpa_users')
    	->where('matricnumber',$request->matricNumber)
    	->where('password',$request->password)->exists();;
    	if($result){
    		return response($request->matricNumber);
    	}
    	else{
    		return response("Incorrect MatricNumber or password");
    	}
}]);
Route::get('/register/{matricNumber}/{password}', ['middleware' => 'cors', function(Request $request)
{
		$matricNumber=$request->matricNumber;
		$password=$request->password;
		$error_user=DB::table('cgpa_users')
    	->where('matricnumber',$request->matricNumber)->exists();
		if($error_user){
			return response("MatricNumber already registered");
		}
		else{
    	DB::insert('insert into cgpa_users (matricnumber, password) values(?,?)',[$matricNumber, $password]);
    	$path=$matricNumber;
    	Storage::makeDirectory($path);
		//populate the folder with all needed files
		$sim1result=file_get_contents(storage_path()."/sim1result.json");
		$sim2result=file_get_contents(storage_path()."/sim2result.json");
		$sim3result=file_get_contents(storage_path()."/sim3result.json");
		$sim4result=file_get_contents(storage_path()."/sim4result.json");
		$sim5result=file_get_contents(storage_path()."/sim5result.json");
		$sim6result=file_get_contents(storage_path()."/sim6result.json");
		File::put(storage_path()."/app"."/".$path."/sim1result.json",$sim1result);
		File::put(storage_path()."/app"."/".$path."/sim2result.json",$sim2result);
		File::put(storage_path()."/app"."/".$path."/sim3result.json",$sim3result);
		File::put(storage_path()."/app"."/".$path."/sim4result.json",$sim4result);
		File::put(storage_path()."/app"."/".$path."/sim5result.json",$sim5result);
		File::put(storage_path()."/app"."/".$path."/sim6result.json",$sim6result);
		return response("signup success");
    	}
}]);

