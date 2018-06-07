<aside class="main-sidebar control-sidebar control-sidebar-light" id="sidebar-wrapper">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{!! Auth::user()->avatar !!}" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                @if (Auth::guest())
                @else
                    <p>{{ Auth::user()->name}}</p>
                @endif
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Logged In</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            @include('layouts.menu')
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>