<?php

namespace Database\Seeders;

use App\Models\GeneralSetting;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        GeneralSetting::updateOrCreate([
            'id' => 1,
        ], [
            'site_name' => 'CodeExpress',
            'tagline' => 'Digital solutions with speed and precision.',
            'email' => 'info@codeexpress.net',
            'phone' => '+8801344720466',
            'address' => 'Dhaka, Bangladesh',
            'facebook' => null,
            'linkedin' => null,
            'instagram' => null,
            'youtube' => null,
        ]);

        User::updateOrCreate([
            'email' => 'admin@codeexpress.test',
        ], [
            'name' => 'CodeExpress Admin',
            'email_verified_at' => Carbon::now(),
            'password' => 'password',
        ]);
    }
}
