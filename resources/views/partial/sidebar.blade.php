<div class="app-sidebar">
    @if (auth()->user()->role == 'courier')
        <a href="/courier_dashboard" class="app-sidebar-link {{ request()->is('courier_dashboard') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                <polyline points="9 22 9 12 15 12 15 22" />
            </svg>
        </a>
        <a href="/document_delivery" class="app-sidebar-link {{ request()->is('document_delivery') ? 'active' : '' }}">
            <img class="link-icon" src="{{ asset('asset/delivery-svgrepo-com.svg') }}" alt="" width="60%">
        </a>
        <a href="/recap-pengiriman" class="app-sidebar-link {{ request()->is('recap-pengiriman') ? 'active' : '' }}">
            <img class="link-icon" src="{{ asset('asset/export-svgrepo-com.svg') }}" alt="" width="60%">
        </a>
    @elseif (auth()->user()->role == 'admin')
        <a href="/admin_dashboard" class="app-sidebar-link {{ request()->is('admin_dashboard') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                <polyline points="9 22 9 12 15 12 15 22" />
            </svg>
        </a>
        <a href="/users" class="app-sidebar-link {{ request()->is('users') ? 'active' : '' }}">
            <img class="link-icon" src="{{ asset('asset/user-svgrepo-com.svg') }}" alt="" width="60%">
        </a>
        <a href="/locations" class="app-sidebar-link {{ request()->is('locations') ? 'active' : '' }}">
            <img class="link-icon" src="{{ asset('asset/office-reader-svgrepo-com.svg') }}" alt="" width="60%">
        </a>
        <a href="/report-pengiriman-admin" class="app-sidebar-link {{ request()->is('report-pengiriman-admin') ? 'active' : '' }}">
            <img class="link-icon" src="{{ asset('asset/export-svgrepo-com.svg') }}" alt="" width="60%">
        </a>
    @endif
</div>