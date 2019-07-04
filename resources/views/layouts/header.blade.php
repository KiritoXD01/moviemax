<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                </span>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('users.edit', Auth::user()->id) }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> @lang('messages.profile')
                </a>
                <div class="dropdown-divider"></div>
                @if(Session::get('locale') == 'es')
                <a class="dropdown-item" href="{{ route('changeLanguage', 'en') }}">
                    <i class="fas fa-globe fa-sm fa-fw mr-2 text-gray-400"></i> Ingles
                </a>
                @else
                <a class="dropdown-item" href="{{ route('changeLanguage', 'es') }}">
                    <i class="fas fa-globe fa-sm fa-fw mr-2 text-gray-400"></i> Spanish
                </a>
                @endif
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalLogout">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> @lang('messages.logOut')
                </a>
            </div>
        </li>

    </ul>

</nav>