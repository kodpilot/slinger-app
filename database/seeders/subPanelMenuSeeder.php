<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class subPanelMenuSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('sub_panel_menuses')->insert([

			[


				'name' 		    => 		'Anasayfa',
				'route' 	    => 		'admin.index',
				'link' 	        => 		'admin',
				'menu_id' 	    => 	    '1',
				'status' 	    => 	    '1',
				'is_dropdown'	=>		'0',
				'subpanelmenus_id'=>	'1',


			],
			[


				'name' 		    => 		'Site Bilgileri',
				'route' 	    => 		'infos.index',
				'link' 	        => 		'admin/site-ayarlari',
				'menu_id' 	    => 	    '1',
				'status' 	    => 	    '1',
				'is_dropdown'	=>		'0',
				'subpanelmenus_id'=>	'1',



			],
			
			[


				'name' 		    => 		'Kategoriler',
				'route' 	    => 		'category.index',
				'link' 	        => 		'panel/katalog/kategoriler',
				'menu_id' 	    => 	    '2',
				'status' 	    => 	    '1',
				'is_dropdown'	=>		'0',
				'subpanelmenus_id'=>	'1',



			],
			[


				'name' 		    => 		'Alt Kategoriler',
				'route' 	    => 		'subcategory.index',
				'link' 	        => 		'panel/katalog/alt-kategoriler',
				'menu_id' 	    => 	    '2',
				'status' 	    => 	    '1',
				'is_dropdown'	=>		'0',
				'subpanelmenus_id'=>	'1',



			],
			
			[


				'name' 		    => 		'Şirketler',
				'route' 	    => 		'company.index',
				'link' 	        => 		'panel/katalog/sirketler',
				'menu_id' 	    => 	    '2',
				'status' 	    => 	    '1',
				'is_dropdown'	=>		'0',
				'subpanelmenus_id'=>	'0',



			],
			[


				'name' 		    => 		'Shifts',
				'route' 	    => 		'shift.index',
				'link' 	        => 		'panel/shifts',
				'menu_id' 	    => 	    '3',
				'status' 	    => 	    '1',
				'is_dropdown'	=>		'0',
				'subpanelmenus_id'=>	'0',



			],

			[


				'name' 		    => 		'İSTATİSTİKLER',
				'route' 	    => 		'analytics.index',
				'link' 	        => 		'panel/raporlar/istatistikler',
				'menu_id' 	    => 	    '4',
				'status' 	    => 	    '1',
				'is_dropdown'	=>		'0',
				'subpanelmenus_id'=>	'1',



			],


			[


				'name' 		    => 		'ÜYELER',
				'route' 	    => 		'user.index',
				'link' 	        => 		'panel/uyeler',
				'menu_id' 	    => 	    '5',
				'status' 	    => 	    '1',
				'is_dropdown'	=>		'0',
				'subpanelmenus_id'=>	'1',



			],
			[
				'name' 		    => 		'Roller',
				'route' 	    => 		'director.index',
				'link' 	        => 		'panel/direktor/roller',
				'menu_id' 	    => 	    '6',
				'status' 	    => 	    '1',
				'is_dropdown'	=>		'0',
				'subpanelmenus_id'=>	'1',
			],
			[
				'name' 		    => 		'Yetkilendirme',
				'route' 	    => 		'access.index',
				'link' 	        => 		'panel/direktor/yetkilendirme',
				'menu_id' 	    => 	    '6',
				'status' 	    => 	    '1',
				'is_dropdown'	=>		'0',
				'subpanelmenus_id'=>	'1',
			],



		]);
	}
}