<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function index()
    {
       
        
        return view('products.index')->with([
            'products' => Product::all(),
        ]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        

        
        /*if(request()->status == 'unavailable'){
            return redirect()
            ->back()
            ->withInput(request()->all())
            ->withErrors('If the boulder is unavailable, please specify when it will be available.');
        }*/

         //$product = Product::create(request()->all());
         $validatedData = $request->validated();

         // Crear un nuevo producto con los datos validados
         $product = Product::create($validatedData);

         foreach($request->images as $image){
             $product->images()->create([
                 'path' => 'images/' . $image->store('products','images'),
             ]);
         }
     
         return redirect()
             ->route('products.index')
             ->withSuccess("The new boulder with id {$product->id} was created successfully");
     }

    public function show(Product $product)
    {
        //$product = Product::findOrFail($product);
        
        return view ('products.show')->with([
            'product' => $product,
            //'html' => '<h2>Subtitle</h2>'
        ]);
    }

    public function edit(Product $product)
    {
        return view('products.edit')->with([
            'product' => $product,
        ]);
    }

    public function update(ProductRequest $request, Product $product)
    {
        

        //$product = Product::findOrFail($product);

        $product->update($request->validated());

        if($request->hasFile('images')){
        foreach($product->images as $image){
            $path = storge_path("app/public/{$image->path}");
            
            File::delete($path);
            $image->delete();
        }

            foreach($request->images as $image){
                $product->images()->create([
                    'path' => 'images/' . $image->store('products','images'),
                ]);
            }
        }

        return redirect()
            ->route('products.index')
            ->withSuccess("The  boulder with id {$product->id} was edited successfully");

    }

    public function destroy(Product $product)
    {
        //$product = Product::findOrFail($product);
        $product->delete();
        return redirect()
            ->route('products.index')
            ->withSuccess("The boulder with id {$product->id} was deleted successfully");
    }
}
