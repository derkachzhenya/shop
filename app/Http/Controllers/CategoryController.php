<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories=Category::all();
        return view('category.index', compact('categories'));
    }

   
    public function create()
    {
        return view('category.create');
    }

    
    public function store(StoreCategoryRequest $request)
    {
        $data=$request->validated();
        Category::firstOrCreate($data);

        return redirect()->route('categories.index');

    }

  
    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }

   
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

   
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data=$request->validated();
        $category->update($data);

        return view('category.show', compact('category'));
    }

   
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
