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
	$json = json_decode(file_get_contents("samccgpac/".$matricNumber."_sim1result.json"), true);
	return response()->json($json);
}]);
Route::get('getsim2Result/{matricNumber}', ['middleware' => 'cors', function(Request $request)
{		
	$matricNumber=$request->matricNumber;
	$path=$matricNumber;
	$json = json_decode(file_get_contents("samccgpac/".$matricNumber."_sim2result.json"), true);
	return response()->json($json);
}]);
Route::get('getsim3Result/{matricNumber}', ['middleware' => 'cors', function(Request $request)
{		
	$matricNumber=$request->matricNumber;
	$path=$matricNumber;
	$json = json_decode(file_get_contents("samccgpac/".$matricNumber."_sim3result.json"), true);
	return response()->json($json);
}]);
Route::get('getsim4Result/{matricNumber}', ['middleware' => 'cors', function(Request $request)
{		
	$matricNumber=$request->matricNumber;
	$path=$matricNumber;
	$json = json_decode(file_get_contents("samccgpac/".$matricNumber."_sim4result.json"), true);
	return response()->json($json);
}]);
Route::get('getsim5Result/{matricNumber}', ['middleware' => 'cors', function(Request $request)
{		
	$matricNumber=$request->matricNumber;
	$path=$matricNumber;
	$json = json_decode(file_get_contents("samccgpac/".$matricNumber."_sim5result.json"), true);
	return response()->json($json);
}]);
Route::get('getsim6Result/{matricNumber}', ['middleware' => 'cors', function(Request $request)
{		
	$matricNumber=$request->matricNumber;
	$path=$matricNumber;
	$json = json_decode(file_get_contents("samccgpac/".$matricNumber."_sim6result.json"), true);
	return response()->json($json);
}]);
Route::get('/updateSim1Result/{matricNumber}/{sim1result}', ['middleware' => 'cors', function(Request $request)
{  	$matricNumber=$request->matricNumber;
	$path = "samccgpac/".$matricNumber."_sim1result.json";
		File::put($path, $request->sim1result); 
}]);
Route::get('/updateSim2Result/{matricNumber}/{sim2result}', ['middleware' => 'cors', function(Request $request)
{  		$matricNumber=$request->matricNumber;
		$path = "samccgpac/".$matricNumber."_sim2result.json";
		File::put($path, $request->sim2result); 
}]);
Route::get('/updateSim3Result/{matricNumber}/{sim3result}', ['middleware' => 'cors', function(Request $request)
{  		$matricNumber=$request->matricNumber;
		$path = "samccgpac/".$matricNumber."_sim3result.json";
		File::put($path, $request->sim3result); 
}]);
Route::get('/updateSim4Result/{matricNumber}/{sim4result}', ['middleware' => 'cors', function(Request $request)
{  		$matricNumber=$request->matricNumber;
		$path = "samccgpac/".$matricNumber."_sim4result.json";
		File::put($path, $request->sim4result); 
}]);
Route::get('/updateSim5Result/{matricNumber}/{sim5result}', ['middleware' => 'cors', function(Request $request)
{  		$matricNumber=$request->matricNumber;
		$path = "samccgpac/".$matricNumber."_sim5result.json";
		File::put($path, $request->sim5result); 
}]);
Route::get('/updateSim6Result/{matricNumber}/{sim6result}', ['middleware' => 'cors', function(Request $request)
{  		$matricNumber=$request->matricNumber;
		$path = "samccgpac/".$matricNumber."_sim6result.json";
		File::put($path, $request->sim6result); 
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
		//populate the folder with all needed files
		$sim1result=file_get_contents("samccgpac/sim1result.json");
		$sim2result=file_get_contents("samccgpac/sim2result.json");
		$sim3result=file_get_contents("samccgpac/sim3result.json");
		$sim4result=file_get_contents("samccgpac/sim4result.json");
		$sim5result=file_get_contents("samccgpac/sim5result.json");
		$sim6result=file_get_contents("samccgpac/sim6result.json");
		File::put("samccgpac/".$matricNumber."_sim1result.json",$sim1result);
		File::put("samccgpac/".$matricNumber."_sim2result.json",$sim2result);
		File::put("samccgpac/".$matricNumber."_sim3result.json",$sim3result);
		File::put("samccgpac/".$matricNumber."_sim4result.json",$sim4result);
		File::put("samccgpac/".$matricNumber."_sim5result.json",$sim5result);
		File::put("samccgpac/".$matricNumber."_sim6result.json",$sim6result);
		return response("signup success");
    	}
}]);
