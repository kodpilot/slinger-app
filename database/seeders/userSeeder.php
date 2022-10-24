<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([

            [

                'name' => 'Enes',
                'surname' => 'DOĞRU',
        		'email' => 'info@kodpilot.com',
        		'password' => Hash::make('Ensdo37.'),
        		'file' => 'profile.png',
        		'tel' => '05076220384',
        		'status' => '1',
                'admin' => '1'


            ],

        	[

                'name' => 'Slinger',
                'surname' => 'App',
        		'email' => 'info@slingerapp.com',
        		'password' => Hash::make('Slinger3637'),
        		'file' => 'profile.png',
        		'tel' => '05076220384',
        		'status' => '1',
                'admin' => '1'
            ],





        ]);
    }
}
