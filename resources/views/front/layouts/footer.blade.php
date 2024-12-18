<!-- Footer -->

@php

$public_setting = \App\Models\admin\PublicSetting::first();
$socialmedia = \App\Models\admin\SocialMedia::first();
@endphp
<footer id="footer" class="footer md-pb-70">
    <div class="footer-wrap">
        <div class="footer-body">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-md-6 col-12">
                        <div class="footer-newsletter footer-col-block">
                            <div class="footer-heading footer-heading-desktop">
                                <h6> {{$public_setting['website_name']}} </h6>
                            </div>
                            <div class="footer-heading footer-heading-moblie">
                                <h6> {{$public_setting['website_name']}} </h6>
                            </div>
                            <p class="tf-collapse-content">
                               {{$public_setting['website_description']}}
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-12">
                        <div class="footer-heading footer-heading-desktop">
                            <h6> تواصل معنا </h6>
                        </div>
                        <div class="footer-heading footer-heading-moblie">
                            <h6> تواصل معنا </h6>
                        </div>
                        <ul>
                            <li>
                                <p>البريد الالكتروني : <a href="mailto:{{$public_setting['website_email']}}">{{$public_setting['website_email']}}</a></p>
                            </li>
                            <li>
                                <p>رقم الهاتف : <a href="tel:{{$public_setting['website_phone']}}"> {{$public_setting['website_phone']}} </a></p>
                            </li>
                        </ul>
                        <ul class="tf-social-icon d-flex gap-10">
                            @if($socialmedia['facebook'] !='')
                            <li><a href="{{$socialmedia['facebook']}}" class="box-icon w_34 round social-facebook social-line"><i
                                        class="icon fs-14 icon-fb"></i></a></li>
                            @endif

                                @if($socialmedia['x-twitter'] !='')
                            <li><a href="{{$socialmedia['x-twitter']}}" class="box-icon w_34 round social-twiter social-line"><i
                                        class="icon fs-12 icon-Icon-x"></i></a></li>
                                @endif
                                @if($socialmedia['instagram'] !='')
                            <li><a href="{{$socialmedia['instagram']}}" class="box-icon w_34 round social-instagram social-line"><i
                                        class="icon fs-14 icon-instagram"></i></a></li>
                                @endif
                                @if($socialmedia['tiktok'] !='')
                            <li><a href="{{$socialmedia['tiktok']}}" class="box-icon w_34 round social-tiktok social-line"><i
                                        class="icon fs-14 icon-tiktok"></i></a></li>
                                @endif
                        </ul>
                    </div>
                    <div class="col-xl-3 col-md-6 col-12 footer-col-block">
                        <div class="footer-heading footer-heading-desktop">
                            <h6> روابط </h6>
                        </div>
                        <div class="footer-heading footer-heading-moblie">
                            <h6> روابط </h6>
                        </div>
                        <ul class="footer-menu-list tf-collapse-content">
                            <li>
                                <a href="privacy-policy.html" class="footer-menu_item"> شروط الاستخدام </a>
                            </li>
                            <li>
                                <a href="delivery-return.html" class="footer-menu_item"> التوصيل والارجاع </a>
                            </li>
                            <li>
                                <a href="shipping-delivery.html" class="footer-menu_item"> الاسئلة الشائعة </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div
                            class="footer-bottom-wrap d-flex gap-20 flex-wrap justify-content-between align-items-center">
                            <div class="footer-menu_item"> جميع الحقوق محفوظة © 2024 {{$public_setting['website_name']}} .</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- /Footer -->

</div>

<!-- gotop -->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
              style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 286.138;"></path>
    </svg>
</div>
<!-- /gotop -->

