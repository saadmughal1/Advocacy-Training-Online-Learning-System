<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{ route('admin.home') }}">
            <!-- <img src="../vendors/images/" alt="" class="dark-logo" />
                <img src="../vendors/images/" alt="" class="light-logo" /> -->
            Advocacy
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-table"></span><span class="mtext">Create Account</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.create-student-account') }}">Create Student Account</a></li>
                        <li><a href="{{ route('admin.create-advisor-account') }}">Create Advisor Account</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-table"></span><span class="mtext">Display Accounts</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.view-students') }}">Display Student Account</a></li>
                        <li><a href="{{ route('admin.view-advisors') }}">Display Advisor Account</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.initiate-case') }}" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-calendar4-week"></span><span class="mtext">Initiate a Case</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.assign-case') }}" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-calendar4-week"></span><span class="mtext text-wrap">Assigning Cases to
                            Advisors</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
