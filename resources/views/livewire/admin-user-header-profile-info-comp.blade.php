<div>
    @if( Auth::guard('admin')->check() )
    <div class="user-info-dropdown">
        <div class="dropdown">
            <a
                class="dropdown-toggle"
                href="#"
                role="button"
                data-toggle="dropdown"
            >
                <span class="user-icon">
                    <img src="{{ $admin->picture }}" alt="" />
                </span>
                <span class="user-name">{{ $admin->name }}</span>
            </a>
            <div
                class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
            >
                <a class="dropdown-item" href="{{ route('admin.profile') }}"
                    ><i class="dw dw-user1"></i> Mon profil</a
                >
                <a class="dropdown-item" href="#"
                    ><i class="dw dw-settings2"></i> Paramètres</a
                >
                <a class="dropdown-item" href="faq.html"
                    ><i class="dw dw-help"></i> Aide</a
                >

                <a class="dropdown-item" href="{{ route('admin.logout') }}"
                    onclick="event.preventDefault();document.getElementById('adminLogoutForm').submit();"
                    ><i class="dw dw-logout"></i> Déconnexion</a
                >
                <form action="{{ route('admin.logout') }}" id="adminLogoutForm" method="POST">
                    @csrf
                </form>
            </div>
        </div>
    </div>
    @elseif( Auth::guard('seller')->check() )
    <div class="user-info-dropdown">
        <div class="dropdown">
            <a
                class="dropdown-toggle"
                href="#"
                role="button"
                data-toggle="dropdown"
            >
                <span class="user-icon">
                    <img src="{{ $admin->picture }}" alt="" />
                </span>
                <span class="user-name">{{ $admin->name }}</span>
            </a>
            <div
                class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
            >
                <a class="dropdown-item" href="{{ route('admin.profile') }}"
                    ><i class="dw dw-user1"></i> Mon profil</a
                >
                <a class="dropdown-item" href="#"
                    ><i class="dw dw-settings2"></i> Paramètres</a
                >
                <a class="dropdown-item" href="faq.html"
                    ><i class="dw dw-help"></i> Aide</a
                >

                <a class="dropdown-item" href="{{ route('admin.logout') }}"
                    onclick="event.preventDefault();document.getElementById('adminLogoutForm').submit();"
                    ><i class="dw dw-logout"></i> Déconnexion</a
                >
                <form action="{{ route('admin.logout') }}" id="adminLogoutForm" method="POST">
                    @csrf
                </form>
            </div>
        </div>
    </div>
    @endif
</div>