<!-- toolbar-bottom -->
<div class="tf-toolbar-bottom type-1150">
    <div class="toolbar-item">
        <a href="{{url('/')}}">
            <div class="toolbar-icon">
                <i class="icon-home"></i>
            </div>
            <div class="toolbar-label"> الرئيسية  </div>
        </a>
    </div>
    <div class="toolbar-item">
        <a href="{{url('shop')}}">
            <div class="toolbar-icon">
                <i class="icon-shop"></i>
            </div>
            <div class="toolbar-label"> المتجر</div>
        </a>
    </div>

    {{--    <div class="toolbar-item">--}}
    {{--        <a href="#canvasSearch" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft">--}}
    {{--            <div class="toolbar-icon">--}}
    {{--                <i class="icon-search"></i>--}}
    {{--            </div>--}}
    {{--            <div class="toolbar-label">Search</div>--}}
    {{--        </a>--}}
    {{--    </div>--}}
    {{--    <div class="toolbar-item">--}}
    {{--        <a href="#login" data-bs-toggle="modal">--}}
    {{--            <div class="toolbar-icon">--}}
    {{--                <i class="icon-account"></i>--}}
    {{--            </div>--}}
    {{--            <div class="toolbar-label">Account</div>--}}
    {{--        </a>--}}
    {{--    </div>--}}

    @php
        $wishlistCount = \App\Models\front\wishlist::wishlistitems()->count();
        $cartCount = \App\Models\front\Cart::getcartitems()->count();

    @endphp

    <div class="toolbar-item">
        <a href="{{url('wishlist')}}">
            <div class="toolbar-icon nav-wishlist">
                <i class="icon-heart"></i>
                <div class="toolbar-count count-box">{{$wishlistCount}}</div>
            </div>
            <div class="toolbar-label"> المفضلة</div>
        </a>
    </div>
    <div class="toolbar-item">
        <a href="{{url('cart')}}">
            <div class="toolbar-icon nav-cart">
                <i class="icon-bag"></i>
                <div class="toolbar-count count-box">{{$cartCount}}</div>
            </div>
            <div class="toolbar-label"> السلة</div>
        </a>
    </div>
</div>
<!-- /toolbar-bottom -->


<!-- mobile menu -->
<div class="offcanvas offcanvas-start canvas-mb" id="mobileMenu">
    <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
    <div class="mb-canvas-content">
        <div class="mb-body">
            <ul class="nav-ul-mb" id="wrapper-menu-navigation">

                <li class="nav-mb-item">
                    <a href="{{url('/')}}" class="mb-menu-link"> الرئيسية </a>
                </li>
                <li class="nav-mb-item">
                    <a href="{{url('/shop')}}" class="mb-menu-link"> المتجر </a>
                </li>
                <li class="nav-mb-item">
                    <a href="#dropdown-menu-five" class="collapsed mb-menu-link current" data-bs-toggle="collapse"
                       aria-expanded="true" aria-controls="dropdown-menu-five">
                        <span>التصنيفات</span>
                        <span class="btn-open-sub"></span>
                    </a>
                    <div id="dropdown-menu-five" class="collapse">
                        <ul class="sub-nav-menu">
                            @php
                                $categories = \App\Models\admin\MainCategory::select('name','slug')->where('status',1)-> get();
                            @endphp
                            @foreach($categories as $category)
                                <li><a href="{{url('collection/'.$category['slug'])}}"
                                       class="sub-nav-link">{{$category['name']}}</a></li>
                            @endforeach
                        </ul>
                    </div>

                </li>
                <li class="nav-mb-item">
                    <a href="{{url('/cart')}}" class="mb-menu-link"> سلة الشراء </a>
                </li>
                <li class="nav-mb-item"><a
                        href="{{url('faq')}}"
                        class="mb-menu-link"> الاسئلة الشائعة  </a></li>
            </ul>
            <div class="mb-other-content">
                <div class="mb-notice">
                    <a class="text-need"> تريد مساعدة </a>
                </div>
                <ul class="mb-info">
                    <li> العنوان : {{$public_setting['website_address']}}</li>
                    <li> البريد الالكتروني : <b> {{$public_setting['website_email']}} </b></li>
                    <li> رقم الهاتف : <b>  {{$public_setting['website_phone']}} </b></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /mobile menu -->

<!-- modal login -->
<div class="modal modalCentered fade form-sign-in modal-part-content" id="login">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="header">
                <div class="demo-title">Log in</div>
                <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
            </div>
            <div class="tf-login-form">
                <form class="" action="https://themesflat.co/html/ecomus/my-account.html" accept-charset="utf-8">
                    <div class="tf-field style-1">
                        <input class="tf-field-input tf-input" placeholder=" " type="email" name="">
                        <label class="tf-field-label" for="">Email *</label>
                    </div>
                    <div class="tf-field style-1">
                        <input class="tf-field-input tf-input" placeholder=" " type="password" name="">
                        <label class="tf-field-label" for="">Password *</label>
                    </div>
                    <div>
                        <a href="#forgotPassword" data-bs-toggle="modal" class="btn-link link">Forgot your password?</a>
                    </div>
                    <div class="bottom">
                        <div class="w-100">
                            <button type="submit"
                                    class="tf-btn btn-fill animate-hover-btn radius-3 w-100 justify-content-center">
                                <span>Log in</span></button>
                        </div>
                        <div class="w-100">
                            <a href="#register" data-bs-toggle="modal" class="btn-link fw-6 w-100 link">
                                New customer? Create your account
                                <i class="icon icon-arrow1-top-left"></i>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal modalCentered fade form-sign-in modal-part-content" id="forgotPassword">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="header">
                <div class="demo-title">Reset your password</div>
                <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
            </div>
            <div class="tf-login-form">
                <form class="">
                    <div>
                        <p>Sign up for early Sale access plus tailored new arrivals, trends and promotions. To opt out,
                            click unsubscribe in our emails</p>
                    </div>
                    <div class="tf-field style-1">
                        <input class="tf-field-input tf-input" placeholder=" " type="email" name="">
                        <label class="tf-field-label" for="">Email *</label>
                    </div>
                    <div>
                        <a href="#login" data-bs-toggle="modal" class="btn-link link">Cancel</a>
                    </div>
                    <div class="bottom">
                        <div class="w-100">
                            <button type="submit"
                                    class="tf-btn btn-fill animate-hover-btn radius-3 w-100 justify-content-center">
                                <span>Reset password</span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal modalCentered fade form-sign-in modal-part-content" id="register">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="header">
                <div class="demo-title">Register</div>
                <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
            </div>
            <div class="tf-login-form">
                <form class="">
                    <div class="tf-field style-1">
                        <input class="tf-field-input tf-input" placeholder=" " type="text" name="">
                        <label class="tf-field-label" for="">First name</label>
                    </div>
                    <div class="tf-field style-1">
                        <input class="tf-field-input tf-input" placeholder=" " type="text" name="">
                        <label class="tf-field-label" for="">Last name</label>
                    </div>
                    <div class="tf-field style-1">
                        <input class="tf-field-input tf-input" placeholder=" " type="email" name="">
                        <label class="tf-field-label" for="">Email *</label>
                    </div>
                    <div class="tf-field style-1">
                        <input class="tf-field-input tf-input" placeholder=" " type="password" name="">
                        <label class="tf-field-label" for="">Password *</label>
                    </div>
                    <div class="bottom">
                        <div class="w-100">
                            <a href="register.html"
                               class="tf-btn btn-fill animate-hover-btn radius-3 w-100 justify-content-center"><span>Register</span></a>
                        </div>
                        <div class="w-100">
                            <a href="#login" data-bs-toggle="modal" class="btn-link fw-6 w-100 link">
                                Already have an account? Log in here
                                <i class="icon icon-arrow1-top-left"></i>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /modal login -->
<!-- shoppingCart -->


<div class="modal fullLeft fade modal-shopping-cart" id="shoppingCart" tabindex="-1" aria-labelledby="shoppingCartLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="header">
                <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                <div class="title fw-5"> سلة المشتريات</div>
            </div>
            <div class="cart-items-container">
                    @include('front.partials.cart_items')
            </div>
        </div>
    </div>
</div>
<!-- /shoppingCart -->

<!-- modal quick_view -->
<div class="modal fade modalDemo show" id="quick_view">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" id="modal-content">
            <!-- ################ Model Content Here ######################## -->
        </div>
    </div>
</div>
<!-- /modal quick_view -->

<!-- Javascript -->
<script type="text/javascript" src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/front/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/front/js/swiper-bundle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/front/js/carousel.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/front/js/bootstrap-select.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/front/js/lazysize.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/front/js/count-down.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/front/js/wow.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/front/js/multiple-modal.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/front/js/main.js')}}"></script>
@toastifyJs
@yield('js')


</body>

</html>
