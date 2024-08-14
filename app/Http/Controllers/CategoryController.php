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
    public function edit(Category $category)
    {
        Gate::authorize('update', $category);
        return view('categories.edit', compact('category'));
    }
    public function update(Request $request, Category $category)
    {
        Gate::authorize('update', $category);
        $data = $request->validate([
            'name' => 'required|string|max:255'
        ]);
        try {
            $category->update([
                'name' => $data['name']
            ]);
            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Error al actualizar la categoría']);
        }
    }
    public function destroy(Category $category)
    {
        Gate::authorize('delete', $category);
        try {
            $category->delete();
            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al eliminar la categoría']);
        }
    }
}
