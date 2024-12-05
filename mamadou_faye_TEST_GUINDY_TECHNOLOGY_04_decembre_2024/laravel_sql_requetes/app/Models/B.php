<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class B extends Model
{
    use HasFactory;


    protected $table = 'B';

    // Colonnes pouvant être remplies
    protected $fillable = ['code', 'montant', 'tablea_id'];

    /**
     * Relation avec la table A
     */
    public function category()
    {
        return $this->belongsTo(A::class, 'tablea_id');  
    }
}
