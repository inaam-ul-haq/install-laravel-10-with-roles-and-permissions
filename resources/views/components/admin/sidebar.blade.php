<!-- Nav Item - Dashboard -->
<li
    class="nav-item {{ request()->route()->getName() =='users.index' ??request()->route()->getName() == 'users.show' ||request()->route()->getName() == 'users.edit'? 'active': '' }}">
    <a class="nav-link" href="{{ route('users.index') }}">
        <i class="fas fa-fw fa-user-alt"></i>
        <span>All users</span></a>
</li>
