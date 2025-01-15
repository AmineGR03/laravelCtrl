<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * Relation avec les films (many-to-many).
     */
    public function films()
    {
        return $this->belongsToMany(Film::class, 'film_genre');
    }
}
