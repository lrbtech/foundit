  <header class="ps-main-header">
        <nav>
            <div class="navbar navbar-expand-lg navbar-light ps-navbar">
                <div class="ps-navbar__header">
                    <a href="/" class="navbar-brand">
                        <img src="/images/logo.png" alt="Image Description">
                    </a>
                    <div id="ps-nav" class="ps-nav navbar-expand-lg">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="lnr lnr-menu"></i>
                        </button>
                        <div class="collapse navbar-collapse ps-navigation" id="navbarNav">
                            <ul class="navbar-nav nav-Js ml-auto ps-nav ps-nav__ul">
                                <li class="ps-menuhover menu-item-has-children page_item_has_children">
                                    <a href="/about" class="ps-header__line">About <i class="fas fa-chevron-down"></i></a>
                                    <ul class="sub-menu ps-dropdown ps-first__dropdown">
                                        <li class="nav-item"><a href="/how-it-works">How it works</a></li>
                                        <li class="dropdown-divider"></li>
                                        <li class="nav-item"><a href="/our-story">Our story</a></li> 
                                        <li class="dropdown-divider"></li>
                                        <li class="dropdown-divider"></li>
                                        <li class="nav-item"><a href="/auto-dealerships">Auto dealerships</a></li> 
                                        <li class="dropdown-divider"></li>
                                        <li class="nav-item"><a href="/trust-saftey">Trust & safety</a></li> 
                                        <li class="dropdown-divider"></li>
                                        <li class="nav-item"><a href="/terms">Terms</a></li> 
                                        <li class="dropdown-divider"></li>
                                        <li class="nav-item"><a href="/community">Community</a></li> 
                                        <li class="dropdown-divider"></li>
                                        <li class="nav-item"><a href="/blog">Blog</a></li> 
                                    </ul>
                                </li>
                                <li class="nav-item"><a href="/category">Categories</a></li>
                                {{-- <li class="nav-item"><a href="contact.html">Contact</a></li>
                                <li class="ps-menuhover menu-item-has-children page_item_has_children">
                                    <a href="javascript:void(0);"><span class="lnr lnr-menu"></span></a>
                                    <ul class="ps-dropdown sub-menu">
                                        <li>
                                            <a href="about.html">About</a>
                                        </li>
                                        <li class="dropdown-divider"></li>
                                        <li class="current-menu-item">
                                            <a href="privacy-info.html">Privacy Info</a>
                                        </li>
                                        <li class="dropdown-divider"></li>
                                        <li class="ps-menuhover ps-submenuhover menu-item-has-children page_item_has_children">
                                            <a href="javascript:void(0);">Blog<i class="ti-angle-right"></i></a>
                                            <ul class="ps-dropdown ps-submenu sub-menu">
                                                <li class="nav-item"><a href="blog-grid.html">Blog Grid</a></li>                             
                                                <li class="dropdown-divider"></li>
                                                <li class="nav-item"><a href="blog-single.html">Blog Single</a></li>  
                                            </ul>
                                        </li>
                                        <li class="dropdown-divider"></li>
                                        <li class="nav-item ps-menuhover ps-submenuhover menu-item-has-children page_item_has_children">
                                            <a href="javascript:void(0);">Listing <i class="ti-angle-right"></i></a>
                                            <ul class="ps-dropdown ps-submenu sub-menu">
                                                <li class="nav-item"><a href="listing-grid.html">Listing Grid</a></li>                             
                                                <li class="dropdown-divider"></li>
                                                <li class="nav-item"><a href="listing-list.html">Listing List</a></li>  
                                                <li class="dropdown-divider"></li>
                                                <li class="nav-item"><a href="listing-single.html">Listing Single</a></li>  
                                            </ul>
                                        </li>
                                        <li class="dropdown-divider"></li>
                                        <li class="nav-item"><a href="login.html">Login</a></li>
                                        <li class="dropdown-divider"></li>
                                        <li class="nav-item"><a href="coming-soon.html">Coming Soon</a></li>
                                        <li class="dropdown-divider"></li>
                                        <li class="nav-item"><a href="404-error.html">404 Error</a></li>
                                    </ul>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="ps-navbar__userbtn">
                        <div class="ps-headeruser">              
                            <ul class="navbar-nav ps-nav">
                                
                                <li class="nav-item ps-login--btn"><a href="javascript:void(null)" class="btn ps-btn" data-toggle="modal" data-target="#exampleModal">Login / Register</a></li>
                                
                                <li class="nav-item dropdown ps-menuhover ps-userlogo">
                                    <a href="javascript:void(0);" id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <!-- <figure class="d-inline-block">
                                            <img src="/images/user-logo.jpg" alt="Image Description">
                                        </figure> -->
                                        @if(Auth::check())
                                        <figure class="d-inline-block"><img style="width:50px;" src="/upload_profile_image/{{Auth::user()->profile_image}}"></figure>
                                        @else
                                        <figure class="d-inline-block"><img src="/images/user-icon/img-02.png"></figure>
                                        @endif
                                    <span><i class="fas fa-chevron-down"></i></span>
                                    </a>
                                    <ul class="dropdown-menu ps-dropdown ps-user__dropdown position-absolute" aria-labelledby="navbarDropdown4">
                                        <li class="nav-item"><a class="dropdown-item" href="/customer/dashboard"><i class="ti-dashboard"></i>Dashboard</a></li>                             
                                        <li class="dropdown-divider"></li>
                                        <li class="nav-item"><a class="dropdown-item" href="/customer/profile-settings"><i class="ti-user"></i>Profile Settings</a></li>
                                        <li class="dropdown-divider"></li>
                                        <li class="nav-item"><a class="dropdown-item" href="/customer/my-ads"><i class="ti-align-justify"></i>My Ads</a></li>  
                                        <li class="dropdown-divider"></li>
                                        <li class="nav-item"><a class="dropdown-item" href="/customer/new-post-ads"><i class="ti-settings"></i>Post Ads</a></li>  
                                        <li class="dropdown-divider"></li>
                                        <li class="nav-item"><a class="dropdown-item" href="/customer/chat"><i class="ti-email"></i>chat</a></li>  
                                        <li class="dropdown-divider"></li>
                                        <li class="nav-item"><a class="dropdown-item" href="/customer/packages"><i class="ti-shopping-cart"></i>Buy New Packages</a></li>  
                                        <li class="dropdown-divider"></li>
                                        {{-- <li class="nav-item"><a class="dropdown-item" href="/customer/favorite"><i class="ti-user"></i>Payments</a></li>  
                                        <li class="dropdown-divider"></li> --}}
                                        <li class="nav-item"><a class="dropdown-item" href="/customer/favorite"><i class="ti-heart"></i>My Favorite</a></li>  
                                        <li class="dropdown-divider"></li>
                                        {{-- <li class="nav-item dropdown ps-menuhover ps-submenuhover">
                                            <a class="dropdown-item" href="javascript:void(0);" id="navbarDropdown5" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ti-heart"></i>My Favorite <i class="ti-angle-right ps-right"></i>
                                            </a>
                                            <ul class="dropdown-menu ps-dropdown ps-submenu navbar-nav" aria-labelledby="navbarDropdown5">
                                                <li class="nav-item"><a class="dropdown-item" href="dashboard-my-favorite.html">Favorite Listing</a></li>                             
                                                <li class="dropdown-divider"></li>
                                                <li class="nav-item"><a class="dropdown-item" href="javascript:void(0);">Sub Menu</a></li>
                                            </ul>
                                        </li>  --}}
                                        <li class="dropdown-divider"></li>
                                        <li class="nav-item"><a class="dropdown-item" href="/customer/account-privacy"><i class="ti-bookmark"></i>Account Setting</a></li>  
                                        <li class="dropdown-divider"></li>
                                        <li class="nav-item">
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="ti-shift-right"></i>Log Out</a>
                                        </li> 
                    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                        </form>

                                    </ul>
                                </li>
                                                          
                                <li class="nav-item ps-post--btn">
                                    <a href="/customer/new-post-ads" class="btn ps-btn">Post Ad</a></li>
                                    <li class="ps-menuhover menu-item-has-children page_item_has_children">
                                    <a href="javascript:void(0);" >English <i class="fas fa-chevron-down"></i></a>
                                    <ul class="sub-menu ps-dropdown ps-first__dropdown">
                                        <li class="nav-item"><a href="javascript:void(null)" style="color:green">English</a></li>
                                        <li class="dropdown-divider"></li>
                                        <li class="nav-item"><a href="javascript:void(null)">Arabic</a></li>
                                        <li class="dropdown-divider"></li>                                       
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>