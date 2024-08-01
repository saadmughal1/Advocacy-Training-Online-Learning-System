<div class="header">
    <div class="header-left">
        <div class="menu-icon bi bi-list"></div>
        <div class="search-toggle-icon bi bi-search" data-toggle="header_search"></div>
    </div>

    <div class="header-right">

        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="../#" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        <img src="{{ asset('vendors/images/profile.png') }}" alt="" />
                    </span>
                    <span class="user-name"> {{ Auth::guard('advisor')->user()->username }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <!-- <a class="dropdown-item" href="../profile.html"
      ><i class="dw dw-user1"></i> Profile</a
     > -->
                    <a class="dropdown-item" href="{{route('advisor.logout')}}"><i class="dw dw-logout"></i> Log Out</a>
                </div>
            </div>
        </div>

    </div>
</div>
