<nav class="navbar navbar-expand-lg main-navbar">
    <a href="index.html" class="navbar-brand sidebar-gone-hide">KOL Management</a>
    <div class="navbar-nav">
        <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
    </div>
    <div class="nav-collapse">
        <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
            <i class="fas fa-ellipsis-v"></i>
        </a>
        
    </div>
    <form class="form-inline ml-auto">
        <ul class="navbar-nav">
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
        <div class="search-element">
            <input class="form-control" type="text" placeholder="Search" aria-label="Search" >
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            
        </div>
    </form>
    <ul class="navbar-nav navbar-right">
        {{-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">Messages
                    <div class="float-right">
                        <a href="#">Mark All As Read</a>
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-message">
                    <a href="#" class="dropdown-item dropdown-item-unread">
                        <div class="dropdown-item-avatar">
                            <img alt="image" src="./img/avatar/avatar-1.png" class="rounded-circle">
                            <div class="is-online"></div>
                        </div>
                        <div class="dropdown-item-desc">
                            <b>Kusnaedi</b>
                            <p>Hello, Bro!</p>
                            <div class="time">10 Hours Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item dropdown-item-unread">
                        <div class="dropdown-item-avatar">
                            <img alt="image" src="./img/avatar/avatar-2.png" class="rounded-circle">
                        </div>
                        <div class="dropdown-item-desc">
                            <b>Dedik Sugiharto</b>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                            <div class="time">12 Hours Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item dropdown-item-unread">
                        <div class="dropdown-item-avatar">
                            <img alt="image" src="./img/avatar/avatar-3.png" class="rounded-circle">
                            <div class="is-online"></div>
                        </div>
                        <div class="dropdown-item-desc">
                            <b>Agung Ardiansyah</b>
                            <p>Sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <div class="time">12 Hours Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item">
                        <div class="dropdown-item-avatar">
                            <img alt="image" src="./img/avatar/avatar-4.png" class="rounded-circle">
                        </div>
                        <div class="dropdown-item-desc">
                            <b>Ardian Rahardiansyah</b>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
                            <div class="time">16 Hours Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item">
                        <div class="dropdown-item-avatar">
                            <img alt="image" src="./img/avatar/avatar-5.png" class="rounded-circle">
                        </div>
                        <div class="dropdown-item-desc">
                            <b>Alfa Zulkarnain</b>
                            <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                            <div class="time">Yesterday</div>
                        </div>
                    </a>
                </div>
                <div class="dropdown-footer text-center">
                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li> --}}
        {{-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">Notifications
                    <div class="float-right">
                        <a href="#">Mark All As Read</a>
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-icons">
                    <a href="#" class="dropdown-item dropdown-item-unread">
                        <div class="dropdown-item-icon bg-primary text-white">
                            <i class="fas fa-code"></i>
                        </div>
                        <div class="dropdown-item-desc">
                            Template update is available now!
                            <div class="time text-primary">2 Min Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item">
                        <div class="dropdown-item-icon bg-info text-white">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="dropdown-item-desc">
                            <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                            <div class="time">10 Hours Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item">
                        <div class="dropdown-item-icon bg-success text-white">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="dropdown-item-desc">
                            <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                            <div class="time">12 Hours Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item">
                        <div class="dropdown-item-icon bg-danger text-white">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="dropdown-item-desc">
                            Low disk space. Let's clean it!
                            <div class="time">17 Hours Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item">
                        <div class="dropdown-item-icon bg-info text-white">
                            <i class="fas fa-bell"></i>
                        </div>
                        <div class="dropdown-item-desc">
                            Welcome to Stisla template!
                            <div class="time">Yesterday</div>
                        </div>
                    </a>
                </div>
                <div class="dropdown-footer text-center">
                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li> --}}
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('theme/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, Rino</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Logged in 5 min ago</div>
                <a href="{{ route('user.profil') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <a href="{{ route('user.service') }}" class="dropdown-item has-icon">
                    <i class="fas fa-key"></i> Password
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>

<nav class="navbar navbar-secondary navbar-expand-lg">
    <div class="container">
        <ul class="navbar-nav">
            <li class="nav-item  {{ (Route::is('media.dashboard')) ? 'class="active"' : '' }}">
                <a href="{{ route('media.dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            
            <li class="nav-item dropdown {{ (Route::is('media.category*') || Route::is('media.admin*') || Route::is('media.audiens*')) ? 'active' : '' }}">
                <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-database"></i><span>Master Data</span></a>
                <ul class="dropdown-menu">
                    {{-- <li class="nav-item"><a href="#" class="nav-link">Influencer</a></li> --}}
                    <li class="nav-item"><a href="{{ route('media.category') }}" class="nav-link">Kategori</a></li>
                    <li class="nav-item"><a href="{{ route('media.project') }}" class="nav-link">Project</a></li>
                    <li class="nav-item"><a href="{{ route('media.audiens') }}" class="nav-link">Audiens Character</a></li>
                    <li class="nav-item"><a href="{{ route('media.admin') }}" class="nav-link">Admin</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Lokasi</a></li>
                </ul>
            </li>
            
            <li class="nav-item dropdown {{ (Route::is('media.keyopinion*') || Route::is('media.influencer')) ? 'active' : '' }}">
                <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-database"></i><span>Key Opion Leader</span></a>
                <ul class="dropdown-menu">
                    <li class="nav-item"><a href="{{ route('media.influencer') }}" class="nav-link">Semua</a></li>
                    <li class="nav-item"><a href="{{ route('media.keyopinion.influencer') }}" class="nav-link">Influencer</a></li>
                    <li class="nav-item"><a href="{{ route('media.keyopinion.komunitas') }}" class="nav-link">Komunitas</a></li>
                    <li class="nav-item"><a href="{{ route('media.keyopinion.singlesite') }}" class="nav-link">Singlesite</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ (Route::is('media.rekomendasi*')) ? 'active' : '' }}">
                <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-database"></i><span>Rekomendasi</span></a>
                <ul class="dropdown-menu">
                    <li class="nav-item"><a href="{{ route('media.rekomendasi') }}" class="nav-link">Buat Baru</a></li>
                    <li class="nav-item"><a href="{{ route('media.rekomendasi.history') }}" class="nav-link">Riwayat</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown ">
                <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-database"></i><span>Materi Kreatif</span></a>
                <ul class="dropdown-menu">
                    <li class="nav-item"><a href="{{ route('media.keyopinion.influencer') }}" class="nav-link">Client</a></li>
                    <li class="nav-item"><a href="{{ route('media.keyopinion.influencer') }}" class="nav-link">Influencer</a></li>
                </ul>
            </li>

            
        </ul>
    </div>
</nav>