@extends('layouts.main')

@section('container')
<div class="container">
    <h3 class="">{{$title}}</h3>
    <div class="row justify-content-md-between">
        @foreach ($posts as $post)
        <div class="col-md-4 mt-4">
            <div class="card border-0 border-bottom" style="width: 22rem; overflow:hidden">
                    <div class="card-body">
                    <img src="https://source.unsplash.com/600x600" class="img-fluid" alt="...">
                    <a class="text-decoration-none text-dark text-center d-block mt-2" href="/category/{{$post->category->slug}}">
                  <h6 class="card-subtitle mb-2 text-muted">{{$post->category->name}}</h6>
                    </a>
                    <a class="text-decoration-none text-dark text-center" href="/post/{{$post->slug}}">
                      <h5 class="card-title">{{$post->title}}</h5>
                    </a>
                </div>
            </div>

        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-end mt-3">
      {{$posts->links()}}
    </div>
</div>
@endsection
