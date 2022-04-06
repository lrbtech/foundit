<section class="dash-header-part">
    <div class="container">
        <div class="dash-header-card">
            <div class="row">
                <div class="col-lg-5">
                    <div class="dash-header-left">
                        @if($user->profile_image == '')
                        <div class="dash-avatar"><a href="#"><img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png" alt="{{$user->first_name}} {{$user->last_name}}"></a></div>
                        @else 
                        <div class="dash-avatar"><a href="#"><img src="/upload_profile_image/{{$user->profile_image}}" alt="{{$user->first_name}} {{$user->last_name}}"></a></div>
                        @endif
                        <div class="dash-intro">
                            <h4><a href="#">{{$user->first_name}} {{$user->last_name}}</a></h4>
                            <!-- <h5>new seller</h5> -->
                            <ul class="dash-meta">
                                <li><i class="fas fa-phone-alt"></i><span>{{$user->mobile}}</span></li>
                                <li><i class="fas fa-envelope"></i><span>{{$user->email}}</span></li>
                                <li><i class="fas fa-map-marker-alt"></i><span>{{$user->address}}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="dash-header-right">
                        <div class="dash-focus dash-list">
                            <h2>{{$post_ads_count}}</h2>
                            <p>{{$language[104][session()->get('lang')]}}</p>
                        </div>
                        <div class="dash-focus dash-book">
                            <h2>{{$bookmark_count}}</h2>
                            <p>{{$language[103][session()->get('lang')]}}</p>
                        </div>
                        <div class="dash-focus dash-rev">
                            <h2>{{$reviews_count}}</h2>
                            <p>{{$language[105][session()->get('lang')]}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="dash-header-alert alert fade show">
                        <p>From your account dashboard. you can easily check & view your recent orders, manage your
                            shipping and billing addresses and Edit your password and account details.</p><button
                            data-dismiss="alert"><i class="fas fa-times"></i></button>
                    </div>
                </div>
            </div> -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="dash-menu-list">
                        {{--@if(Auth::user()->package_id != 0)--}}
                        <ul>
                            <li><a class="dashboard" href="/customer/dashboard">{{$language[3][session()->get('lang')]}}</a></li>
                            <li><a class="profile" href="/customer/profile">{{$language[122][session()->get('lang')]}}</a></li>
                            <li><a class="post-ad" href="/customer/create-post-ad">{{$language[123][session()->get('lang')]}}</a></li>
                            <li><a class="my-ads" href="/customer/my-ads">{{$language[124][session()->get('lang')]}}</a></li>
                            <!-- <li><a class="packages" href="/customer/packages">{{$language[125][session()->get('lang')]}}</a></li> -->
                            <li><a class="settings" href="/customer/settings">{{$language[126][session()->get('lang')]}}</a></li>
                            <li><a class="bookmark" href="/customer/bookmark">{{$language[127][session()->get('lang')]}}</a></li>
                            <li><a class="search-history" href="/customer/search-history">Search History</a></li>
                            <li><a class="chat" href="/customer/message">{{$language[128][session()->get('lang')]}}</a></li>
                            <li><a class="chat-admin" href="/customer/chat-admin">Talk to Foundit</a></li>
                            <li class="nav-item">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="ti-shift-right"></i>{{$language[129][session()->get('lang')]}}</a>
                            </li> 
        
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            </form>
                        </ul>
                        {{--@else
                        <ul>
                            <li><a class="dashboard" href="/customer/dashboard">dashboard</a></li>
                            <li><a class="packages" href="/customer/packages">Packages</a></li>
                            <!-- <li><a class="notification" href="/customer/notification">notification</a></li> -->
                            <li class="nav-item">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="ti-shift-right"></i>Log Out</a>
                            </li> 
        
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            </form>
                        </ul>
                        @endif--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>