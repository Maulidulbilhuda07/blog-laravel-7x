<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown active">
            <li><a class="nav-link" href="/"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
            </li>
            <li class="menu-header">Starter</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-chart-pie"></i></i>
                    <span>Category</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('category.index') }}">List Category</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-tags"></i>
                        <span>Tag</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('tag.index') }}">List Tag</a></li>
                    </ul>
            </li>
            <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-book-open"></i></i>
                                <span>Post</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('post.index') }}">List Post</a></li>
                                <li><a class="nav-link" href="{{ route('post.ShowDelete') }}">List Post Trashed</a></li>
                            </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i></i>
                        <span>Users</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('user.index') }}">List User</a></li>
                    </ul>
                </li>
        </ul>
    </aside>
</div>
