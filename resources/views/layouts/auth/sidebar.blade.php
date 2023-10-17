<nav id="sidebar" class="sidebar"><a class="sidebar-brand" href="{{ route('auth') }}">
        <svg>
            <use xlink:href="#ion-ios-pulse-strong"></use>
        </svg>
        {{ config('app.name') }}
    </a>
    <div class="sidebar-content">
        <div class="sidebar-user">
            <img src="" class="img-fluid rounded-circle mb-2" alt="{{ auth()->user()->name }} profile" />
            <div class="fw-bold">{{ auth()->user()->name }}</div>
            <small>Welcome to {{ ucfirst(auth()->user()->roles[0]->name) }} panel</small>
        </div>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Main
            </li>

            <li class="sidebar-item  {{ request()->route()->getName() == 'auth'? 'active': '' }}">
                <a class="sidebar-link" href="{{ route('auth') }}">
                    <i class="align-middle me-2 fas fa-fw fa-home"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            @hasrole('admin')
                <x-admin.sidebar />
            @endhasrole
        </ul>
    </div>
</nav>
