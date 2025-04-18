<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\InfoBox;

class InfoBoxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InfoBox::insert([
            [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v8m-4-4h8" /></svg>',
                'title' => 'Fast Delivery',
                'description' => 'We provide the fastest delivery to your doorstep.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20l9-5-9-5-9 5 9 5z" /></svg>',
                'title' => 'Secure Payment',
                'description' => 'Your payments are 100% secure with us.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21v-6M7 10h4m1-2a2 2 0 112-2 2 2 0 11-2 2m6 6v1a4 4 0 00-4 4H9a4 4 0 00-4-4v-1a2 2 0 012-2h6a2 2 0 012 2z" /></svg>',
                'title' => '24/7 Support',
                'description' => 'We are here to support you 24/7.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
