<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Electrician',
            'Plumbing',
            'AC Repair',
            'Carpenter',
            'Cleaning',
            'Painter',
            'Solar Panels',
            'CCTV Cam',
            'Auto Care',
            'IT Support'
        ];

        $now = Carbon::now();

        foreach ($categories as $service) {
            DB::table('services')->insert([
                'title' => $service,
                'slug' => Str::slug($service), // Generates 'ac-repair', 'cctv-cam', etc.
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
