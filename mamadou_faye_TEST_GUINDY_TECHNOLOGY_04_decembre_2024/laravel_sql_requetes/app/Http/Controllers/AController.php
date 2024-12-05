<?php

namespace App\Http\Controllers;

use App\Models\A;
use App\Models\B;
use Illuminate\Http\Request;

class AController extends Controller
{
    /**
     * Créer une nouvelle catégorie.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'designation' => 'required|string|max:255',
        ]);

        $category = A::create($validated);

        return response()->json($category, 201);
    }

    /**
     * Récupérer toutes les catégories avec le total des produits associés.
     */
    public function index()
    {
        $categories = A::withCount('products')
            ->withSum('products', 'montant')
            ->get()
            ->filter(function ($category) {
                return $category->products_sum_montant > 0;
            });

        return response()->json($categories);
    }
}
