<div class="vertical-menu">

    <div data-simplebar class="h-100">

        @php
            $user = Auth::user();
        @endphp

        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div class="">
                <img src="{{ asset('backend/assets/images/users/logo-admin.jpg') }}" alt="" class="avatar-md rounded-circle">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1">{{ $user->name }}</h4>
                <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.kegiatan.index') }}" class="waves-effect">
                        <i class="ri-article-line"></i>
                        <span>Kegiatan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.wisata.index') }}" class="waves-effect">
                        <i class="ri-map-2-line"></i>
                        <span>Wisata</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.usaha.index') }}" class="waves-effect">
                        <i class="ri-vip-diamond-line"></i>
                        <span>Usaha</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.staff.index') }}" class="waves-effect">
                        <i class="ri-group-line"></i>
                        <span>Staff</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.finance.index') }}" class="waves-effect">
                        <i class="ri-funds-box-line"></i>
                        <span>Finance</span>
                    </a>
                </li>

                <li class="menu-title">Admin</li>

                <li>
                    <a href="{{ route('admin.user.index') }}" class="waves-effect">
                        <i class="ri-group-line"></i>
                        <span>User</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="waves-effect">
                        <i class="ri-settings-4-line"></i>
                        <span>Setting</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
