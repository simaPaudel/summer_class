<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    // Add fillable fields to allow mass assignment safely
    protected $fillable = [
        'name',
        'genre_id',
        'description',
        'duration',
        'release_date',
        'rating',
        'language',
        'image',
    ];

    // Define the relationship to Genre
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function scopeFilterSearch($query)
    {
        if  ($search=request('search')){
            $query -> where('name', 'like', '%' .$search. '%')
                   ->orWhere('description', 'like', '%' .$search. '%')
                        ->orWhereHas('genre', function ($genreQuery) use ($search) {
                            $genreQuery->where('name', 'like', '%' . $search . '%');
                        });
        }
        return $query;
    }

  
    public function scopeFilterGenre($query)
    {
        if ($genreId = request('genre_id')) {
            $query->where('genre_id', $genreId);
        }

        return $query;
    }
}
