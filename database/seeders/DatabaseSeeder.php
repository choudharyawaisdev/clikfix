<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $services = [
            'Electrician',
            'Plumbing',
            'AC Repair',
            'Carpenter',
            'Cleaning',
            'Painter',
            'Solar Panels',
            'CCTV Cam',
            'Auto Care',
            'IT Support',
        ];

        $users = [];

        $names = [
            'Ali Raza','Ahmed Khan','Usman Tariq','Hassan Ali','Bilal Ahmed',
            'Zain Abbas','Farhan Malik','Imran Shah','Saad Hussain','Hamza Javed',
            'Danish Iqbal','Kashif Mehmood','Rizwan Ali','Shahid Latif','Adeel Akram',
            'Noman Ashraf','Tariq Bashir','Waqas Ahmad','Mudassir Ali','Sohail Anwar',
            'Yasir Mehmood','Irfan Khan','Arslan Shafiq','Kamran Aslam','Adnan Rauf',
            'Faizan Qureshi','Rehan Siddique','Jawad Ilyas','Owais Khalid','Salman Raza'
        ];

        foreach ($names as $index => $name) {

            $service = $services[$index % count($services)];

            $users[] = [
                'name' => $name,
                'email' => strtolower(str_replace(' ', '', $name)) . '@gmail.com',
                'phone_number' => '03' . rand(100000000, 999999999),
                'role' => 'worker',
                'services' => $service, // make sure this column exists in users table
                'password' => Hash::make('secret@123'),
            ];
        }

        foreach ($users as $user) {
            User::create($user);
        }
    }
}