<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;

Route::get('/', function () {
    return view('main', [
        'title' => 'Мой блог'
    ]);
});

Route::get('/bye/{name}', [HelloController::class, 'sayBye']);

Route::get('/hello/{username}', function ($username) {
    return view('main', [
        'title' => 'Страница приветствия',
        'username' => $username
    ]);
});