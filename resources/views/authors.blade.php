{{-- untuk melihat isi variabel dari file posts, dan akan memberhentikan script code dibawahnya --}}
{{-- @dd($posts) --}}

{{-- Untuk menurunkan semua code di parent --}}
@extends('layouts.main')

{{-- Untuk menggantikan yield di file parent --}}
@section('container') 
  
  <h1 class="mb-5">Daftar Authors</h1>
  {{-- @foreach ( $authors as $author)
    <article class="mb-5">
      <h2>
        <a href="/authors/{{ $author->username }}" class="text-decoration-none">{{ $author->name }}</a>
      </h2>
    </article>
  @endforeach --}}

  <div class="container">
    <div class="row">
      @foreach ($authors as $author)
        <div class="col-md-4">
          <a href="/authors/{{ $author->username }}">
            <div class="card bg-dark text-white">
              <img src="https://source.unsplash.com/500x400?author" class="card-img" alt="{{ $author->name }}">
              <div class="card-img-overlay d-flex align-items-center p-0">
                <h5 class=" card-title text-center flex-fill p-3 bg-dark opacity-75 fs-3"><a href="/authors/{{ $author->username }}" class="text-white text-decoration-none">{{ $author->name }}</a></h5>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>

@endsection

