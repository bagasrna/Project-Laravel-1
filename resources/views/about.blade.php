{{-- Untuk menurunkan semua code di parent --}}
@extends('layouts.main')

{{-- Untuk menggantikan yield di file parent --}}
@section('container')
    <h1>Halaman About</h1>
    <h3>{{ $name }}</h3>
    <p>{{ $email }}</p>
    <img src="{{ $image }}" alt="{{ $name }}" width="200">
@endsection