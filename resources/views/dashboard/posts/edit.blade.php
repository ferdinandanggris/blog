@extends('dashboard.layouts.main')
@section('container')

<link rel="stylesheet" type="text/css" href="/css/trix.css">
<script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
      selector: '#body',
      plugins: ['code'],
    });
  </script>
</head>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
    >
        <h1 class="h2">Edit post</h1>
    </div>
    <div class="row">
        <div class="col-lg-8">
    <form action="/dashboard/posts/{{$post->slug}}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control @error('title') is-invalid  @enderror" id="title" name="title" value="{{old('title',$post->title)}}">
        @error('title')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control @error('slug') is-invalid  @enderror" id="slug"  name="slug" value="{{old('title',$post->slug)}}">
        @error('title')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="category_id" class="form-label">Category</label>
        <select class="form-select" id="category_id" name="category_id">
            @foreach ($categories as $category)
            @if ($category->id==old('category_id',$post->category_id))
            <option value="{{$category->id}}" selected>{{$category->name}}</option>
            @else
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endif
            @endforeach
          </select>
    </div>
    <div class="mb-3">
        <input type="hidden" name="oldImage" value="{{$post->image}}">
        <label for="image"  class="form-label">Image</label>
        @if (asset('storage/'.$post->image))
        <img src="/storage/{{$post->image}}" class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
        @else
        <img src="" class="img-preview img-fluid mb-3 col-sm-5" alt="">
        @endif
        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
        @error('image')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
      </div>
    <div class="mb-3">
        <label for="body" class="form-label">Body</label>
        <textarea class="form-control @error('body')is-invalid @enderror" id="body" name="body" rows="3">{{old('body',$post->body)}}</textarea>
        @error('body')
        <div class="invalid-feedback">
            {{$message}}
          </div>
        @enderror
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Edit post</button>
    </div>
    </form>
    </div>
</div>
</main>

<script>
    const title = document.querySelector("#title");
    const slug = document.querySelector("#slug");

    title.addEventListener('change',function(){
        fetch("/dashboard/posts/checkSlug?title=" + title.value)
            .then(response=>response.json())
            .then(data=>slug.value=data.slug);
    });


    const previewImage = function () {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display='block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
    
</script>
@endsection