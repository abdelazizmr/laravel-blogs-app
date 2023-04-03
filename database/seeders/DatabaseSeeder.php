<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use Illuminate\Database\Seeder;




class DatabaseSeeder extends Seeder
{
   
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // for generate dummy users
        \App\Models\User::factory(10)->create();

        // to generate some posts 
        $data = [
            [
                'id' => 1,
                'title' => 'The Benefits of Meditation',
                'body' => 'Meditation has been shown to reduce stress and improve overall wellbeing.',
                'date_published' => '2022-01-01',
                'user_id' => 3,
            ],
            [
                'id' => 2,
                'title' => 'The Art of Cooking',
                'body' => 'Cooking is a creative and fulfilling activity that allows you to nourish your body and soul.',
                'date_published' => '2022-01-02',
                'user_id' => 5,
            ],
            [
                'id' => 3,
                'title' => 'The Joy of Travel',
                'body' => 'Traveling allows you to explore new cultures, meet new people, and gain new perspectives.',
                'date_published' => '2022-01-03',
                'user_id' => 2,
            ],
            [
                'id' => 4,
                'title' => 'The Power of Positive Thinking',
                'body' => 'Positive thinking can help you overcome challenges and achieve your goals.',
                'date_published' => '2022-01-04',
                'user_id' => 8,
            ],
            [
                'id' => 5,
                'title' => 'The Importance of Exercise',
                'body' => 'Exercise is essential for maintaining physical and mental health.',
                'date_published' => '2022-01-05',
                'user_id' => 1,
            ],
            [
                'id' => 6,
                'title' => 'The Beauty of Nature',
                'body' => 'Nature has the power to inspire, heal, and rejuvenate us.',
                'date_published' => '2022-01-06',
                'user_id' => 9,
            ],
            [
                'id' => 7,
                'title' => 'The Thrill of Adventure',
                'body' => 'Adventure allows us to break free from our comfort zones and explore new horizons.',
                'date_published' => '2022-01-07',
                'user_id' => 7,
            ],
            [
                'id' => 8,
                'title' => 'The Wonders of Science',
                'body' => 'Science helps us understand the world around us and make informed decisions.',
                'date_published' => '2022-01-08',
                'user_id' => 4,
            ],
            [
                'id' => 9,
                'title' => 'The Joys of Parenthood',
                'body' => 'Parenthood is a rewarding and challenging journey that teaches us unconditional love and selflessness.',
                'date_published' => '2022-01-09',
                'user_id' => 6,
            ],
            [
                'id' => 10,
                'title' => 'The Importance of Education',
                'body' => 'Education is the key to personal and professional growth and success.',
                'date_published' => '2022-01-10',
                'user_id' => 10,
            ],
        ];

        //


        foreach($data as $d){
            Post::create($d);
        }
    }
}
