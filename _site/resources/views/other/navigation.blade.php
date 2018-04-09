<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="{{url('/')}}"> <img src="https://image.ibb.co/gwYkKx/1_Primary_logo_on_transparent_200x71.png" alt="1_Primary_logo_on_transparent_200x71" border="0"></a>
            <ul class="navbar-nav ml-auto">
                @if (Route::has('login'))
                    <li class="top-right links">
                        @auth
                            <a href="{{ url('admin/home') }}"><button class = "btn btn-success">Home</button></a>
                            <a href="{!! url('/logout') !!}"><button class = "btn btn-danger"> Log Out </button></a>
                        @else
                            <a data-target = "#myModal" data-toggle="modal"><button class = "btn btn-info">Log in the administrative section</button></a>
                        @endauth
                    </li>
                @endif

            </ul>
        </div>
</nav>

