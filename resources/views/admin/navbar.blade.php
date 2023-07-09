<div class="logo">
            <div class="logo-image">
                <img src="{{ asset('/sicatatmentahan/logo.png') }}" alt="">
            </div>
            <div class="logo-name">
                Admin
            </div>
        </div>

        <div class="menu-items">
            <ul class="navLinks ">
                <li class="navList {{ request()->is('/') ? 'active' : '' }}">
                    <a href="/">
                        <ion-icon name="home-outline"></ion-icon>
                        <span class="links">Dashboard</span>
                    </a>
                </li>
                <li class="navList {{ request()->is('detailaplikasi') ? 'active' : '' }}">
                    <a href="/detailaplikasi">
                        <ion-icon name="folder-outline"></ion-icon>
                        <span class="links">Daftar Aplikasi</span>
                    </a>
                </li>
                <li class="navList {{ request()->is('reportaplikasi') ? 'active' : '' }}">
                    <a href="/reportaplikasi">
                        <ion-icon name="analytics-outline"></ion-icon>
                        <span class="links">Report</span>
                    </a>
                </li>
                <li class="navList {{ request()->is('settingsicatat') ? 'active' : '' }} ">
                    <a href="/settingsicatat">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                        <span class="links">Settings</span>
                    </a>
                </li>
            </ul>
            <ul class="bottom-link">
                <li>
                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> 
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                        <ion-icon name="log-out-outline"></ion-icon>
                        <span id="logout-form" action="{{ route('logout') }}" method="POST" class="links">Logout @csrf </span>
                    </a>
                </li>
                <li class="mode">
                   <a href="#">
                       <div class="darkToggle">
                            <!--<span class="switch"></span> --> 
                        </div>
                    </a>
                </li> 
            </ul>
        </div>