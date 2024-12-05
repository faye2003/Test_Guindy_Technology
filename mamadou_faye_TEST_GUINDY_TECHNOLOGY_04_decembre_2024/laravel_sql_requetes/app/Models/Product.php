<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Les attributs qui sont assignables en masse.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id', // Si vous avez une relation avec une catégorie ou sous-catégorie
    ];

    /**
     * Relations: Un produit peut être lié à une catégorie, sous-catégorie, ou sous-sous-catégorie.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id'); // Si vous avez un modèle Category
    }
}
