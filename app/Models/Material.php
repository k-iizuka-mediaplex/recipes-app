<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = ['name', 'genre_id'];
    public function recipes()
    {
        return $this->belongsToMany(Recipe::class);
    }
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
