<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class panelMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('panel_menuses')->insert([

            [

               'name' => 'ANASAYFA',
               'route' => 'admin.index',
               'link' => 'admin',
               'status' => '1'

           ],
           [

               'name' => 'KATALOG',
               'route' => 'aboutUs',
               'link' => 'panel/katalog',
               'status' => '1'

           ],
           [

            'name' => 'SHIFTS',
            'route' => 'shift.index',
            'link' => 'panel/shifts',
            'status' => '1'

            ],
            [

            'name' => 'İSTATİSTİKLER',
            'route' => 'report.index',
            'link' => 'panel/raporlar',
            'status' => '1'


            ],
            [

               'name' => 'ÜYELER',
               'route' => 'works',
               'link' => 'panel/uyeler',
               'status' => '1'


           ],
           [
            'name' => 'DİREKTÖR',
            'route' => 'reference',
            'link' => 'panel/direktor/',
            'status' => '1'
        ],







       ]);
    }
}
