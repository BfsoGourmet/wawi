<?php

namespace Tests\Unit;

use App\Wawi\ProductsCollection;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductsCollectionTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * @test
     */
    public function get_all_products_with_a_price_larger_than_x()
    {
        $products = new ProductsCollection(Product::factory(4)
            ->state(new Sequence(
                ['price' => 85],
                ['price' => 88],
                ['price' => 20],
                ['price' => 89],
            ))
            ->create()
        );
        $this->assertCount(
            3,
            $products->priceLagerThan(80)
        );
    }

    /**
     * @test
     */
    public function get_total_product_price_in_card()
    {
        $sequences = collect([
            [
                'sequence' => new Sequence(
                    ['price' => 20.0],
                    ['price' => 21.0],
                ),
                'total' => 41.0
            ],
            [
                'sequence' => new Sequence(
                    ['price' => 0.0],
                ),
                'total' => 0.0
            ],
        ]);
        $sequences->each(function ($sequence){
            // Use the product factory to create one or multiple products
            $products = new ProductsCollection(Product::factory(count($sequence))
                ->state($sequence['sequence'])
                ->create());
            // Use that product to assert the total
            $this->assertEquals(
                $sequence['total'],
                $products->totalPrice()
            );
        });
    }

    /**
     * @test
     */
    public function find_all_product_titles()
    {
        $titles = [
            $this->faker->word,
            $this->faker->word,
            $this->faker->word,
        ];
        // Use the titles above in a new sequence to create 3 products
        $products = new ProductsCollection(Product::factory(3)
            ->state(new Sequence(
                ['title' => $titles[0]],
                ['title' => $titles[1]],
                ['title' => $titles[2]],
            ))
            ->create());

        // Assert if the $titles are the same as
        $this->assertEquals(
            $titles,
            $products->findAllTitles()->all()
        );
    }
}
