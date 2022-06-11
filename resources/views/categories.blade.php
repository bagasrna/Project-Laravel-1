{{-- untuk melihat isi variabel dari file posts, dan akan memberhentikan script code dibawahnya --}}
{{-- @dd($posts) --}}

{{-- Untuk menurunkan semua code di parent --}}
@extends('layouts.main')

{{-- Untuk menggantikan yield di file parent --}}
@section('container') 
  
  <h1 class="mb-5">Post Categories</h1>

  <div class="container">
    <div class="row">
      @foreach ($categories as $category)
        <div class="col-md-4">
          <a href="/posts?category={{ $category->slug }}">
            <div class="card bg-dark text-white">
              <img src="https://source.unsplash.com/500x400?{{ $category->name }}" class="card-img" alt="{{ $category->name }}">
              <div class="card-img-overlay d-flex align-items-center p-0">
                {{-- <h5 class="card-title text-center">{{ $category->name }}</h5> --}}
                <h5 class=" card-title text-center flex-fill p-3 bg-dark opacity-75 fs-3"><a href="/posts?category={{ $category->slug }}" class="text-white text-decoration-none">{{ $category->name }}</a></h5>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>


  {{-- @foreach ( $categories as $category)
    <article class="mb-5">
      <h2>
        <a href="/categories/{{ $category->slug }}" class="text-decoration-none">{{ $category->name }}</a>
      </h2>
    </article>
  @endforeach --}}
  
@endsection

