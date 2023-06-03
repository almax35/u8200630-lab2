<?php

use App\Http\Controllers\ArticleController; // Импортируем контроллер ArticleController
use Illuminate\Support\Facades\Route;
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
