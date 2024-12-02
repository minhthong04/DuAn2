@php
    $navCategories = \App\Models\Category::where(['status' => 1, 'show_at_nav' => 1])->get();
@endphp
<header>
    <div class="header-area">
        <div class="main-header">
            <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <!-- Main Menu -->
                        <div class="col-xl-8 col-lg-8 col-md-12 header-flex">
                            <nav>
                                <ul id="navigation" class="d-flex justify-content-start">
                                    <!-- Menu items -->
                                    @foreach ($navCategories as $nav)
                                        <li class="nav-item">
                                            <a href="{{ route('news', ['category' => $nav->slug]) }}" class="nav-link">
                                                {{ $nav->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </nav>
                        </div>
                        <!-- User Section and Social Icons -->
                        <div class="col-xl-4 col-lg-4 col-md-4 d-flex justify-content-end align-items-center">
                            <ul class="header-social d-flex align-items-center">
                                <li><a href="https://www.fb.com/sai4ull"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                            <div class="user-info d-flex align-items-center ml-3">
                                @if (!Auth::check())
                                    <a href="{{ route('login') }}">Login</a>
                                @else
                                    <div class="d-flex">
                                        <div class="d-flex">
                                            <span class="mr-2">Hi,</span>
                                            <span>{{ Auth::user()->name }}</span>
                                        </div>
                                        <div class="ml-3">
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <button type="submit"
                                                    style="outline: none; border: none; background: none; cursor: pointer">
                                                    THOÁT
                                                </button>
                                            </form>
                                        </div>
                                        <div class="ml-3">
                                            @if (Auth::user()->role == 'admin')
                                                <a href="{{ route('admin_dashboard') }}">Dashboard</a>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="nav-search search-switch ml-3 d-flex align-items-center">
                                <i class="fa fa-search"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
