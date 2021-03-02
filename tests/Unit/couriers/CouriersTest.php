<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\TestCase;
use App\Models\Product;
use Tests\CreatesApplication;

class CouriersTest extends TestCase {
    use CreatesApplication;
    use WithFaker;

    protected $app;

    protected function setUp(): void {
        parent::setUp();
        $this->app = $this->createApplication();
        $this->setUpFaker();
        $this->app->make('Illuminate\Database\Eloquent\Factory')->load(__DIR__ . '/../../database/factories');
        DB::beginTransaction();
    }

    /**
     * @test
     */
    public function save_courier_to_db() {
        $newCourier = new Courier();
        $newCourier->firstname = $this->faker->word;
        $newCourier->lastname = $this->faker->word;
        $newCourier->phone = $this->faker->unique()->randomDigit();
        $newCourier->save();

        $storedCourier = Courier::where('id', $newCourier->id)->first();
        $this->assertEquals($newCourier->firstname, $storedCourier->firstname);
        $this->assertEquals($newCourier->lastname, $storedCourier->lastname);
        $this->assertEquals($newCourier->phone, $storedCourier->phone);
    }

    public function tearDown(): void {
        DB::rollBack();
        parent::tearDown();
    }
}
