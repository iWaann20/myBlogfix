<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <div class="navbar-brand-box">
                <a class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.svg" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-sm.svg" alt="" height="24"> <span class="logo-txt">Minia</span>
                    </span>
                </a>
                <a class="logo logo-light">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.svg" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-sm.svg" alt="" height="24"> <span class="logo-txt">Minia</span>
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            <div class="search-container">
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search">
                    <button class="btn btn-primary" type="button" style="background-color: #023669 !important; border-color: #023669 !important;"><i class="bx bx-search-alt align-middle"></i></button>
                </div>
            </form>
            </div>
        </div>

        <div class="d-flex">
            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item" id="page-header-search-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="search" class="icon-lg"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-search-dropdown">
        
                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" aria-label="Search Result">

                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-none d-sm-inline-block">
                <button type="button" class="btn header-item" id="mode-setting-btn">
                    <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                    <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                </button>
            </div>
            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="grid" class="icon-lg"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <div class="p-2">
                        <div class="row g-0">
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="assets/images/brands/github.png" alt="Github">
                                    <span>GitHub</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="assets/images/brands/bitbucket.png" alt="bitbucket">
                                    <span>Bitbucket</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="assets/images/brands/dribbble.png" alt="dribbble">
                                    <span>Dribbble</span>
                                </a>
                            </div>
                        </div>

                        <div class="row g-0">
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="assets/images/brands/dropbox.png" alt="dropbox">
                                    <span>Dropbox</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="assets/images/brands/mail_chimp.png" alt="mail_chimp">
                                    <span>Mail Chimp</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="assets/images/brands/slack.png" alt="slack">
                                    <span>Slack</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon position-relative" id="page-header-notifications-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="bell" class="icon-lg"></i>
                    <span class="badge bg-danger rounded-pill">5</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0"> Notifications </h6>
                            </div>
                            <div class="col-auto">
                                <a href="#!" class="small text-reset text-decoration-underline"> Unread (3)</a>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <img src="assets/images/users/avatar-3.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">James_Lemire</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">It_will_seem_like_simplified_English.</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1_hours_ago</span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 avatar-sm me-3">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="bx bx-cart"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Your_order_is_placed</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">If_several_languages_coalesce_the_grammar</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3_min_ago</span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 avatar-sm me-3">
                                    <span class="avatar-title bg-success rounded-circle font-size-16">
                                        <i class="bx bx-badge-check"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Your_item_is_shipped</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">If_several_languages_coalesce_the_grammar</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3_min_ago</span></p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <img src="assets/images/users/avatar-6.jpg" class="rounded-circle avatar-sm" alt="user-pic">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Salena_Layfield</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">As_a_skeptical_Cambridge_friend_of_mine_occidental.</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1_hours_ago</span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="p-2 border-top d-grid">
                        <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                            <i class="mdi mdi-arrow-right-circle me-1"></i> <span>View_More</span> 
                        </a>
                    </div>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item right-bar-toggle me-2">
                    <i data-feather="settings" class="icon-lg"></i>
                </button>
            </div>
            <div class="dropdown d-inline-block">
            <button type="button" class="btn header-item bg-soft-light border-start border-end" id="page-header-user-dropdown"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            
            @if(auth()->user()->profile_picture)
                <img class="rounded-circle header-profile-user" 
                    src="{{ filter_var(auth()->user()->profile_picture, FILTER_VALIDATE_URL) 
                        ? auth()->user()->profile_picture 
                        : asset('storage/' . auth()->user()->profile_picture) }}" 
                    alt="Profile Picture">
            @else
                <span class="rounded-circle d-flex align-items-center justify-content-center bg-secondary text-white" 
                    style="width: 40px; height: 40px;">
                    <i data-feather="user"></i>
                </span>
            @endif
                <span class="d-none d-xl-inline-block ms-1 fw-medium">{{ auth()->user()->username }}</span>
                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
            </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="/profile"><i class="mdi mdi-face-profile font-size-16 align-middle me-1"></i> Profile</a>
                    <a class="dropdown-item" href="auth-lock-screen.php"><i class="mdi mdi-lock font-size-16 align-middle me-1"></i> Lock_screen </a>
                    <div class="dropdown-divider"></div>
                    <form action="/signout" method="post">
                        @csrf
                        <button class="dropdown-item" type="submit"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i>Sign out</button>
                    </form>
                </div>
            </div>
        </div>
    </div>   
</header>
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                <?php
                $menus = /DB::table('menus')->get();
                ?>

                @foreach ($menus as $menu)
                    <?php
                    $submenus = /DB::table('sub_menus')->where('menu_id', $menu->id)->get();
                    $countsubmenus = count($submenus);
                    ?>
                @endforeach
                <li>
                    <a href="/">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="grid"></i>
                        <span data-key="t-apps">Apps</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="/calendar">
                                <span data-key="t-calendar">Calendar</span>
                            </a>
                        </li>
        
                        <li>
                            <a href="/chat">
                                <span data-key="t-chat">Chat</span>
                            </a>
                        </li>
        
                        <li>
                            <a href="#" class="has-arrow">
                                <span data-key="t-email">Email</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="/inbox-mail" data-key="t-inbox">Inbox</a></li>
                                <li><a href="/read-email" data-key="t-read-email">Read_Email</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <span data-key="t-invoices">Invoices</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="/invoices-list" data-key="t-invoice-list">Invoice_List</a></li>
                                <li><a href="/invoices-detail" data-key="t-invoice-detail">Invoice_Detail</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <span data-key="t-contacts">Contacts</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="apps-contacts-grid.php" data-key="t-user-grid">User_Grid</a></li>
                                <li><a href="apps-contacts-list.php" data-key="t-user-list">User_List</a></li>
                                <li><a href="apps-contacts-profile.php" data-key="t-profile">Profile</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                @auth
                @if(auth()->user()->role_id === 1)
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="users"></i>
                        <span data-key="t-authentication">Authentication</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/admin" data-key="t-admin">Verify Users</a></li>
                        <li><a href="/login" data-key="t-login">Login</a></li>
                        <li><a href="pages-register.php" data-key="t-register">Register</a></li>
                        <li><a href="pages-recoverpw.php" data-key="t-recover-password">Recover_Password</a></li>
                        <li><a href="auth-lock-screen.php" data-key="t-lock-screen">Lock_Screen</a></li>
                        <li><a href="auth-confirm-mail.php" data-key="t-confirm-mail">Confirm_Mail</a></li>
                        <li><a href="auth-email-verification.php" data-key="t-email-verification">Email_Verification</a></li>
                        <li><a href="auth-two-step-verification.php" data-key="t-two-step-verification">Two_Step_Verification</a></li>
                    </ul>
                </li>
                @endif
                @endauth
            </ul>
        </div>
    </div>
</div>