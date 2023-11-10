@isset($data)
    <div class="topnav">
        <div class="container-fluid">
            <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                <div class="collapse navbar-collapse " id="topnav-menu-content">
                    <ul class="navbar-nav">
                        @foreach ($data['data']['positions'] as $index => $position)
                            <li class="nav-item">
                                <a class="nav-link {{ !empty(request()->position) && request()->position == $position->pid ? 'active bg-dark text-white' : '' }}"
                                    href="javascript:void(0)" role="button">
                                    <i
                                        class="bx bx-tone mr-2 {{ $index == 0 ? 'ml-3' : '' }} "></i>{{ $position->position }}
                                </a>
                            </li>
                        @endforeach
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'voter.ballot.confirm' ? 'active bg-dark text-white' : '' }}"
                                href="javascript:void(0)" role="button">
                                <i class="bx bx-tone mr-2"></i>CONFIRM
                            </a>
                        </li>
                    </ul>

                </div>

            </nav>
            <div class="progress" style="height: 1px;">
                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0"
                    aria-valuemax="100"></div>
            </div>
        </div>
    </div>
@endisset
