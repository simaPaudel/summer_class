<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Genre;

class MovieController extends Controller
{
   public function index()
        {
            $title = 'Movies';
            $genres = Genre::all();

            $movies = Movie::with('genre')
                        ->filterSearch()
                        ->filterGenre()
                        ->latest()
                        ->get();

            return view('admin.movies.index', compact('title', 'movies', 'genres'));
        }


    public function create()
    {
        $genres = Genre::all();
        return view('admin.movies.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:55',
            'genre_id' => 'required|exists:genres,id',
            'description' => 'nullable|string',
            'duration' => 'required|numeric',
            'release_date' => 'required|date',
            'rating' => 'required|numeric|min:0|max:10',
            'language' => 'required|string|max:15',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $data = $request->only([
            'name', 'genre_id', 'description', 'duration',
            'release_date', 'rating', 'language'
        ]);

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/movies'), $fileName);
            $data['image'] = 'uploads/movies/' . $fileName;
        }

        Movie::create($data);

        return redirect()->route('admin.movies.index')->with('success', 'Movie added successfully!');
    }

    public function edit(Movie $movie)
    {
        $genres = Genre::all();
        return view('admin.movies.edit', compact('movie', 'genres'));
    }

    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'name' => 'required|string|max:55',
            'genre_id' => 'required|exists:genres,id',
            'description' => 'nullable|string',
            'duration' => 'required|numeric',
            'release_date' => 'required|date',
            'rating' => 'required|numeric|min:0|max:10',
            'language' => 'required|string|max:15',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $data = $request->only([
            'name', 'genre_id', 'description', 'duration',
            'release_date', 'rating', 'language'
        ]);

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/movies'), $fileName);
            $data['image'] = 'uploads/movies/' . $fileName;
        }

        $movie->update($data);

        return redirect()->route('admin.movies.index')->with('success', 'Movie updated successfully!');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('admin.movies.index')->with('success', 'Movie deleted successfully!');
    }
}
