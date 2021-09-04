<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

use function GuzzleHttp\Promise\each;

class RoleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $data = [
      ['name' => 'Admin', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
      ['name' => 'Seller', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
      ['name' => 'User', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
    ];
    Role::insert($data);
  }
}
