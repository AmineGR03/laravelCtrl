<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    // Attributs de la table "films"
    protected $fillable = [
        'titre',
        'description',
        'dateSortie',
        'directeur',
        'duree',
        'affiche',
    ];

    /**
     * Relation avec les genres (many-to-many).
     */
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'film_genre');
    }

    /*** Relation avec les avis.*/
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    // Suppression des avis lors de la suppression du film
    protected static function boot()
{
    parent::boot();

    static::deleting(function ($film) {
        $film->reviews()->delete();
    });
}}
