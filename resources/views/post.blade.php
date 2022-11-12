@extends('layouts.main')

@section('container')
<div class="container">
<article>
    <p class="mb-0 pt-3 text-secondary">{{date('d M Y',strtotime($post->updated_at))}}</p>
    <h3 class="">{{$post->title}}</h3>
    <p class="text-muted"><b><a class="text-decoration-none text-primary" href="/category/{{$post->category->slug}}">{{$post->category->name}}</a></b></p>
    <img class="img-fluid" style="width: 50vw; height: 350px; object-fit: cover;display: block;margin: auto" src="/storage/{{$post->image}}" alt="">
    <p>{!!$post->body!!}</p>
</article>
<a class="btn bg-primary text-white" href="/"><i class="bi bi-chevron-double-left"></i> Ke Halaman Utama</a>
</div>
@endsection