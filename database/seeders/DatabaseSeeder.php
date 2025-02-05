<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear 10 usuarios y asociar una imagen a cada uno
        $users = User::factory(10)
            ->create()
            ->each(function ($user) {
                $image = Image::factory()
                    ->user() // Usar el estado definido en el factory
                    ->make();
                
                $user->image()->save($image); // Guardar la imagen asociada al usuario
            });

        // Crear 50 productos
        $products = Product::factory(50)->create();

        // Asociar entre 2 y 3 imágenes a cada producto
        $products->each(function ($product) {
            $images = Image::factory(mt_rand(2, 3))->make(); // Crear las imágenes en memoria
            $product->images()->saveMany($images); // Guardar todas las imágenes asociadas al producto
        });
    }
}
