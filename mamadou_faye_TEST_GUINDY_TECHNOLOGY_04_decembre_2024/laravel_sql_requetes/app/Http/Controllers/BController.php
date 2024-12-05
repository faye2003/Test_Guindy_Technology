<?php

namespace App\Http\Controllers;

use App\Models\B;
use Illuminate\Http\Request;

class BController extends Controller
{
    /**
     * Créer un produit dans la table B.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:255',
            'montant' => 'required|numeric',
            'tablea_id' => 'required|exists:A,id',
        ]);

        $product = B::create($validated);

        return response()->json($product, 201);
    }

    /**
     * Récupérer tous les produits et les lier avec la catégorie correspondante.
     */
    public function index()
    {
        $products = B::with('category')->get();

        return response()->json($products);
    }

    public function findClosestCombination(Request $request)
    {
        $target = $request->input('target');
 
        $amounts = B::all()->pluck('montant')->toArray();

        $combinations = $this->getCombinations($amounts);

        $closestCombination = null;
        $closestSum = null;
        $closestDiff = PHP_INT_MAX;

        foreach ($combinations as $combination) {
            $sum = array_sum($combination);
            $diff = abs($target - $sum);

            if ($diff < $closestDiff) {
                $closestCombination = $combination;
                $closestSum = $sum;
                $closestDiff = $diff;
            }
        }

        return response()->json([
            'closest_combination' => $closestCombination,
            'sum' => $closestSum
        ]);
    }

    private function getCombinations($array)
    {
        $combinations = [];
        $this->generateCombinations($array, 0, [], $combinations);
        return $combinations;
    }

    private function generateCombinations($array, $index, $current, &$combinations)
    {
        if ($index == count($array)) {
            if (!empty($current)) {
                $combinations[] = $current;
            }
            return;
        }

        $this->generateCombinations($array, $index + 1, array_merge($current, [$array[$index]]), $combinations);

        $this->generateCombinations($array, $index + 1, $current, $combinations);
    }
}
