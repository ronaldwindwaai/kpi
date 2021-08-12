<ul class="nav pcoded-inner-navbar ">
    <li class="nav-item pcoded-menu-caption">
        <label>Navigation</label>
    </li>
    <li class="nav-item">
        <a href="/" class="nav-link "><span class="pcoded-micon"><i
                    class="feather icon-home"></i></span><span class="pcoded-mtext">{{ __('admin/menu.navigation.dashboard') }}</span></a>

    </li>
    @hasrole('super-admin|manager')
    <li class="nav-item pcoded-hasmenu">
        <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                    class="feather icon-align-justify"></i></span><span class="pcoded-mtext">{{ __('admin/menu.navigation.programmes.title') }}</span></a>
        <ul class="pcoded-submenu">
            <li><a href="{{ route('programmes.create') }}">{{ __('admin/menu.navigation.programmes.add') }}</a></li>
            <li><a href="{{ route('programmes.index') }}">{{ __('admin/menu.navigation.programmes.list') }}</a></li>
        </ul>
    </li>
    @endhasrole
    @hasrole('super-admin|manager|officer')
    <li class="nav-item pcoded-hasmenu">
        <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                    class="feather icon-layout"></i></span><span class="pcoded-mtext">{{ __('admin/menu.navigation.projects.title') }}</span></a>
        <ul class="pcoded-submenu">

            <li><a href="{{ route('projects.create') }}">{{ __('admin/menu.navigation.projects.add') }}</a></li>
            <li><a href="{{ route('projects.index') }}">{{ __('admin/menu.navigation.projects.list') }}</a></li>

        </ul>
    </li>
    @endhasrole
    <li class="nav-item pcoded-hasmenu">
        <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                    class="feather icon-briefcase"></i></span><span class="pcoded-mtext">{{ __('admin/menu.navigation.meetings.title') }}</span></a>
        <ul class="pcoded-submenu">
            <li><a href="{{ route('meetings.create') }}">{{ __('admin/menu.navigation.meetings.add') }}</a></li>
            <li><a href="{{ route('meetings.index') }}">{{ __('admin/menu.navigation.meetings.list') }}</a></li>
        </ul>
    </li>
    <li class="nav-item pcoded-hasmenu">
        <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                    class="feather icon-at-sign"></i></span><span class="pcoded-mtext">{{ __('admin/menu.navigation.recordings.title') }}</span><span
                class="pcoded-badge badge badge-success">100+</span></a>
        <ul class="pcoded-submenu">
            <li><a href="{{ route('recordings.create') }}">{{ __('admin/menu.navigation.recordings.add') }}</a></li>
            <li><a href="{{ route('recordings.index') }}">{{ __('admin/menu.navigation.recordings.list') }}</a></li>
        </ul>
    </li>
    <li class="nav-item pcoded-hasmenu">
        <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                    class="feather icon-layers"></i></span><span class="pcoded-mtext">{{ __('admin/menu.navigation.resources.title') }}</span></a>
        <ul class="pcoded-submenu">
            <li><a href="{{ route('resources.create') }}">{{ __('admin/menu.navigation.resources.add') }}</a></li>
            <li><a href="{{ route('resources.index') }}">{{ __('admin/menu.navigation.resources.list') }}</a></li>
        </ul>
    </li>
    <li class="nav-item pcoded-hasmenu">
        <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                    class="feather icon-tablet"></i></span><span class="pcoded-mtext">{{ __('admin/menu.navigation.participants.title') }}</span></a>
        <ul class="pcoded-submenu">
            <li><a href="{{ route('participants.create') }}">{{ __('admin/menu.navigation.participants.add') }}</a></li>
            <li><a href="{{ route('participants.load') }}">{{ __('admin/menu.navigation.participants.import') }}</a></li>
            <li><a href="{{ route('participants.index') }}">{{ __('admin/menu.navigation.participants.list') }}</a></li>
        </ul>
    </li>

    <li class="nav-item pcoded-hasmenu">
        <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                    class="feather icon-tablet"></i></span><span class="pcoded-mtext">{{ __('admin/menu.navigation.partners.title') }}</span></a>
        <ul class="pcoded-submenu">
            <li><a href="{{ route('partners.create') }}">{{ __('admin/menu.navigation.partners.add') }}</a></li>
            <li><a href="{{ route('partners.index') }}">{{ __('admin/menu.navigation.partners.list') }}</a></li>
        </ul>
    </li>
    @role('super-admin')
    <li class="nav-item pcoded-hasmenu">
        <a href="#!" class="nav-link"><span class="pcoded-micon"><i
                    class="feather icon-users"></i></span><span class="pcoded-mtext">{{ __('admin/menu.navigation.users.title') }}</span></a>
        <ul class="pcoded-submenu">
            <li><a href="{{ route('users.show',Auth::user()->id) }}">{{ __('admin/menu.navigation.users.profile') }}</a></li>
            <li><a href="{{ route('users.create') }}">{{ __('admin/menu.navigation.users.add') }} </a></li>
            <li><a href="{{ route('users.index') }}">{{ __('admin/menu.navigation.users.list') }}</a></li>
            <li><a href="{{ route('roles.index') }}">{{ __('admin/menu.navigation.users.list_roles') }}</a></li>
        </ul>
    </li>
    @endrole
    <li class="nav-item pcoded-hasmenu">
        <a href="#!" class="nav-link">
            <span class="pcoded-micon">
                <i class="feather icon-global"></i>
            </span>
            <span class="flag-icon flag-icon-{{Config::get('languages')[App::getLocale()]['flag-icon']}}"></span>
            {{ Config::get('languages')[App::getLocale()]['display'] }}
        </a>
        <ul class="pcoded-submenu">
            @foreach (Config::get('languages') as $lang => $language)
                @if ($lang != App::getLocale())
                    <li>
                        <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"><span class="flag-icon flag-icon-{{$language['flag-icon']}}"></span> {{$language['display']}}</a>
                    </li>
                @endif
            @endforeach
        </ul>
    </li>
</ul>
