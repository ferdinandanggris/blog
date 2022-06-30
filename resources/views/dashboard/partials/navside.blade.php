
<nav
id="sidebarMenu"
class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse"
>
<div class="position-sticky pt-3">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{Request::is('dashboard/posts*')? 'active' : ''}}" href="/dashboard/posts">
                <span data-feather="file-text"></span>
                Post
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{Request::is('dashboard/categories*')? 'active' : ''}}" href="/dashboard/categories">
                <span data-feather="flag"></span>
                Kategori
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/">
                <span data-feather="arrow-left"></span>
                Back to home
            </a>
        </li>
    </ul>
</div>
</nav>