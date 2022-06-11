<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Bagas Raditya Nafi',
            'username' => 'bagas12r',
            'email' => 'bagasrnfull@gmail.com',
            'password' => bcrypt('spenesa234')
        ]);

        // User::create([
        //     'name' => 'Jayeng Budi',
        //     'email' => 'jaybudrn@gmail.com',
        //     'password' => bcrypt('spenesa234')
        // ]);
        User::factory(3)->create();

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);
        
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::factory(20)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis ab natus nam a repudiandae porro quas culpa sapiente praesentium saepe itaque vero dolores aperiam',
        //     'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis ab natus nam a repudiandae porro quas culpa sapiente praesentium saepe itaque vero dolores aperiam, ullam animi laborum repellendus autem magnam. Optio cum quisquam unde cupiditate nemo nihil minus quod ducimus placeat fuga. Sunt laboriosam molestias reiciendis dolor natus nesciunt, maxime cum odit deserunt asperiores temporibus neque, officia dicta autem suscipit, minus ad. Architecto ratione, culpa quos exercitationem eos consectetur doloribus suscipit quidem cumque illum labore atque blanditiis mollitia voluptatem nam esse voluptatibus rem libero vitae laboriosam? Vel eaque provident deleniti, illo officia pariatur. Alias incidunt odit odio non laboriosam? Fugiat.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke Dua',
        //     'slug' => 'judul-ke-dua',
        //     'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis ab natus nam a repudiandae porro quas culpa sapiente praesentium saepe itaque vero dolores aperiam',
        //     'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis ab natus nam a repudiandae porro quas culpa sapiente praesentium saepe itaque vero dolores aperiam, ullam animi laborum repellendus autem magnam. Optio cum quisquam unde cupiditate nemo nihil minus quod ducimus placeat fuga. Sunt laboriosam molestias reiciendis dolor natus nesciunt, maxime cum odit deserunt asperiores temporibus neque, officia dicta autem suscipit, minus ad. Architecto ratione, culpa quos exercitationem eos consectetur doloribus suscipit quidem cumque illum labore atque blanditiis mollitia voluptatem nam esse voluptatibus rem libero vitae laboriosam? Vel eaque provident deleniti, illo officia pariatur. Alias incidunt odit odio non laboriosam? Fugiat.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke Tiga',
        //     'slug' => 'judul-ke-tiga',
        //     'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis ab natus nam a repudiandae porro quas culpa sapiente praesentium saepe itaque vero dolores aperiam',
        //     'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis ab natus nam a repudiandae porro quas culpa sapiente praesentium saepe itaque vero dolores aperiam, ullam animi laborum repellendus autem magnam. Optio cum quisquam unde cupiditate nemo nihil minus quod ducimus placeat fuga. Sunt laboriosam molestias reiciendis dolor natus nesciunt, maxime cum odit deserunt asperiores temporibus neque, officia dicta autem suscipit, minus ad. Architecto ratione, culpa quos exercitationem eos consectetur doloribus suscipit quidem cumque illum labore atque blanditiis mollitia voluptatem nam esse voluptatibus rem libero vitae laboriosam? Vel eaque provident deleniti, illo officia pariatur. Alias incidunt odit odio non laboriosam? Fugiat.',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke Empat',
        //     'slug' => 'judul-ke-empat',
        //     'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis ab natus nam a repudiandae porro quas culpa sapiente praesentium saepe itaque vero dolores aperiam',
        //     'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis ab natus nam a repudiandae porro quas culpa sapiente praesentium saepe itaque vero dolores aperiam, ullam animi laborum repellendus autem magnam. Optio cum quisquam unde cupiditate nemo nihil minus quod ducimus placeat fuga. Sunt laboriosam molestias reiciendis dolor natus nesciunt, maxime cum odit deserunt asperiores temporibus neque, officia dicta autem suscipit, minus ad. Architecto ratione, culpa quos exercitationem eos consectetur doloribus suscipit quidem cumque illum labore atque blanditiis mollitia voluptatem nam esse voluptatibus rem libero vitae laboriosam? Vel eaque provident deleniti, illo officia pariatur. Alias incidunt odit odio non laboriosam? Fugiat.',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
    }
}
