<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <form class="form-header" action="" method="POST">
                    <input class="au-input au-input--xl" type="hidden" name="search" placeholder="Search for datas &amp; reports..." />
                    
                </form>
                <div class="header-button">
                    <div class="noti-wrap">
                        
                    </div>
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                @if(Auth::user()->roles_id==2)
                                    @if($pendaftar->foto==null)
                                    <img src="{{asset('images/icon/avatar-01.jpg')}}" alt="John Doe" />
                                    @else
                                    <img src="{{asset('storage/foto_diri/'.$pendaftar->foto)}}" alt="John Doe" />
                                    @endif
                                @else
                                        <img src="{{asset('images/icon/avatar-01.jpg')}}" alt="John Doe" />
                                @endif
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#">{{ Auth::user()->username }}</a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        @if(Auth::user()->roles_id==2)
                                            @if($pendaftar->foto==null)
                                            <img src="{{asset('images/icon/avatar-01.jpg')}}" alt="John Doe" />
                                            @else
                                            <img src="{{asset('storage/foto_diri/'.$pendaftar->foto)}}" alt="John Doe" />
                                            @endif
                                        @else
                                                <img src="{{asset('images/icon/avatar-01.jpg')}}" alt="John Doe" />
                                        @endif
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <p>{{ Auth::user()->username }}</p>
                                        </h5>
                                        <span class="email">{{ Auth::user()->email }}</span>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    
                                </div>
                                <div class="account-dropdown__footer">
                                    <a href="/logout" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="zmdi zmdi-power"></i>Logout
                                    </a>
                                    <form id="logout-form" action="/logout" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>