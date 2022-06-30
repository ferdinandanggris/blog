@extends('dashboard.layouts.main')
@section('container')

</head>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
    >
        <h1 class="h2">Edit category</h1>
    </div>
    <div class="row">
        <div class="col-lg-8">
    <form action="/dashboard/categories/{{$category->slug}}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control @error('name') is-invalid  @enderror" id="name" name="name" value="{{old('name',$category->name)}}">
        @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control @error('slug') is-invalid  @enderror" id="slug"  name="slug" value="{{old('slug',$category->slug)}}">
        @error('slug')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <input type="hidden" name="oldImage" value="{{$category->image}}">
        <label for="image"  class="form-label">Image</label>
        @if (asset('storage/'.$category->image))
        <img src="/storage/{{$category->image}}" class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
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
        <button type="submit" class="btn btn-primary">Edit category</button>
    </div>
    </form>
    </div>
</div>
</main>

<script>
    const name = document.querySelector("#name");
    const slug = document.querySelector("#slug");

    name.addEventListener('change',function(){
        fetch("/dashboard/category/checkSlug?name=" + category.value)
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