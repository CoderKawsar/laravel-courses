<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Author;
use App\Models\Course;
use App\Models\Platform;
use App\Models\Review;
use App\Models\Series;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if(env('APP_ENV') === 'local'){
            // \App\Models\User::factory(10)->create();

            // \App\Models\User::factory()->create([
            //     'name' => 'Test User',
            //     'email' => 'test@example.com',
            // ]);
            User::create([
               'name' => 'Admin',
                'email' => 'k.kawsar0095@gmail.com',
                'password' => bcrypt('password'),
                'type' => 1
            ]);
            $series = [
                [
                    'name' => 'PHP',
                    'image' => 'https://cdn.cdnlogo.com/logos/p/79/php.svg'
                ],
                [
                    'name' => 'JavaScript',
                    'image' => 'https://cdn.cdnlogo.com/logos/j/44/javascript.svg'
                ],
                [
                    'name' => 'Laravel',
                    'image' => 'https://cdn.cdnlogo.com/logos/l/56/laravel-wordmark.svg'
                ],
                [
                    'name' => 'Python',
                    'image' => 'https://cdn.cdnlogo.com/logos/p/3/python.svg'
                ]
            ];
            foreach ($series as $item){
                Series::create([
                    'name'=> $item['name'],
                    'image' => $item['image']
                ]);
            }

            $topics = ['Eloquent', 'Validation', 'Authentication', 'Testing', 'Refactoring'];
            foreach ($topics as $topic){
                Topic::create([
                    'name'=> $topic,
                    'slug' => strtolower(str_replace(' ', '-', $topic))
                ]);
            }

            $platfroms = ['LaraCast', 'Youtube', 'Udemy', 'FreeCodeCamp', 'Udacity'];
            foreach ($platfroms as $platfrom){
                Platform::create([
                    'name'=> $platfrom
                ]);
            }

            // create 50 users
            User::factory(50)->create();

            // create 10 authors
            Author::factory(10)->create();

            // create 100 courses
            Course::factory(100)->create();

            $courses = Course::all();
            foreach ($courses as $course){
                $topics = Topic::all()->random(rand(1,5))->pluck('id')->toArray();
                $course->topics()->attach($topics);

                $authors = Author::all()->random(rand(1, 4))->pluck('id')->toArray();
                $course->authors()->attach($authors);

                $series = Series::all()->random(rand(1, 3))->pluck('id')->toArray();
                $course->series()->attach($series);
            }
            Review::factory(120)->create();
        }
    }
}
