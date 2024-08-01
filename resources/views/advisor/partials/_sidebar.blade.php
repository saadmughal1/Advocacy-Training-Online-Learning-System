<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{ route('advisor.home') }}">
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
                        <span class="micon bi bi-table"></span><span class="mtext">Caseload</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('advisor.advisor-caseload') }}">Advisor Caseload</a></li>
                        <li><a href="{{ route('advisor.student-caseload') }}">Students Caseload</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
