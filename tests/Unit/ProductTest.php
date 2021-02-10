<?php

namespace Tests\Unit\products;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PHPUnit\Framework\TestCase;
use App\Models\Product;
use Tests\CreatesApplication;

class ProductsTest extends TestCase {
    use CreatesApplication;
    use WithFaker;

    protected $app;

    protected function setUp(): void {
        parent::setUp();
        $this->app = $this->createApplication();
        $this->setUpFaker();
        //DB::beginTransaction();
    }

    /**
     * @test
     */
    public function save_product_to_db() {
        $newProduct = new Product();
        $newProduct->title = $this->faker->word;
        $newProduct->sku = Str::slug($this->faker->word);
        $newProduct->price = $this->faker->randomFloat(2, 10, 100);
        $newProduct->save();

        $storedProduct = Product::where('id', $newProduct->id)->first();
        $this->assertEquals($newProduct->title, $storedProduct->title);
        $this->assertEquals($newProduct->price, $storedProduct->price);
    }

    public function tearDown(): void {
        //DB::rollBack();
        parent::tearDown();
    }
}
