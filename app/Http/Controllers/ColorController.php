<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Http\Requests\StoreColorRequest;
use App\Http\Requests\UpdateColorRequest;

class ColorController extends Controller
{
   
    public function index()
    {
        $colors=Color::all();
        return view('color.index', compact('colors'));
    }

 
    public function create()
    {
        return view('color.create');
    }

   
    public function store(StoreColorRequest $request)
    {
        $data=$request->validated();
        Color::firstOrCreate($data);

        return redirect()->route('colors.index');


    }

   
    public function show(Color $color)
    {
        return view('color.show', compact('color'));
    }

   
    public function edit(Color $color)
    {
        return view('color.edit', compact('color'));
    }

   
    public function update(UpdateColorRequest $request, Color $color)
    {
        $data=$request->validated();
        $color->update($data);

        return view('color.show', compact('color'));
    }

   
    public function destroy(Color $color)
    {
        $color->delete();
        return redirect()->route('colors.index');
    }
}
