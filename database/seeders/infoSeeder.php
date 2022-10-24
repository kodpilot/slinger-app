<?php
use App\Models\infos;
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class infoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('infos')->insert([
            'theme'             =>      'default',
            'logo'              =>      'logo.svg',
			'watermark_position'=>		'center',
			'watermark_size'	=>		'50',
			'watermark_opacity'	=>		'30',
			'watermark_rotate'	=>		'45',
    		'title' 			=> 		'SlingerAPP',
    		'description'	 	=> 		'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, reiciendis alias ea quibusdam quam voluptatum iusto aut exercitationem cum odio laboriosam sapiente, veniam animi nulla nisi error pariatur modi atque.',
    		'keywords' 			=> 		'Lorem, ipsum dolor, sit amet, consectetur, adipisicing, Rem, reiciendis alias, ea quibusdam, quam voluptatum,iusto aut exercitationem , cum odio laboriosam, sapiente, veniam animi nulla, nisi error pariatur, modi atque.',
    		'favicon' 			=> 		'favicon.ico',
    		'aboutUs' 			=> 		'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, reiciendis alias ea quibusdam quam voluptatum iusto aut exercitationem cum odio laboriosam sapiente, veniam animi nulla nisi error pariatur modi atque.',
    		'tel1'				=> 		'08507776655',
    		'tel2'  			=> 		'08507776655',
            'whatsapp'          =>      '08507776655',
			'recaptcha_sitekey'	=> 		'6Lc1C74eAAAAAKeDi0GAfpW0zEUCVJ8I3H3r-rCL',
			"recaptcha_secretKey"	=> 	'6Lc1C74eAAAAAGc37R0Um_wyCNF76tyVCOXvf4HF',
    		'mail1' 			=> 		'info@slingerapp.com',
    		'mail2' 			=> 		'info@slingerapp.com',
    		'address1' 			=> 		'Lorem ipsum dolor, sit amet consectetur, adipisicing',
    		'address2' 			=> 		'Utopya / TURKEY',
    		'map' 				=> 		'<iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d3046.785252994194!2d28.92963976581778!3d40.213839625877014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d40.2145055!2d28.933792699999998!4m5!1s0x14ca11087820f7cb%3A0xf357a2e177e171e9!2zw5zDp2V2bGVyLCBDYW1wdXNQbHVzLCBOaWzDvGZlci9CdXJzYQ!3m2!1d40.2116268!2d28.9344798!5e0!3m2!1str!2str!4v1600948916848!5m2!1str!2str"  frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>',
    		'video' 			=> 		'https://www.youtube.com/watch?v=nnzhYYWcFLo',
    		'youtube' 			=> 		'https://www.youtube.com/watch?v=nnzhYYWcFLo',
    		'facebook' 			=> 		'https://www.facebook.com',
    		'instagram' 		=> 		'https://www.instagram.com',
    		'twitter' 			=> 		'https://www.twitter.com',
    		'linkedin' 			=> 		'https://www.linkedin.com',
			'snapwidget' 		=> 		'<iframe src="https://snapwidget.com/embed/894986" class="snapwidget-widget"allowtransparency="true" frameborder="0" scrolling="no" style="border:none;  width:100%; height:310px"></iframe>',
            'companyName'       =>      'Şirket Ünvanı',
            'companyOfficial'   =>      'Şirket Sahibi',
            'companyPhone'      =>      'Şirket Telefonu',
            'companyAddress'      =>    'Şirket Adresi',
            'taxAdministration' =>      'Vargi Dairesi',
            'taxNo'             =>      'Vargi Numarası',
    		'status' 			=> 		'1',
			'mobile_api_private'		=> 		'63354980603d5',
			'mobile_api_public'			=> 		'$2y$10$yBVjDTGD7KhjkHi7F.wG7uZnwtrTOHF3e1kKoJn2g7zeM0Nq1syZy',


    	]);
    }
}
