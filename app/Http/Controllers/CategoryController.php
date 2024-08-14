<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    public function create()
    {
        Gate::authorize('create', Category::class);
        return view('categories.create');
    }
    public function store(Request $request)
    {
        Gate::authorize('create', Category::class);
        $data = $request->validate([
            'name' => 'required|string|max:255'
        ]);
        try {
            Category::create([
                'name' => $data['name']
            ]);
            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Error al crear la categoría']);
        }
    }
}
