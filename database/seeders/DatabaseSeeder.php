<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Courier;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run() {
    $user = new User();
    $user->name = 'admin';
    $user->email = 'admin@info.com';
    $user->role = 'admin';
    $user->password = '$2y$10$xUyrgdVT53kkByNzF/kk/OragthypYqVv1n8I3SzH.9fdNMkNYdba';
    $user->save();
  }
}
