<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class A extends Model
{
    use HasFactory;

    protected $table = 'A';

    // Colonnes pouvant être remplies
    protected $fillable = ['designation'];

    /**
     * Relation avec la table B
     */
    public function products()
    {
        return $this->hasMany(B::class, 'tablea_id');  // Relation One-to-Many avec B
    }
}
