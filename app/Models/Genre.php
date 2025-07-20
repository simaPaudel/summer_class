<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{

     // Allow mass assignment for these fields
    protected $fillable = [
        'name',
        'description',
    ];

    public function movies()
    {
        return $this->hasMany(Movie::class);
    }

    public function scopeFilterSearch($query)
    {
        if ($search = request('search')) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        }
        return $query;
    }

}