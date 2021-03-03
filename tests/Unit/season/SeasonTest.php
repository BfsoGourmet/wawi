<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\TestCase;
use App\Models\Season;
use Tests\CreatesApplication;

class SeasonTest extends TestCase {
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
  public function save_season_to_db() {
    $newSeason = new Season();
    $newSeason->season = $this->faker->word;
    $newSeason->date_from = $this->faker->randomDigit();
    $newSeason->date_to = $this->faker->randomDigit();
    $newSeason->save();

    $storedSeason = Season::where('id', $newSeason->id)->first();
    $this->assertEquals($newSeason->season, $storedSeason->season);
    $this->assertEquals($newSeason->date_from, $storedSeason->date_from);
    $this->assertEquals($newSeason->date_to, $storedSeason->date_to);
  }

  public function tearDown(): void {
    DB::rollBack();
    parent::tearDown();
  }
}
