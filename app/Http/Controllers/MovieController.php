<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use App\Models\Studio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::paginate(10);
        return view('movies.index', compact('movies'));
    }
    public function create()
    {
        $categories = Category::all();
        $studios = Studio::all();
        return view('movies.create', ['categories' => $categories, 'studios' => $studios]);
    }
    public function edit(Movie $movie)
    {
        return view('movies.edit', compact('movie'));
    }
    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }
    public function store(Request $request)
    {
        //validar
        try {
            $data = $this->validate($request);
            //Crear Modelo
            DB::beginTransaction();
            $movie = new Movie();
            $movie->title = $data['title'];
            $movie->description = $data['description'];
            $movie->release_date = $data['release_date'];
            $movie->studio_id = $data['studio_id'];
            if (!$movie->save()) {
                return redirect()->back();
            }
            //Insertar categorias
            $movie->categories()->attach($data['categories']);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back();
        }
        return redirect()->route('movies.index');
    }
    public function update(Request $request, Movie $movie)
    {
        //validar
        try {
            $data = $this->validate($request);
            //Actualizar Modelo
            DB::beginTransaction();
            $movie->title = $data['title'];
            $movie->description = $data['description'];
            $movie->release_date = $data['release_date'];
            $movie->studio_id = $data['studio_id'];
            if (!$movie->save()) {
                return redirect()->back();
            }
            //Actualizar categorias
            $movie->categories()->sync($data['categories']);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back();
        }
        return redirect()->route('movies.index');
    }
    public function destroy(Movie $movie)
    {
        try {
            DB::beginTransaction();
            $movie->categories()->detach();
            $movie->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back();
        }
        return redirect()->route('movies.index');
    }
    public function viewByCategory($category)
    {
        $movies = $category->movies()->paginate(10);
        $listBy = 'category';
        return view('movies.index', compact('movies', 'listBy'));
    }
    public function viewByStudio($studio)
    {
        $movies = $studio->movies()->paginate(10);
        $listBy = 'studio';
        return view('movies.index', compact('movies', 'listBy'));
    }
    private function validate(Request $request)
    {
        return $request->validate([
            'title' => 'required',
            'description' => ['required', 'max:255'],
            'release_date' => ['required', 'date'],
            'studio_id' => ['required', 'exists:studios,id'],
            'categories' => ['required', 'array'],
            'categories.*' => ['exists:categories,id']
        ]);
    }
}
