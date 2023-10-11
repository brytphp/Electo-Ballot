<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ route('admin.dashboard') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('theme/images/logo.svg') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('theme/images/logo-dark.png') }}" alt="" height="17">
                    </span>
                </a>

                <a href="{{ route('admin.dashboard') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('theme/images/logo-light.svg') }}" alt="" height="28">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('theme/images/logo-light.png') }}" alt="" height="28">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>



            {{-- <div class="d-flex">
                <div class="dnone d-lg-block ml-2" style="width: 200px;">
                    <span>@include('partials.counter', ['election' => \App\Models\Election::first()])</span>
                </div>
            </div> --}}



            @hasrole('admin')
                <div class="d-none d-lg-block ml-2">
                    <button type="button" class="btn header-item waves-effect" data-toggle="dropdown" aria-haspopup="false"
                        aria-expanded="false">
                        <status-update ref="status_update" is_sealed="{{ $election->is_sealed }}"
                            is_active="{{ $election->is_active }}"></status-update>
                    </button>
                </div>

                <div class="d-none d-lg-block ml-2">
                    <button type="button" class="btn header-item waves-effect" aria-haspopup="false" aria-expanded="false">
                        <a href="/" target="_blank" class="waves-effect text-white">
                            <i class="fas fa-globe text-white"></i>
                            <span>Home Page</span>
                        </a>
                    </button>
                </div>
            @endhasrole


        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ml-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                    aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..."
                                    aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <div class="dropdown d-none d-lg-inline-block ml-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-customize"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="px-lg-2">
                        <div class="row no-gutters">
                            <div class="col">
                                <a class="dropdown-icon-item" href="/horizon">
                                    <img src="{{ asset('img/Horizon.png') }}" alt="horizon">
                                    <span>Horizon</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="{{ asset('theme/images/brands/github.png') }}" alt="Github">
                                    <span>GitHub</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="{{ asset('theme/images/brands/bitbucket.png') }}" alt="bitbucket">
                                    <span>Bitbucket</span>
                                </a>
                            </div>

                        </div>

                        <div class="row no-gutters">
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="{{ asset('theme/images/brands/dropbox.png') }}" alt="dropbox">
                                    <span>Dropbox</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="{{ asset('theme/images/brands/mail_chimp.png') }}" alt="mail_chimp">
                                    <span>Mail Chimp</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="{{ asset('theme/images/brands/slack.png') }}" alt="slack">
                                    <span>Slack</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dropdown d-none d-lg-inline-block ml-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="bx bx-fullscreen"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect"
                    id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="bx bx-bell bx-tada"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ auth()->user()->avatar }}"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ml-1">{{ auth()->user()->first_name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle mr-1"></i>
                        Profile</a>

                    @if (auth()->user()->email != 'user@electo.com')
                        <a class="dropdown-item d-block" href="{{ route('admin.settings') }}"><i
                                class="bx bx-wrench font-size-16 align-middle mr-1"></i> Settings</a>
                    @endif

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{ route('auth.sign-out') }}"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i
                            class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Logout</a>
                    <form id="logout-form" action="{{ route('auth.sign-out') }}" method="POST"
                        style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="bx bx-help-circle bx-tada"></i>
                </button>
            </div>

        </div>
    </div>
</header>
