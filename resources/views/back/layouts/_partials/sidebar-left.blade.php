<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.html">
            <img src="/dashbtempl/vendors/images/deskapp-logo.svg" alt="" class="dark-logo" />
            <img
                src="/dashbtempl/vendors/images/deskapp-logo-white.svg"
                alt=""
                class="light-logo"
            />
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li class="dropdown">
                    <a href="{{ route('admin.home') }}" class="dropdown-toggle no-arrow
                        {{ Route::is('admin.home') ? 'active' : '' }}">
                        <!-- <span class="micon bi bi-house"></span> -->
                        <span class="micon fa fa-home"></span
                        ><span class="mtext">Accueil</span>
                    </a>
                </li>

                @if ( Route::is('admin.*') )
                <li>
                    <a href="{{ route('admin.operation-type') }}" class="dropdown-toggle no-arrow
                        {{ Route::is('admin.operation-type') ? 'active' : '' }}"
                    >
                        <span class="micon bi bi-receipt-cutoff"></span
                        ><span class="mtext">Types d'OP</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.operation-create') }}" class="dropdown-toggle no-arrow
                        {{ Route::is('admin.operation-create') ? 'active' : '' }}"
                    >
                        <span class="micon bi bi-receipt-cutoff"></span
                        ><span class="mtext">Opérations</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.fee') }}" class="dropdown-toggle no-arrow
                        {{ Route::is('admin.fee') ? 'active' : '' }}">
                        <span class="micon bi bi-receipt-cutoff"></span
                        ><span class="mtext">Frais</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.fee') }}" class="dropdown-toggle no-arrow
                        {{ Route::is('admin.fee') ? 'active' : '' }}">
                        <span class="micon bi bi-receipt-cutoff"></span
                        ><span class="mtext">Clients</span>
                    </a>
                </li>
                @endif

                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    <div class="sidebar-small-cap">Extra</div>
                </li>
                <li>
                    <a href="{{ route('admin.profile') }}" class="dropdown-toggle no-arrow
                        {{ Route::is('admin.profile') ? 'active' : '' }}">
                        <span class="micon fa fa-user"></span
                        ><span class="mtext">Profil</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
