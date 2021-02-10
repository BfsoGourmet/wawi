<?php

namespace Tests\Unit\products;

use Database\Factories\ProductFactory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PHPUnit\Framework\TestCase;
use App\Models\Product;
use Tests\CreatesApplication;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductsTest extends TestCase {
    use CreatesApplication;
    use WithFaker;
    use RefreshDatabase;

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
        $newProduct = Product::factory(1)->create()->first();
        $storedProduct = Product::where('id', $newProduct->id)->first();
        $this->assertEquals($newProduct->title, $storedProduct->title);
        $this->assertEquals($newProduct->price, $storedProduct->price);
    }

    public function tearDown(): void {
        //DB::rollBack();
        parent::tearDown();
    }
}
