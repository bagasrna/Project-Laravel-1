<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        // agar ketika mencari jenis category, judul nya ada kategori nya
        $title = '';
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        return view('posts', [
            "title" => "All Posts" . $title,
            "active" => "posts",
            // "posts" => Post::all()
            // menggunakan method filter untuk search di file model
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString() //untuk mengurutkan postingan dari terbaru dan menampilkan 7 post per halaman dan apapun yang diambil query nya akan dibawa untuk pagination
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            "title" => $post['title'],
            "active" => "posts",
            "post" => $post
        ]);
    }
}
