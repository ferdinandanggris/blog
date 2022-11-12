@extends('dashboard.layouts.main')
@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
    >
        <h1 class="h2">Posts</h1>
    </div>
    <ul class="nav flex-row gap-2">
        <li class="nav-item">
            <a class="btn btn-success" href="/dashboard/posts">Back to posts</a>
        </li>
        <li class="nav-item">
            <a class="btn btn-warning" href="/dashboard/posts/{{$post->slug}}/edit">Edit post</a>
        </li>
        <li class="nav-item">
            <form action="/dashboard/posts/{{$post->slug}}" method="post">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger" >Delete post</button>
            </form>
        </li>
    </ul>
    <h3 class="mt-5"  >{{$post->title}}</h3>
    <p class="text-muted">Category : <b><a href="/category/{{$post->category->slug}}">{{$post->category->name}}</a></b></p>
    <p class="">Last updated : {{$post->updated_at}}</p>
    <img style="width: 50vw; height: 350px; object-fit: cover;display: block;margin: auto" src="/storage/{{$post->image}}" class="img-fluid" alt="">
    <p>{!!$post->body!!}</p>
</main>
@endsection