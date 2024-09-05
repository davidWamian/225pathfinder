<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class Company extends Model
{
    use HasFactory;
      // Définir les attributs qui peuvent être assignés en masse
      protected $fillable = [
        'name',
        'description',
        'location',
        'latitude',
        'longitude',
        'contacts',
        'photos',
        'manager_id'
    ];

    // Définir la relation avec le modèle User (manager)
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }
}

class Article extends Model
{
    use Searchable;

    // Définir les données à indexer pour la recherche
    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
        ];
    }
}

