<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;

    // yang boleh diisi, sisanya gabolehh
    // protected $fillable = ['title', 'excerpt', 'body'];

    // yang gaboleh diisi, sisanya bolehh
    protected $guarded = ['id'];

    // untuk sekalian mengambil data category, agar saat looping tidak kebanyakan query ke database
    protected $with = ['category'];

    // membuat fitur search
    public function scopeFilter($query, array $filters)
    {
        // if(isset($filters['search']) ? $filters['search'] : false) {
        //     $query->where('title', 'like', '%' . $filters['search'] . '%')
        //         ->orWhere('body', 'like', '%' . $filters['search'] . '%');
        // }

        // ketika ada isi dari search, maka jalankan
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')
            ->orWhere('body', 'like', '%' . $search . '%');
        });

        // use($category) adalah untuk menggunakan variabel parameter diatasnya
        $query->when($filters['category'] ?? false, function($query, $category) {
            return $query->whereHas('category', function($query) use($category) {
                $query->where('slug', $category);
            });
        });

        // => adalah alternatif lain dari function()
        // $query->when($filters['author'] ?? false, fn($query, $author) =>
        //     $query->whereHas('author', fn($query) =>
        //         $query->where('username', $author)
        //     )
        // );
    }


    // membuat relation ke tabel category
    // post sebagai many, kategory sebagai one
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
