<?php

namespace Tests\Unit;

use App\Wawi\CollectionHelper;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\TestCase;
use App\Models\Product;
use Tests\CreatesApplication;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CollectionHelperTest extends TestCase
{
    use CreatesApplication;
    use WithFaker;
    use RefreshDatabase;

    protected $app;

    protected function setUp(): void
    {
        parent::setUp();
        $this->app = $this->createApplication();
        $this->setUpFaker();
    }

    /**
     * @test
     */
    public function get_all_products_with_a_price_larger_than_x()
    {
        $newProducts = Product::factory(4)
            ->state(new Sequence(
                ['price' => 85],
                ['price' => 88],
                ['price' => 20],
                ['price' => 89],
            ))
            ->create();
        $this->assertCount(
            3,
            CollectionHelper::productsWithPriceLargerThan($newProducts,80)
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
            $newProducts = Product::factory(count($sequence))
                ->state($sequence['sequence'])
                ->create();
            // Use that product to assert the total
            $this->assertEquals(
                $sequence['total'],
                CollectionHelper::findTotalProductsPriceInCard($newProducts)
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
        $newProducts = Product::factory(3)
            ->state(new Sequence(
                ['title' => $titles[0]],
                ['title' => $titles[1]],
                ['title' => $titles[2]],
            ))
            ->create();

        // Assert if the $titles are the same as
        $this->assertEquals(
            $titles,
            CollectionHelper::findAllProductTitles($newProducts)->all()
        );
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }
}
