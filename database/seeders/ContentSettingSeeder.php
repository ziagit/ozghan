<?php

namespace Database\Seeders;

use App\Models\ContentSetting;
use Illuminate\Database\Seeder;

class ContentSettingSeeder extends Seeder
{
    public function run(): void
    {
        // Defaults point at the images currently bundled in public/.
        // firstOrCreate keeps any image an admin has already uploaded.
        $defaults = [
            'home_hero_image' => 'images/ozghan.webp',
            'about_image' => 'images/about-us.avif',
            'site_logo' => 'logo.png',
        ];

        foreach ($defaults as $key => $value) {
            ContentSetting::firstOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
