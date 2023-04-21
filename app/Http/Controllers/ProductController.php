<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Tag;
use App\Models\Color;
use App\Models\Category;
use App\Models\ColorProduct;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\ProductTag;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }


    public function create()
    {
        $tags=Tag::all();
        $colors=Color::all();
        $categories=Category::all();
        
        return view('product.create', compact('tags', 'colors', 'categories'));
    }


    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);

        $tagsIds = $data['tags'];
        $colorsIds = $data['colors'];
        unset($data['tags'], $data['colors']);

        $product = Product::firstOrCreate([
            'title' => $data['title']
        ], $data);

        foreach ($tagsIds as $tagsId){
           ProductTag::firstOrCreate([
            'product_id'=>$product->id,
            'tag_id'=>$tagsId,
           ]); 
        }

        foreach ($colorsIds as $colorsId){
            ColorProduct::firstOrCreate([
             'product_id'=>$product->id,
             'color_id'=>$colorsId,
            ]); 
         }

        return redirect()->route('products.index');
    }


    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }


    public function edit(Product $product)
    {
        $tags=Tag::all();
        $colors=Color::all();
        $categories=Category::all();
       
        return view('product.edit', compact('tags', 'colors', 'categories', 'product'));
    }


    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);

        $tagsIds = $data['tags'];
        $colorsIds = $data['colors'];
        unset($data['tags'], $data['colors']);

        $product ->update([
            'title' => $data['title']
        ], $data);

        foreach ($tagsIds as $tagsId){
            $tagsIds ->update([
            'product_id'=>$product->id,
            'tag_id'=>$tagsId,
           ]); 
        }

        foreach ($colorsIds as $colorsId){
            $colorsIds ->update([
             'product_id'=>$product->id,
             'color_id'=>$colorsId,
            ]); 
         }

        return redirect()->route('products.index');
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
