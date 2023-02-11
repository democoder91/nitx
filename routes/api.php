<?php

use App\Models\Ad;
use App\Models\Screen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getScreenData/{id}', function (Request $request) {
    $screen = Screen::find($request->id);
    return response()->json([
        "status" => $screen->status,
        "id" => $screen->id,
        "earning" => $screen->getEarning()
    ]);
})->name('getScreenData');

Route::get('/updateAdModal/{id}', function (Request $request) {
    return response()->json(
        Ad::whereId($request->id)->with('screens', 'advertiser')->get()
    );
})->name("updateAdModal");

Route::get('/getSummary/{id}', function (Request $request) {
    return response()->json(Ad::find($request->id));
})->name('getSummary');