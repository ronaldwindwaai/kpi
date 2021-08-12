<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar menu-light ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div ">
            <div class="">
                <div class="main-menu-header">
                    <img class="img-radius" src="{{asset('assets/images/user/profile-picture.png')}}" alt="User-Profile-Image">
                    <div class="user-details">
                        <div id="more-details">{{ ucwords(Auth::user()->name) }} <i class="fa fa-caret-down"></i></div>
                    </div>
                </div>
                <div class="collapse" id="nav-user-link">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="{{ route('users.show',Auth::user()->id) }}" data-toggle="tooltip"
                                title="View Profile"><i class="feather icon-user"></i></a></li>
                        <li class="list-inline-item"><a href="email_inbox.html"><i class="feather icon-mail"
                                    data-toggle="tooltip" title="Messages"></i><small
                                    class="badge badge-pill badge-primary">5</small></a></li>
                        <li class="list-inline-item">
                            <form id="logout" method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="#" onclick="document.getElementById('logout').submit();" data-toggle="tooltip" title="Logout" class="text-danger"><i
                                    class="feather icon-power"></i></a>
                            </form>

                        </li>
                    </ul>
                </div>
            </div>

           @include('shared.main-menu')

            <div class="card text-center">
                <div class="card-block">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="feather icon-sunset f-40"></i>
                    <h6 class="mt-3">{{ __('admin/menu.navigation.support.help') }}</h6>
                    <p>{{ __('admin/menu.navigation.support.contact') }}</p>
                    <a href="{{ route('supports.create') }}" target="_blank"
                        class="btn btn-primary btn-sm text-white m-0"><i class="flag flag-united-states"></i>{{ __('admin/menu.navigation.support.title') }}</a>
                </div>
            </div>

        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->
