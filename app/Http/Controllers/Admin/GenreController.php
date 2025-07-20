<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::filterSearch()->latest()->get();
        return view('admin.genres.index', compact('genres'));
    }


    public function create()
    {
        return view('admin.genres.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        Genre::create($request->all());

        return redirect()->route('admin.genres.index')->with('success', 'Genre created successfully!');
    }

    public function edit(Genre $genre)
    {
        return view('admin.genres.edit', compact('genre')); 
    }

    public function update(Request $request, Genre $genre)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $genre->update($request->all());

        return redirect()->route('admin.genres.index')->with('success', 'Genre updated successfully!');
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();

        return redirect()->route('admin.genres.index')->with('success', 'Genre deleted successfully!');
    }
}
