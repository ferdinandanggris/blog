@extends('layouts.main')

@section('container')
<div class="container" style="min-height: 30em">
    <h1>Halaman Kategori</h1>
    <div class="row justify-content-md-center">
        @foreach ($categories as $category)
            <div class="col-md-4 mt-4">
              <a href="/category/{{$category->slug}}">
              <div class="card bg-dark  text-white border-0">
                <img src="/storage/{{$category->image}}" class="card-img" alt="">
                <div class="card-img-overlay d-flex align-items-center p-0">
                  <h5 class="card-title flex-fill text-center fs-3 p-4 m-0" style="background-color: rgba(0,0,0,0.7)">{{$category->name}}</h5>
                </div>
              </div>
            </a>
            </div>
        @endforeach
    </div>
  </div>
@endsection