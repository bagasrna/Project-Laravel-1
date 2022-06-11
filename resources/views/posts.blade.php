{{-- untuk melihat isi variabel dari file posts, dan akan memberhentikan script code dibawahnya --}}
{{-- @dd($posts) --}}

{{-- Untuk menurunkan semua code di parent --}}
@extends('layouts.main')

{{-- Untuk menggantikan yield di file parent --}}
@section('container') 
  
  <h1 class="mb-3 text-center">{{ $title }}</h1>

  <div class="row justify-content-center mb-3">
    <div class="col-md-6">
      <form action="/posts">
        @if (request('category'))
          <input type="hidden" name="category" value="{{ request('category') }}">
        @endif
        {{-- @if (request('author'))
          <input type="hidden" name="author" value="{{ request('author') }}">
        @endif --}}
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
          <button class="btn btn-danger" type="submit">Search</button>
        </div>
      </form>
    </div>
  </div>

  @if ($posts->count() > 0)
  <div class="card mb-3">
    @if($posts[0]->image)
    <div style="max-height: 400px; overflow:hidden">
        <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}" class="img-fluid">
    </div>
    @else
    <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
    @endif
    <div class="card-body text-center">
      <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>
      <h5>
        <small class="text-muted">
          By. <a href="/authors/{{ $posts[0]->user->username }}" class="text-decoration-none">{{ $posts[0]->user->name }}</a> in <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}
        </small>
      </h5>
      <p class="card-text">{{ $posts[0]->excerpt }}</p>
      <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more..</a>
    </div>
  </div>

  <div class="container">
    <div class="row">
      @foreach ($posts->skip(1) as $post)
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="position-absolute px-3 py-2 bg-dark opacity-75"><a href="/posts?category={{ $post->category->slug }}" class="text-white text-decoration-none">{{ $post->category->name }}</a></div>
          @if($post->image)
              <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
          @else
          <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
          @endif
          <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <h5>
              <small class="text-muted">
                By. <a href="/authors{{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a> {{ $post->created_at->diffForHumans() }}
              </small>
            </h5>
            <p class="card-text">{{ $post->excerpt }}</p>
            <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read more</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  {{-- akan nyekip 1 post pertama
  @foreach ( $posts->skip(1) as $post) 
    <article class="mb-5 border-bottom pb-4">
      <h2>
        <a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a>
      </h2>
      <h5>By. <a href="/authors/{{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a> in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></h5>
      <p>{{ $post->excerpt }}</p>
      <a href="/posts/{{ $post->slug }}" class="text-decoration-none">Read more..</a>
    </article>
  @endforeach --}}

  @else 
    <p class="text-center fs-4">No post found.</p>
  @endif

  {{-- fitur next slide --}}
  <div class="d-flex justify-content-center">
    {{-- {{ $posts->links() }} --}}
  </div>

@endsection

