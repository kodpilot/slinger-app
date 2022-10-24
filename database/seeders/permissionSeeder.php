<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\permissions;

class permissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       
        $menu_ids = ['1','2','3','4','5','6'];
        foreach ($menu_ids as $menu_id) {
            $data[] = [
                'role_id' 		    => 		'1',
                'menu_id' 		    => 		$menu_id,
                'menuStatu' 		=> 		'1'
            ];

        }

        $subMenu_ids = ['1','2','3','4','5','6','7','8','9','10'];
        foreach ($subMenu_ids as $menu_id) {
            $data[] = [
                'role_id' 		    => 		'1',
                'menu_id' 		    => 		$menu_id,
                'menuStatu' 		=> 		'2'
            ];

        }

        permissions::insert($data);


    }
}
