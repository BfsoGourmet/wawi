<?php

namespace Tests\Unit;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductsTest extends TestCase {
    use RefreshDatabase;

    /**
     * @test
     */
    public function save_product_to_db() {
        $newProduct = Product::factory(1)->create()->first();
        $storedProduct = Product::where('id', $newProduct->id)->first();
        $this->assertEquals($newProduct->title, $storedProduct->title);
        $this->assertEquals($newProduct->price, $storedProduct->price);
    }
}
