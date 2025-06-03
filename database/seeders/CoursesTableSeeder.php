<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class CoursesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $categoryIds = [3, 4, 5, 6, 7, 8, 9, 10, 11];
        $subcategoryIds = collect(range(1, 65))->filter(fn($id) => $id !== 2)->toArray();
        $instructorIds = [2, 11]; // <-- replace with your actual instructor IDs

        $labels = ['advance', 'medium', 'beginner'];
        $youtubeVideos = [
            'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'https://www.youtube.com/embed/2vjPBrBU-TM',
            'https://www.youtube.com/embed/9bZkp7q19f0',
            'https://www.youtube.com/embed/L_jWHffIx5E',
            'https://www.youtube.com/embed/IcrbM1l_BoI'
        ];

        for ($i = 0; $i < 30000; $i++) {
            $title = $faker->sentence(4);
            $slug = Str::slug($title);

            Course::create([
                'category_id'      => $faker->randomElement($categoryIds),
                'subcategory_id'   => $faker->randomElement($subcategoryIds),
                'instructor_id'    => $faker->randomElement($instructorIds),
                'course_image'     => 'upload/course/650cc588-5b39-4a29-b000-279cb94e6916.png',
                'course_title'     => $title,
                'course_name'      => $title,
                'course_name_slug' => $slug,
                'description'      => $faker->paragraph(5),
                'video'            => $faker->randomElement($youtubeVideos),
                'label'            => $faker->randomElement($labels),
                'duration'         => $faker->numberBetween(1, 20) . ' hours',
                'resources'        => (string) $faker->numberBetween(1, 10),
                'certificate'      => $faker->boolean() ? 'yes' : 'no',
                'selling_price'    => $faker->numberBetween(1000, 5000),
                'discount_price'   => $faker->numberBetween(500, 3000),
                'prerequisites'    => $faker->sentence(6),
                'bestseller'       => $faker->boolean() ? 'yes' : 'no',
                'featured'         => $faker->boolean() ? 'yes' : 'no',
                'highestrated'     => $faker->boolean() ? 'yes' : 'no',
                'status'           => 1,
                'created_at'       => now(),
                'updated_at'       => now(),
            ]);
        }
    }
}
