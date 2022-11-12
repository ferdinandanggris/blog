<nav class="fixed-top navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
        <a class="navbar-brand text-primary" href="/"><b>FERDINAND ANGGRIS</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item mx-2">
                    <a class="text-secondary nav-link {{Request::is('/')? 'active' : ''}}" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="text-secondary nav-link {{Request::is('category*')? 'active' : ''}}" href="/category">Categories</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="text-secondary nav-link {{Request::is('about*')? 'active' : ''}}" href="/about">About</a>
                </li>
                @auth
                <li class="nav-item dropdown">
                    <a class="text-secondary nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      User
                    </a>
                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDarkDropdownMenuLink">
                      <li><a class="dropdown-item text-secondary" href="/dashboard/posts">Dashboard</a></li>
                      <li>
                        <form action="/logout" method="post">
                          @csrf
                            <button type="submit" class="dropdown-item text-secondary">Logout</button>
                        </form>
                      </li>
                    </ul>
                  </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>