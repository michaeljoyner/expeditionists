<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/static/NEW_logo_white.png') }}" alt="logo"/>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/admin/profiles/{{ Auth::user()->id }}">Profile</a></li>
                <li><a href="/admin/expeditions">Expeditions</a></li>
                @role('admin')
                <li class="dropdown">
                    <a href="#"
                       class="dropdown-toggle"
                       data-toggle="dropdown"
                       role="button"
                       aria-haspopup="true"
                       aria-expanded="false"
                    >Edit Content <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        {{--<li><a href="/admin/content/pages/home">Home Page</a></li>--}}
                        {{--<li><a href="/admin/content/pages/about">About Page</a></li>--}}
                        {{--<li><a href="/admin/content/pages/expeditionists">Expeditionists</a></li>--}}
                        {{--<li><a href="/admin/content/pages/expeditions">Expeditions</a></li>--}}
                        @foreach($pages as $page)
                            <li><a href="/admin/content/pages/{{ $page->name }}">{{ $page->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="/admin/sponsors">Sponsors</a></li>
                <li><a href="/admin/charities">Charities</a></li>
                @endif
                <li><a href="/admin/blog">Blog</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @role('admin')
                    <li><a href="/admin/users">Users</a></li>
                @endif
                <li class="dropdown">
                    <a href="#"
                       class="dropdown-toggle"
                       data-toggle="dropdown"
                       role="button"
                       aria-haspopup="true"
                       aria-expanded="false"
                    >{{ Auth::user()->email }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Reset Password</a></li>
                        <li><a href="/admin/logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>