<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Movie;
use App\Models\Genre;
use App\Models\Watchlist;


class DashboardController extends Controller
{
    public function index()
    {
        $statistics = [
            'totalUsers' => User::count(),
            'totalMovies' => Movie::count(),
            'totalGenres' => Genre::count(),
            'totalMoviesWatched' =>  Watchlist::count(),
        ];

        $movies = Movie::orderBy('release_date', 'desc')->take(5)->get();

        return view('admin.dashboard.index', compact('statistics', 'movies'));
    }
}

