<!-- Page Sidebar Start-->
<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper"><a href="{{ route('task.user.') }}">
                <img class="img-fluid for-light" src="https://banner2.cleanpng.com/20180422/bww/kisspng-dashboard-business-intelligence-management-informa-dashboard-5adceebbd6e940.5844354015244284758803.jpg" width="50" height="50" alt="">
                <img class="img-fluid for-dark" src="https://banner2.cleanpng.com/20180422/bww/kisspng-dashboard-business-intelligence-management-informa-dashboard-5adceebbd6e940.5844354015244284758803.jpg" width="50" height="50" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="{{ route('task.user.') }}"><img class="img-fluid" src="" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul style="padding-bottom: 40px;" class="sidebar-links" id="simple-bar">
                    <li class="back-btn"><a href="{{ route('task.user.') }}"><img class="img-fluid" src="" alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                

                    <li class="sidebar-list" style="cursor: pointer">
                        <a class="sidebar-link sidebar-title">
                            <i style="font-size: 18px;color:dark" class="fa fa-hospital-user"></i>
                            <span style="margin-right:4px"> المستخدمين</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('task.user.') }}">عرض المستخدمين</a></li>
                            <li><a href="{{ route('task.user.create') }}">اضافة مستخدم</a></li>
                        </ul>
                    </li>
        </nav>
    </div>
</div>
<!-- Page Sidebar Ends-->
