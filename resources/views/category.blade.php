{{-- untuk melihat isi variabel dari file posts, dan akan memberhentikan script code dibawahnya --}}
{{-- @dd($posts) --}}

{{-- Untuk menurunkan semua code di parent --}}
@extends('layouts.main')

{{-- Untuk menggantikan yield di file parent --}}
@section('container') 
  
  <h1 class="mb-5">Post Category : {{ $category }}</h1>
  @foreach ( $posts as $post)
    <article class="mb-5">
      <h2>
        <a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a>
      </h2>
      <h5>By: Bagas Raditya</h5>
      <p>{{ $post->excerpt }}</p>
    </article>
  @endforeach

@endsection

