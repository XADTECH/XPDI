<?php

namespace Database\Seeders;

use App\Models\Subscriber;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class SubscriberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subscriber::insert([
            [
                'email' => 'subscriber1@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'subscriber2@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'subscriber3@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
