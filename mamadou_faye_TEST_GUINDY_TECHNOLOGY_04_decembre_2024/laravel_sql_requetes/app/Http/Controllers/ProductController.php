<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function save(Request $request)
    {
        // dd($request->all);
        try {
            return DB::transaction(function () use ($request) {

                $errors = null;
                $validatedData = $request->validate([
                    'name' => 'required|string|max:255',
                    'description' => 'nullable|string',
                    'price' => 'required|numeric|min:0',
                    'category_id' => 'nullable|exists:categories,id',
                ]);

                if ($validatedData['category_id']) {
                    $category = Category::find($validatedData['category_id']);

                    if (!$category) {
                        return response()->json([
                            'error' => 'La catégorie spécifiée n\'existe pas.'
                        ], 400);
                    }

                }

                $product = Product::create([
                    'name' => $validatedData['name'],
                    'description' => $validatedData['description'] ?? null,
                    'price' => $validatedData['price'],
                    'category_id' => $validatedData['category_id'] ?? null,
                ]);

                return response()->json([
                    'message' => 'Produit créé avec succès.',
                    'product' => $product,
                ], 201);
            });
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function delete ($id)
    {
        try {
            return DB::transaction(function () use ($id)
            {
                Product::destroy($id);
                return redirect('/#!/product')->with('status', 'Produit supprimé');
            });
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

}
