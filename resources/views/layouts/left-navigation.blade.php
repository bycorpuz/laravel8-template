<aside id="left-panel">
    <div class="login-info">
        <span>
            <a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
                <img src="{{ asset('images/users/' . 'default.png') }}" alt="{{ asset('images/users/' . 'default.png') }}" class="online" />
                <span style="text-transform: lowercase;">
                    {{ Auth::user()->email }}
                </span>
                <i class="fa fa-angle-down"></i>
            </a>
        </span>
    </div>
    <nav>
        <ul>
            <li class="{!! Request::is('home') ? 'active' : '' !!}">
                <a href="{{ url('/home') }}" title="My Profile"><i class="fa fa-lg fa-fw fa-user"></i> <span class="menu-item-parent">My Profile</span></a>
            </li>

            @can('rbac')
                <li>
                    <a href="#" title="R B A C"><i class="fa fa-lg fa-fw fa-cogs"></i> <span class="menu-item-parent">R B A C</span></a>
                    <ul>
                        <li class="{!! Request::is('roles') ? 'active' : '' !!}">
                            <a href="{{ url('roles') }}" title="Role"><span class="menu-item-parent">Role</span></a>
                        </li>
                        <li class="{!! Request::is('permissions') ? 'active' : '' !!}">
                            <a href="{{ url('permissions') }}" title="Permission"><span class="menu-item-parent">Permission</span></a>
                        </li>
                        <li class="{!! Request::is('role-has-permissions') ? 'active' : '' !!}">
                            <a href="{{ url('role-has-permissions') }}" title="Add Permission to Role"><span class="menu-item-parent">Add Permission to Role</span></a>
                        </li>
                        <li class="{!! Request::is('model-has-permissions') ? 'active' : '' !!}">
                            <a href="{{ url('model-has-permissions') }}" title="Add Permission to User"><span class="menu-item-parent">Add Permission to User</span></a>
                        </li>
                        <li class="{!! Request::is('model-has-roles') ? 'active' : '' !!}">
                            <a href="{{ url('model-has-roles') }}" title="Add Role to User"><span class="menu-item-parent">Add Role to User</span></a>
                        </li>
                    </ul>
                </li>
            @endcan
        </ul>
    </nav>

    <span class="minifyme" data-action="minifyMenu">
        <i class="fa fa-arrow-circle-left hit"></i>
    </span>

</aside>