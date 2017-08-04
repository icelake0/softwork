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