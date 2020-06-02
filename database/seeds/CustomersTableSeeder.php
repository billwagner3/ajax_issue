<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([

	        [
	            'name' => '7-11 Belmont',
		        'address' => '2025 SE Belmont St.',
		        'route_id' => '1',
	        ],
	        [
		        'name' => 'Safeway Belmont',
		        'address' => '2345 SE Belmont St.',
		        'route_id' => '1',
	        ],
	        [
		        'name' => 'Del\'s Deli',
		        'address' => '1555 Wentthere Ave.',
		        'route_id' => '1',
	        ],
	        [
		        'name' => 'Winkie\'s Waffle',
		        'address' => '453 Yesterday Dr.',
		        'route_id' => '1',
	        ],
	        [
		        'name' => 'Fulsom Obituaries',
		        'address' => '533 SE Dying Ave.',
		        'route_id' => '1',
	        ],
	        [
		        'name' => 'A Stone\'s Throw Lemonade Stand',
		        'address' => '452 SE Balloon St.',
		        'route_id' => '1',
	        ],
	        [
		        'name' => 'Thai City',
		        'address' => '1554 SE Belmont St.',
		        'route_id' => '1',
	        ],
	        [
		        'name' => 'Allison\'s Place',
		        'address' => '493 Odessa St.',
		        'route_id' => '1',
	        ],
        ]);
    }
}
