<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Luxi & Nash Foundation</a>
            <ul class="navbar-nav ml-auto">
                @if (Route::has('login'))
                    <li class="top-right links">
                        @auth
                            <a href="{{ url('admin/home') }}"><button class = "btn btn-success">Home</button></a>
                            <a href="{!! url('/logout') !!}"><button class = "btn btn-danger"> Log Out </button></a>
                        @else
                            <a href="{{ route('login') }}"><button class = "btn btn-info">Log in the administrative section</button></a>
                        @endauth
                    </li>
                @endif
            </ul>
        </div>
</nav>

