<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box d-none d-lg-block ">
                <a href="javascript:void(0)" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('img/icag.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('img/icag.png') }}" alt="" height="17">
                    </span>
                </a>

                <a href="javascript:void(0)" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('img/icag.png') }}" alt="" height="30">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('img/icag.png') }}" alt="" height="30">
                    </span>
                </a>
            </div>

        </div>

        <div class="d-flex">
            <div class="dnone d-lg-block ml-2" style="width: 200px;">
                {{-- <timer end_date="{{ to_micro($election->end_date) }}"></timer> --}}
                <span>@include('partials.counter', ['election' => auth()->user()->election])</span>
            </div>
        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ auth()->user()->avatar }}"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ml-1">{{ auth()->user()->first_name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="javascript:void(0)"><i
                            class="bx bx-user font-size-16 align-middle mr-1"></i>
                        {{ str()->singular($election->voters_name) }} ID
                        {{ auth()->user()->voter_id }}</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i
                            class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="bx bx-help-circle bx-tada text-danger"></i>
                </button>
            </div>

        </div>
    </div>
</header>
