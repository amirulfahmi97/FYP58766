

  <nav class="main-header navbar navbar-expand navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <a class="navbar-brand " href="{{route('staffdashboard')}}">Inventory Management System</a>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">

                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->userID }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('profileee.show', auth()->user()->userID) }}">

                        {{ __('Profile') }}
                    </a>

                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </div>


        </li>
    </ul>


</nav>
