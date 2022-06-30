@extends('dashboard.layouts.main')
@section('container')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
    >
        <h1 class="h2">Posts</h1>
    </div>
    @if (session('success'))
    <div class="row">
        <div class="col-lg-8">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
</div>
    @endif
    
    <div class="row">
        <div class="col-lg-10">
    <a class="btn btn-primary mb-2" href="/dashboard/posts/create">Create post</a>
    <div class="table-responsive">
        <table class="table table-hover table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->category->name}}</td>
                    <td>
                        <a href="/dashboard/posts/{{$post->slug}} " class="badge bg-info mb-1"><span data-feather="eye"></span></a>
                        <a href="/dashboard/posts/{{$post->slug}}/edit" class="badge bg-warning mb-1"><span data-feather="edit"></span></a>
                        <form action="/dashboard/posts/{{$post->slug}}" method="post">
                            @method('delete')
                            @csrf
                            <button class="d-inline border-0 badge bg-danger mb-1" onclick="return confirm('Are you sure?')" ><span data-feather="trash-2"></span></button>
                            </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</main>
@endsection