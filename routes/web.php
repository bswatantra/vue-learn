<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'app');
Route::view('{slug}', 'app');
