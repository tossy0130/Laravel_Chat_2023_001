<?php

use Illuminate\Support\Facades\Route;

// === コントローラー　追加
use App\Http\Controllers\ChatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/


// ====== 追加
// === リダイレクト  / => chat へ飛ばす
Route::redirect('/', '/tossy_chat/chat');

// === /chat と、 ChatController を紐づけ
Route::resource('chat', ChatController::class);
