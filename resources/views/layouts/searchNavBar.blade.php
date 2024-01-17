<section class="py-0">
    <div class="container-small">
        <div class="ecommerce-topbar">
            <nav class="navbar navbar-expand-lg navbar-light px-0">
                <div class="row gx-0 gy-2 w-100 flex-between-center">
                    <div class="col-auto">
                        <a class="text-decoration-none" href="/">
                            <div class="d-flex align-items-center">
                                <img src="../../assets/img/icons/logo.png" alt="Pearl" width="27"/>
                                <p class="logo-text ms-2">Pearl</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-auto order-md-1">
                        <ul class="navbar-nav navbar-nav-icons flex-row me-n2">
                            <li class="nav-item d-flex align-items-center">
                                <div class="theme-control-toggle px-2">
                                    <input class="form-check-input ms-0 theme-control-toggle-input" type="checkbox" data-theme-control="phoenixTheme" value="dark" id="themeControlToggle"/>
                                    <label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon" data-feather="moon"></span></label>
                                    <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon" data-feather="sun"></span></label>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link px-2 icon-indicator icon-indicator-primary" href="/cart" role="button">
                                    <span class="text-700" data-feather="shopping-cart" style="height: 20px; width: 20px;"></span>
                                    <span class="icon-indicator-number">{{ Cart::getTotalQuantity() }}</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link px-2" id="navbarDropdownUser" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                                    <span class="text-700" data-feather="user" style="height: 20px; width: 20px;"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border border-300 mt-2" aria-labelledby="navbarDropdownUser">
                                    <div class="card position-relative border-0">
                                        <div class="card-body p-0">
                                            <div class="text-center pt-4 pb-3">
                                                <div class="avatar avatar-xl">
                                                    <img src="../../assets/img/team/72x72/avatar.webp" class="rounded-circle" alt="" />
                                                </div>
                                                @guest
                                                    <h6 class="mt-2 text-black">Not logged</h6>
                                                @else
                                                    <h6 class="mt-2 text-black">{{ Auth::user()->name }}</h6>
                                                @endguest
                                            </div>
                                        </div>
                                        <div class="overflow-auto scrollbar" style="height: 5rem;">
                                            <ul class="nav d-flex flex-column mb-2 pb-1">
                                                @guest
                                                    @if(Route::has('login'))
                                                        <li class="nav-item">
                                                            <a class="nav-link px-3" href="{{ route('login') }}">
                                                                <span class="me-2 text-900" data-feather="log-in"></span>
                                                                <span>Login</span>
                                                            </a>
                                                        </li>
                                                    @endif
                                                    @if(Route::has('register'))
                                                        <li class="nav-item">
                                                            <a class="nav-link px-3" href="{{ route('register') }}">
                                                                <span class="me-2 text-900" data-feather="user-plus"></span>
                                                                <span>Register</span>
                                                            </a>
                                                        </li>
                                                    @endif
                                                @else
                                                    <div class="px-3 p-0">
                                                        <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                            {{ __('Logout') }}
                                                            <span class="me-2" data-feather="log-out"></span>
                                                        </a>
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                            @csrf
                                                        </form>

                                                    </div>
                                                @endguest
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="search-box ecommerce-search-box w-100">
                            <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                                <input class="form-control search-input search form-control-sm" type="search" placeholder="Search" aria-label="Search">
                                <span class="fas fa-search search-box-icon"></span>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</section>
