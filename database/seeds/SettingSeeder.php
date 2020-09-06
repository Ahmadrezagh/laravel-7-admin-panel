<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //Top od Site
         DB::table('settings')->insert([
            'name' => 'Site-setting',
            'value' => json_encode([
                'name_fa' => 'قالب ادمین',
                'name_en' => 'Admin Pannel',
                'email' => 'info@aladdin-industry.com',
                'logo' => '/front/img/logo.png',
                'footer_text' => 'توضیحات',
                'enamad' => '/front/img/namad/enamad.png',
                'samandehi' => '/front/img/namad/samandehi.png'
                
            ]),
            'description' => json_encode([
                'name_fa' => 'عنوان سایت (فارسی)',
                'name_en' => 'عنوان سایت (انگلیسی)',
                'email' => 'ایمیل پشتیبانی',
                'logo' => 'لوگو',
                'footer_text' => 'متن فوتر',
                'enamad' => 'اینماد',
                'samandehi' => 'ساماندهی'
            ]),
        ]);

        ///
        DB::table('settings')->insert([
            'name' => 'About_us',
            'value' => json_encode('متن برای درباره ما'),
            'description' => json_encode('محتوای درباره ما'),
        ]);


        //Fileds Contact-us
        DB::table('settings')->insert([
            'name' => 'Contact-us',
            'value' => json_encode([
                'phone_number' => '091234567892',
                'address' => 'آدرس',
                'email' => 'info@awebsite.com',
                'instagram' => 'https://www.instagram',
                'twitter' => 'https://www.twitter',
                'facebook' => 'https://www.facebook',
                'whatsapp' => 'https://www.whatsapp',
                'telegram' => 'https://www.telegram',
                'youtube' => 'https://www.youtube',
            ]),
            'description' => json_encode([
                'phone_number' => 'شماره تماس',
                'address' => 'آدرس',
                'email' => 'ایمیل',
                'instagram' => 'instagram',
                'twitter' => 'twitter',
                'facebook' => 'facebook',
                'whatsapp' => 'whatsapp',
                'telegram' => 'telegram',
                'youtube' => 'youtube',
            ]),
        ]);

        DB::table('settings')->insert([
            'name' => 'Seo',
            'value' => json_encode([
                'title' => 'website',
                'description' => 'دسکریپشن',
                'url' => 'http://localhost:8000',
                'canonical' => 'http://aparat.com',
                'type' => 'videos',
                'twitter_id' => '',
                'logo' => '/front/img/logo.png'
            ]),
            'description' => json_encode([
                'title' => 'Title Website',
                'description' => 'Explain about the website and the type of business',
                'url' => 'Url Home Page Website',
                'canonical' => 'Url Canonical Website',
                'type' => 'Site content such as products, articles, videos, photos and ...',
                'twitter_id' => 'Twitter Id',
                'logo' => 'Url Website Logo'
            ]),
        ]);
    }
}
