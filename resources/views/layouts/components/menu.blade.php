<!-- Navigation -->
<nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="/">Nationaal Jeugd Ontbijt</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li>
                    <a href="{{route('childrenpage')}}">Kinderen</a>
                </li>
                <li>
                    <a href="#">Blog</a>
                </li>
                <li>
                    <a class="page-scroll" href="/#services">Informatie</a>
                </li>
                <li>
                    <a class="page-scroll" href="/#portfolio">Recente Blogposts</a>
                </li>
                <li>
                    <a class="page-scroll" href="/#map">Map</a>
                </li>
                <li>
                    <a class="page-scroll" href="/#about">Over ons</a>
                </li>
                <li>
                    <a class="page-scroll" href="/#contact">Contact</a>
                </li>
                <li>
                @if (Auth::guest())
                    <li>
                        <a class="sliding-middle-out"  href="{{ url('/login') }}">Login <span class="sr-only">(current)</span></a>
                    </li>
                @endif

                @if(Auth::user())
                    <li><a  class="sliding-middle-out"href="{{ route('me.posts') }}"> Mijn Blog Posts</a></li>
                    @if (Auth::user()->isAdmin())
                        <li><a class="sliding-middle-out" href="{{ route('dashboard.index') }}"> Dashboard</a></li>

                    @endif
                    <li>
                        <a class="sliding-middle-out" href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Uitloggen
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    @endif
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
