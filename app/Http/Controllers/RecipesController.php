<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Recipes;
use Illuminate\Http\Request;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipes::latest()->paginate(5);

            return view('recipes.index',compact('recipes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'preparation' => 'required',

        ]);

        Recipes::create($request->all());

        return redirect()->route('recipes.index')
            ->with('success','Recipe created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipes  $recipes
     * @return \Illuminate\Http\Response
     */
    public function show(Recipes $recipes)
    {
        return view('recipes.show',compact('recipes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipes  $recipes
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipes $recipes)
    {
        return view('recipes.edit',compact('recipes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recipes  $recipes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipes $recipes)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipes  $recipes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipes $recipe)
    {
        $recipe->delete();

        return redirect()->route('recipes.index')
            ->with('success','Product deleted successfully');
    }

}
