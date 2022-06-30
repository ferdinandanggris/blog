@extends('layouts.main')

@section('container')
<div class="container">
<article>
    <h3 class="mt-3">{{$post->title}}</h3>
    <p class="text-muted">Category : <b><a href="/category/{{$post->category->slug}}">{{$post->category->name}}</a></b></p>
    <p class="">Last updated : {{$post->updated_at}}</p>
    <img class="img-fluid" src="/storage/{{$post->image}}" alt="">
    <p>{!!$post->body!!}</p>
</article>
<a class="btn btn-warning" href="/">Ke Halaman Utama</a>
</div>
@endsection