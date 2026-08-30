<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'ozghantiling@gmail.com'],
            [
                'name' => 'Ozghan',
                'password' => Hash::make('Ozghan@123456'),
                'email_verified_at' => now(),
            ]
        );
        $this->call(SiteContentSeeder::class);
        $this->call(ServiceContentSeeder::class);
        $this->call(WorkImagesSeeder::class);
        $this->call(FaqSeeder::class);
        $this->call(ContentSettingSeeder::class);
    }
}
