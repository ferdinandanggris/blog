{{-- @dd($posts[1]); --}}

@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="head d-flex justify-content-between align-items-center border-bottom pt-3">
            <h3 class="text-primary">Postingan</h3>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search"
                style="cursor: pointer" viewBox="0 0 16 16" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <path
                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
            </svg>
        </div>
        <div class="row justify-content-md-between" style="min-height: 450px">
            @if ($posts->count())
                @foreach ($posts as $post)
                    <div class="col-md-4 mt-4">

                        <div class="card border-0 shadow border-bottom" style="width: 22rem; overflow:hidden">
                            <div class="card-body">
                                <img src="/storage/{{ $post->image }}" class="img-fluid" alt="">
                                <a class="text-decoration-none text-dark text-center d-block mt-2"
                                    href="category/{{ $post->category->slug }}">
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $post->category->name }}</h6>
                                </a>
                                <a class="text-decoration-none text-dark text-center" href="post/{{ $post['slug'] }}">
                                    <h5 class="card-title text-start">{{ $post->title }}</h5>
                                </a>
                            </div>
                        </div>

                    </div>
                @endforeach
            @else
                <p class="text-muted text-center pt-3">No data found.</p>
            @endif
        </div>
        <div class="d-flex justify-content-end mt-3">
            {{ $posts->links() }}
        </div>
    </div>




    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Masukkan Kata Kunci</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="get">
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="search" placeholder="ex:Instalasi PHP"
                                name="search" value="{{ request('search') }}" autofocus>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
