<?php

namespace Database\Seeders;
use App\Models\category_options;

use Illuminate\Database\Seeder;


class CategoryOptionsSeeder extends Seeder
{
    /**w
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $i = 1;


        for ($i=1; $i < 31; $i++) { 
            category_options::create([
                'product_id'=>$i,
                'category_id'=>1,
                'subcategory_id'=>1,
            ]);
        }
        
    }
}
