<header class="header">
    <div class="page-brand">
        <a class="link" href="{{ route('back.home') }}">
            {{-- <span class="brand">{{ _settings('SITE_TITLE') }}</span> --}}
            {{-- <span class="brand-mini">{{ _settings('SITE_TITLE_SF') }}</span> --}}
            <span class="brand"><img src="{{ _logo() }}" alt="Love Bite Logo" style="max-height:60px;"><p style="margin-top: 25px;margin-left: 10px;">I Love Bite</p></span>
            <span class="brand-mini"><img src="{{ _logo() }}" alt="Love Bite Logo" style="max-height:40px;"></span>
        </a>
    </div>
    <div class="flexbox flex-1">
        <ul class="nav navbar-toolbar">
            <li>
                <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
            </li>
            {{-- <li>
                <form class="navbar-search" action="javascript:;">
                    <div class="rel">
                        <span class="search-icon"><i class="ti-search"></i></span>
                        <input class="form-control" placeholder="Search here...">
                    </div>
                </form>
            </li> --}}
        </ul>
        <ul class="nav navbar-toolbar">
            {{-- <li class="dropdown dropdown-inbox">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope-o"></i>
                    <span class="badge badge-primary envelope-badge">9</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                    <li class="dropdown-menu-header">
                        <div>
                            <span><strong>9 New</strong> Messages</span>
                            <a class="pull-right" href="mailbox.html">view all</a>
                        </div>
                    </li>
                    <li class="list-group list-group-divider scroller" data-height="240px" data-color="#71808f">
                        <div>
                            <a class="list-group-item">
                                <div class="media">
                                    <div class="media-img">
                                        <img src="{{ asset('assets/img/users/u1.jpg') }}" />
                                    </div>
                                    <div class="media-body">
                                        <div class="font-strong"> </div>Jeanne Gonzalez<small class="text-muted float-right">Just now</small>
                                        <div class="font-13">Your proposal interested me.</div>
                                    </div>
                                </div>
                            </a>
                            <a class="list-group-item">
                                <div class="media">
                                    <div class="media-img">
                                        <img src="{{ asset('assets/img/users/u2.jpg') }}" />
                                    </div>
                                    <div class="media-body">
                                        <div class="font-strong"></div>Becky Brooks<small class="text-muted float-right">18 mins</small>
                                        <div class="font-13">Lorem Ipsum is simply.</div>
                                    </div>
                                </div>
                            </a>
                            <a class="list-group-item">
                                <div class="media">
                                    <div class="media-img">
                                        <img src="{{ asset('assets/img/users/u3.jpg') }}" />
                                    </div>
                                    <div class="media-body">
                                        <div class="font-strong"></div>Frank Cruz<small class="text-muted float-right">18 mins</small>
                                        <div class="font-13">Lorem Ipsum is simply.</div>
                                    </div>
                                </div>
                            </a>
                            <a class="list-group-item">
                                <div class="media">
                                    <div class="media-img">
                                        <img src="{{ asset('assets/img/users/u4.jpg') }}" />
                                    </div>
                                    <div class="media-body">
                                        <div class="font-strong"></div>Rose Pearson<small class="text-muted float-right">3 hrs</small>
                                        <div class="font-13">Lorem Ipsum is simply.</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>
            <li class="dropdown dropdown-notification">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell-o rel"><span class="notify-signal"></span></i></a>
                <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                    <li class="dropdown-menu-header">
                        <div>
                            <span><strong>5 New</strong> Notifications</span>
                            <a class="pull-right" href="javascript:;">view all</a>
                        </div>
                    </li>
                    <li class="list-group list-group-divider scroller" data-height="240px" data-color="#71808f">
                        <div>
                            <a class="list-group-item">
                                <div class="media">
                                    <div class="media-img">
                                        <span class="badge badge-success badge-big"><i class="fa fa-check"></i></span>
                                    </div>
                                    <div class="media-body">
                                        <div class="font-13">4 task compiled</div><small class="text-muted">22 mins</small>
                                    </div>
                                </div>
                            </a>
                            <a class="list-group-item">
                                <div class="media">
                                    <div class="media-img">
                                        <span class="badge badge-default badge-big"><i class="fa fa-shopping-basket"></i></span>
                                    </div>
                                    <div class="media-body">
                                        <div class="font-13">You have 12 new orders</div><small class="text-muted">40 mins</small>
                                    </div>
                                </div>
                            </a>
                            <a class="list-group-item">
                                <div class="media">
                                    <div class="media-img">
                                        <span class="badge badge-danger badge-big"><i class="fa fa-bolt"></i></span>
                                    </div>
                                    <div class="media-body">
                                        <div class="font-13">Server #7 rebooted</div><small class="text-muted">2 hrs</small>
                                    </div>
                                </div>
                            </a>
                            <a class="list-group-item">
                                <div class="media">
                                    <div class="media-img">
                                        <span class="badge badge-success badge-big"><i class="fa fa-user"></i></span>
                                    </div>
                                    <div class="media-body">
                                        <div class="font-13">New user registered</div><small class="text-muted">2 hrs</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </li>
                </ul>
            </li> --}}
            <li class="dropdown dropdown-user">
                <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                    <img src="{{ url('back/uploads/users').'/'.auth()->user()->image }}" />
                    <span></span>{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}<i class="fa fa-angle-down m-l-5"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('back.profile') }}"><i class="fa fa-user"></i>Profile</a>
                    <a class="dropdown-item" href="{{ route('back.profile.change.password') }}"><i class="fa fa-cog"></i>Change Password</a>
                    <li class="dropdown-divider"></li>
                    <a class="dropdown-item" href="{{ route('back.logout') }}"><i class="fa fa-power-off"></i>Logout</a>
                </ul>
            </li>
        </ul>
    </div>
</header>
