<?php

use Illuminate\Support\Facades\Route;
use App\Models\Release;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/changelog', function () {
    $releases = Release::query()
        ->where('published', true)
        ->with('entries')
        ->latest('released_at')
        ->paginate(10);

    return view('changelog', compact('releases'));
})->name('changelog');
