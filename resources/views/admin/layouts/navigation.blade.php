<div class="vertical-menu">

    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu" class="mm-active">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                <li class="menu-title">General</li>

                <li class="{{ isActiveRoute('admin.dashboard', 'mm-active') }}">
                    <a href="{{ route('admin.dashboard') }}"
                        class="waves-effect {{ isActiveRoute('admin.dashboard', 'active') }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="menu-title">Reporting</li>
                <li class="{{ @request()->segments()[1] == 'reporting' ? 'mm-active' : '' }}">
                    <a href="javascript: void(0);"
                        class="has-arrow waves-effect {{ @request()->segments()[1] == 'reporting' ? 'mm-active' : '' }}">
                        <i class=" bxspin bxtada bx bx-analyse"></i>
                        <span>Reporting</span>
                    </a>
                    <ul class="sub-menu mm-collapse {{ isActiveRoute('admin.reporting.*', 'mm-show') }}"
                        aria-expanded="false">
                        <li class="{{ isActiveRoute('admin.reporting.index', 'mm-active') }}">
                            <a class="{{ isActiveRoute('admin.reporting.index', 'active') }}"
                                href="{{ route('admin.reporting.index') }}">
                                <i class="fas fa-record-vinyl bxspin"></i>
                                <span>live</span>
                            </a>
                        </li>
                        <li class="{{ isActiveRoute('admin.reporting.customize') }}">
                            <a href="{{ route('admin.reporting.customize') }}"
                                class="waves-effect {{ isActiveRoute('admin.reporting.customize') }}">
                                <i class="dripicons-brush"></i>
                                <span>Customize Report</span>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="menu-title">Election Configuration</li>
                <li class="{{ @request()->segments()[1] == 'ballot' ? 'mm-active' : '' }}">
                    <a href="javascript: void(0);"
                        class="has-arrow waves-effect  {{ @request()->segments()[1] == 'ballot' ? 'mm-active' : '' }}">
                        <i class=" bxspin bxtada mdi mdi-account-box-multiple-outline"></i>
                        <span>E-Ballot</span>
                    </a>
                    <ul class="sub-menu mm-collapse {{ @request()->segments()[1] == 'ballot' ? 'mm-show' : '' }}"
                        aria-expanded="false">
                        <li class="{{ isActiveRoute('admin.ballot.election.index', 'mm-active') }}">
                            <a href="{{ route('admin.ballot.election.index') }}"
                                class="{{ isActiveRoute('admin.ballot.election.index') }}">
                                <i class="bx bx-fingerprint"></i>
                                <span>Election</span>
                            </a>
                        </li>
                        <li class="{{ isActiveRoute('admin.ballot.position.index', 'mm-active') }}"><a
                                class="{{ isActiveRoute('admin.ballot.position.index', 'active') }}"
                                href="{{ route('admin.ballot.position.index') }}"> <i class="bx bx bx-sitemap"></i>
                                <span>Positions</span></a>
                        </li>
                        <li
                            class="{{ isActiveRoute('admin.candidates.*') }}  {{ isActiveRoute('admin.ballot.candidate.edit') }}">
                            <a href="{{ route('admin.ballot.candidate.index') }}"
                                class="waves-effect {{ isActiveRoute('admin.candidates.*') }}">
                                <i class="fas fa-user-tie"></i>
                                <span>Candidates</span>
                            </a>
                        </li>

                        <li class="{{ isActiveRoute('admin.ballot.how-to-vote.index') }}" id="faq">
                            <a href="{{ route('admin.ballot.how-to-vote.index') }}"
                                class="waves-effect {{ isActiveRoute('admin.ballot.how-to-vote.index') }}">
                                <i class="bx bx-help-circle bxtada"></i>
                                <span>How To Vote</span>
                            </a>
                        </li>


                        <li class="{{ isActiveRoute('admin.ballot.history.index') }}">
                            <a href="{{ route('admin.ballot.history.index') }}"
                                class="waves-effect {{ isActiveRoute('admin.ballot.history.index') }}">
                                <i class="mdi mdi-history"></i>
                                <span>History</span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="menu-title">{{ $election->voters_name ?? 'Voters' }} Register</li>
                <li class="{{ @request()->segments()[1] == 'register' ? 'mm-active' : '' }}">
                    <a href="javascript: void(0);"
                        class="has-arrow waves-effect {{ @request()->segments()[1] == 'register' ? 'mm-active' : '' }}">
                        <i class="fas fa-users"></i>
                        <span>Register</span>
                    </a>
                    <ul class="sub-menu mm-collapse {{ @request()->segments()[1] == 'register' ? 'mm-show' : '' }}"
                        aria-expanded="false">

                        <li class="">
                            <a href="{{ route('admin.register.index') }}"
                                class="waves-effect {{ isActiveRoute('admin.voters.*') }}">
                                <i class="bx bx-list-ol"></i>
                                <span>{{ $election->voters_name ?? 'Voters' }}</span>
                            </a>
                        </li>


                        <li class="{{ isActiveRoute('admin.voter-inclusion') }}">
                            <a href="{{ route('admin.voter-inclusion') }}"
                                class="waves-effect {{ isActiveRoute('admin.voter-inclusion') }}">
                                <i class="bx bxs-edit-alt"></i>
                                <span>Update Requests</span>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="menu-title">Alerts and Reminders</li>
                <li class="{{ isActiveRoute('admin.reminder.*') }}">
                    <a href="{{ route('admin.reminder.index') }}"
                        class="waves-effect {{ isActiveRoute('admin.reminder.*') }}">
                        <i class="bx bx-notepad"></i>
                        <span>Reminder</span>
                    </a>
                </li>

                @hasrole('admin')
                    <li class="menu-title">Advance</li>

                    <li class="{{ isActiveRoute('admin.accounts.index') }}">
                        <a href="{{ route('admin.accounts.index') }}"
                            class="waves-effect {{ isActiveRoute('admin.accounts.index') }}">
                            <i class="bx bx-key"></i>
                            <span>User Accounts</span>
                        </a>
                    </li>

                    {{-- <li class="{{ isActiveRoute('admin.backup.index') }}">
                        <a href="{{ route('admin.backup.index') }}"
                            class="waves-effect {{ isActiveRoute('admin.backup.index') }}">
                            <i class="bx bx-server"></i>
                            <span>Backup</span>
                        </a>
                    </li> --}}

                    <li class="{{ isActiveRoute('admin.settings') }}">
                        <a href="{{ route('admin.settings') }}"
                            class="waves-effect {{ isActiveRoute('admin.settings') }}">
                            <i class="bx bx-cog"></i>
                            <span>Settings</span>
                        </a>
                    </li>


                    <li
                        class="{{ isActiveRoute('admin.audit-trail.system', 'mm-active') }} {{ isActiveRoute('admin.audit-trail.activity', 'mm-active') }}">
                        <a href="javascript: void(0);"
                            class="has-arrow waves-effect {{ isActiveRoute('admin.audit-trail.system', 'mm-active') }} {{ isActiveRoute('admin.audit-trail.activity', 'mm-active') }}">
                            <i class="bx bx-bug"></i>
                            <span>Audit Trail</span>
                        </a>
                        <ul class="sub-menu mm-collapse {{ isActiveRoute('admin.audit-trail.system', 'mm-show') }} {{ isActiveRoute('admin.audit-trail.activity', 'mm-show') }}"
                            aria-expanded="false">
                            <li class="{{ isActiveRoute('admin.audit-trail.activity') }}">
                                <a href="{{ route('admin.audit-trail.activity') }}"
                                    class="waves-effect {{ isActiveRoute('admin.audit-trail.activity') }}">
                                    <i class="fas fa-users-cog"></i>
                                    <span>Activity Logs</span>
                                </a>
                            </li>

                            <li class="{{ isActiveRoute('admin.audit-trail.system') }}">
                                <a href="{{ route('admin.audit-trail.system') }}"
                                    class="waves-effect {{ isActiveRoute('admin.audit-trail.system') }}">
                                    <i class="fas fa-list"></i>
                                    <span>System Logs</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    @if (!app()->environment('production'))
                        <li class="menu-title">Environment</li>
                        <li>
                            <a href="javascript: void(0);" class="waves-effect text-danger">
                                <i class="bx bx-code-alt"></i>
                                <span class="badge badge-pill badge-danger float-right">&nbsp;</span>
                                <span class="text-capitalize">{{ app()->environment() }}</span>
                            </a>
                        </li>
                    @endif
                @endhasrole

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
