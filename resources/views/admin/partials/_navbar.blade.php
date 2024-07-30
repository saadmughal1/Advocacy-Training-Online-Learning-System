<div class="header">
    <div class="header-left">
        <div class="menu-icon bi bi-list"></div>
    </div>

    <div class="header-right">

        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="../#" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        <img src="{{asset("vendors/images/profile.png")}}" alt="" />
                    </span>
                    <span class="user-name">Admin</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    {{-- <a class="dropdown-item" href="{{route("admin.logout")}}"><i class="dw dw-logout"></i> Log Out</a> --}}
                    <!-- Logout Form -->
                    <form action="{{ route('admin.logout') }}" method="get" style="display: inline;">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="dw dw-logout"></i> Log Out
                        </button>
                    </form>


                </div>
            </div>
        </div>

    </div>
</div>
