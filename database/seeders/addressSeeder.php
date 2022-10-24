<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class addressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('addresses')->insert([        
            [
                'name' => 'Enes',
                'surname' => 'DOĞRU',
                'address' => 'Neşet Ertaş Cad. Okyay Sit. B Blok D:1',
                'city' => 'Bursa',
                'town' => 'Nilüfer',
                'country' => 'Turkey',
                'zipCode' => "16000",
                'mail' => 'enes@sanalnet.com',
                'tel' => '05076220384',
                'billing'=>"1",
                'addressName'=>"Adres2",
                'user_id' => 1,
            ],
            [
                'name' => 'Enes',
                'surname' => 'DOĞRU',
                'address' => 'Neşet Ertaş Cad. Okyay Sit. B Blok D:1',
                'city' => 'Bursa',
                'town' => 'Nilüfer',
                'country' => 'Turkey',
                'zipCode' => "16000",
                'mail' => 'enes@sanalnet.com',
                'tel' => '05076220384',
                'billing'=>"1",
                'addressName'=>"Adres1",
                'user_id' => 1,
            ],
        ]);
    }
}
