<?php

namespace App\Models;


class Post
{
    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Bagas Raditya Nafi",
            "body" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius molestiae veniam eaque non magnam, dolorem, tempore architecto, odit quas quasi enim tenetur molestias dicta ipsa praesentium fugit nulla sed voluptate!"
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Nadiem Makarim",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat ullam, doloribus sunt magnam ab nesciunt ratione ut tempora labore nam architecto alias repellendus cumque? Soluta, adipisci cumque fugiat eum praesentium libero, consequatur alias, quos facere nulla harum ullam illo repudiandae dolore! Quasi voluptatem expedita, eos corrupti eligendi natus obcaecati veritatis voluptate fugiat alias possimus quaerat nostrum vitae aliquam iure, facere modi cumque. Provident quasi facere ullam, earum sapiente voluptatem deserunt cumque quam dolorem vel libero illum nemo corporis fugit similique repellendus nisi neque laudantium harum, perspiciatis et. Consequatur deleniti, consectetur repellat, rem sunt culpa tenetur animi corporis ut dignissimos earum?"
        ]
    ];

    public static function all()
    {
        // mengembalikan nilai yang variabel tipe static
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();
        // $post = [];
        // foreach($posts as $p) {
        //     if($p["slug"] === $slug) {
        //         $post = $p;
        //     }
        // }
        // return $post;

        return $posts->firstWhere('slug', $slug);
    }

    public static function findTitle($slug)
    {
        $posts = static::all();
        // $posts = self::$blog_posts;
        // foreach($posts as $post) {
        //     if($post["slug"] === $slug) {
        //         $title = $post["title"];
        //     }
        // }
        // return $title;

        return $posts->firstWhere('slug', $slug)["title"];
    }
}
