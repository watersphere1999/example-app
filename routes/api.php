<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CollectionController;

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
Route::middleware('auth:api')->group(function () { 
    Route::apiResource('post', 'api\PostController');
});
/*
Route::get('/collection/{id}', function (Request $request) {

    if ($request->header('X-Secure-Code') != '12345678') {
        return response(['error' => 'Secure code not valid.'], 403);
    }

    return [
        "id" => 0,
        "title" => "親子步道",
        "subTitle" => "老少咸宜，生活好去處",
        "bgColor" => "yellow",
        "iconImage" => "https://example.com/uploads/images/collection/0/icon.png",
        "trails" => [
            [
                "id" => 0,
                "title" => "冷水坑步道",
                "location" => "台北市士林區",
                "distance" => 600,
                "coverImage" => "https://example.com/uploads/images/trail/0/cover.jpg"
            ],
            [
                "id" => 1,
                "title"  => "東吳大學登山步道",
                "location"  => "台北市士林區",
                "distance"  => 3824,
                "coverImage"  => "https://example.com/uploads/images/trail/1/cover.jpg"
            ],
            [
                "id"  =>  2,
                "title"  =>  "二子坪步道",
                "location"  =>  "新北市三芝區",
                "distance"  =>  3600,
                "coverImage"  => "https://example.com/uploads/images/trail/2/cover.jpg"
            ]
        ]
    ];
}); 
*/
Route::resource('collection', CollectionController::class); 
Route::post("/trail", [TrailController::class, 'createNewTrail']);
