<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // Attributs qui peuvent être massivement assignés
    protected $fillable = ['user_id', 'film_id', 'note', 'commentaire'];

    /* Relations entre les modèles Review et Film */
    public function film()
    {
        return $this->belongsTo(Film::class);
    }

    /* Relations entre les modèles Review et User */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

