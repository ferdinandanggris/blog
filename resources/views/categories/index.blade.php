@extends('layouts.main')

@section('container')
    <div class="container" style="min-height: 30em">
        <div class="head d-flex justify-content-between align-items-center border-bottom pt-3">
            <h3 class="text-primary">Kategori</h3>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search"
                style="cursor: pointer" viewBox="0 0 16 16" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <path
                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
            </svg>
        </div>
        <div class="row justify-content-md-center">
            @foreach ($categories as $category)
                <div class="col-md-4 mt-4 ">
                    <a href="/category/{{ $category->slug }}">
                        <div class="card bg-dark shadow text-white border-0"
                            style="width: 300px; height: 350px; overflow: hidden;">
                            <img src="/storage/{{ $category->image }}" class="card-img" alt="">
                            <div class="card-img-overlay d-flex align-items-center p-0">
                                <h5 class="card-title flex-fill text-center fs-5 p-4 m-0"
                                    style="background-color: rgba(0,0,0,0.7)">{{ $category->name }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
