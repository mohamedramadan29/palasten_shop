@extends('front.layouts.master')
@section('title')
    {{$product['name']}}
@endsection

@section('content')
    <div class="page_content">
        @if (Session::has('Success_message'))
            @php
                toastify()->success(\Illuminate\Support\Facades\Session::get('Success_message'));
            @endphp
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                @php
                    toastify()->error($error);
                @endphp
            @endforeach
        @endif
        <!-- page-title -->
        <div class="tf-page-title">
            <div class="container-full">
                <div class="tf-breadcrumb-wrap d-flex justify-content-between flex-wrap align-items-center">
                    <div class="tf-breadcrumb-list">
                        <a href="{{url('/')}}" class="text"> الرئيسية </a>
                        <i class="icon icon-arrow-right"></i>
                        <a href="{{url('category/'.$product['Main_Category']['slug'])}}"
                           class="text">{{$product['Main_Category']['name']}}</a>
                        <i class="icon icon-arrow-right"></i>
                        <span class="text"> {{$product['name']}} </span>
                    </div>
                </div>
                <div class="heading text-center">{{$product['name']}}</div>
            </div>
        </div>
        <!-- /page-title -->
        <!-- /breadcrumb -->
        <!-- default -->
        <section class="flat-spacing-4 pt_0">
            <div class="tf-main-product">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="tf-product-media-wrap sticky-top">
                                <div class="thumbs-slider thumbs-default">
                                    <div class="swiper tf-product-media-thumbs tf-product-media-thumbs-default"
                                         data-direction="vertical">
                                        <div class="swiper-wrapper stagger-wrap">
                                            <div class="swiper-slide stagger-item">
                                                <div class="item">
                                                    <img class="lazyload"
                                                         data-src="{{asset('assets/uploads/product_images/'.$product['image'])}}"
                                                         src="{{asset('assets/uploads/product_images/'.$product['image'])}}"
                                                         alt="{{$product['name']}}">
                                                </div>
                                            </div>
                                            @if($product['gallary'] && $product['gallary'] !='')
                                                @foreach($product['gallary'] as $gallary)
                                                    <div class="swiper-slide stagger-item">
                                                        <div class="item">
                                                            <img class="lazyload"
                                                                 data-src="{{asset('assets/uploads/product_gallery/'.$gallary['image'])}}"
                                                                 src="{{asset('assets/uploads/product_gallary/'.$gallary['image'])}}"
                                                                 alt="">
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <div class="swiper tf-product-media-main tf-product-media-main-default">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <a href="#" class="item">
                                                    <img class="lazyload"
                                                         data-src="{{asset('assets/uploads/product_images/'.$product['image'])}}"
                                                         src="{{asset('assets/uploads/product_images/'.$product['image'])}}"
                                                         alt="{{$product['name']}}">
                                                </a>
                                            </div>
                                            @if($product['gallary'] && $product['gallary'] !='')
                                                @foreach($product['gallary'] as $gallary)
                                                    <div class="swiper-slide">
                                                        <a href="#" class="item">
                                                            <img class="lazyload"
                                                                 data-src="{{asset('assets/uploads/product_gallery/'.$gallary['image'])}}"
                                                                 src="{{asset('assets/uploads/product_gallary/'.$gallary['image'])}}"
                                                                 alt="{{$product['name']}}">
                                                        </a>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="swiper-button-next button-style-arrow thumbs-next"></div>
                                        <div class="swiper-button-prev button-style-arrow thumbs-prev"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="tf-product-info-wrap position-relative">
                                <div class="tf-zoom-main"></div>
                                <div class="tf-product-info-list">
                                    <div class="tf-product-info-title">
                                        <h5> {{$product['name']}} </h5>
                                    </div>
                                    <div class="tf-product-info-badges">
                                        <div class="product-status-content">
                                            <p class="fw-6">{{$product['short_description']}}</p>
                                        </div>
                                    </div>
                                    <div class="tf-product-info-price">
                                        @if(isset($product['discount']) && $product['discount'] !=null)
                                            <div
                                                class="price-on-sale">{{$product['discount']}} {{ $storeCurrency }} </div>
                                            <div
                                                class="compare-at-price">{{$product['price']}} {{ $storeCurrency }}</div>
                                        @else
                                            <div class="price-on-sale">{{$product['price']}} {{ $storeCurrency }}</div>
                                        @endif
                                    </div>
                                    <div class="tf-product-info-variant-picker">
                                        <div class="variant-picker-item">
                                            <div class="variant-picker-label">
                                                Color: <span class="fw-6 variant-picker-label-value">Beige</span>
                                            </div>
                                            <div class="variant-picker-values">
                                                <input id="values-beige" type="radio" name="color1" checked>
                                                <label class="hover-tooltip radius-60" for="values-beige"
                                                       data-value="Beige">
                                                    <span class="btn-checkbox bg-color-beige"></span>
                                                    <span class="tooltip">Beige</span>
                                                </label>
                                                <input id="values-black" type="radio" name="color1">
                                                <label class=" hover-tooltip radius-60" for="values-black"
                                                       data-value="Black">
                                                    <span class="btn-checkbox bg-color-black"></span>
                                                    <span class="tooltip">Black</span>
                                                </label>
                                                <input id="values-blue" type="radio" name="color1">
                                                <label class="hover-tooltip radius-60" for="values-blue"
                                                       data-value="Blue">
                                                    <span class="btn-checkbox bg-color-blue"></span>
                                                    <span class="tooltip">Blue</span>
                                                </label>
                                                <input id="values-white" type="radio" name="color1">
                                                <label class="hover-tooltip radius-60" for="values-white"
                                                       data-value="White">
                                                    <span class="btn-checkbox bg-color-white"></span>
                                                    <span class="tooltip">White</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <form id="addToCart" class="" method="post" action="{{url('cart/add')}}">
                                        @csrf
                                        <div class="tf-product-info-quantity">
                                            <div class="quantity-title fw-6"> الكمية</div>
                                            <div class="wg-quantity">
                                                <span class="btn-quantity minus-btn">-</span>
                                                <input type="text" name="number" value="1">
                                                <span class="btn-quantity plus-btn">+</span>
                                            </div>
                                        </div>
                                        <div class="tf-product-info-buy-button">
                                            <input type="hidden" name="product_id" value="{{$product['id']}}">
                                            <input type="hidden" name="price" value="{{$product['price']}}">
                                            <button id="addtocartbutton" href="javascript:void(0);"
                                                    class="tf-btn btn-fill justify-content-center fw-6 fs-16 flex-grow-1 animate-hover-btn btn-add-to-cart">
                                                <span>  اضف الي السلة    </span></button>
                                            <button type="submit"> add to cart</button>
                                        </div>
                                    </form>
                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                                    <script>
                                        $(document).ready(function () {
                                            $("#addtocartbutton").on('click', function (e) {
                                                e.preventDefault();
                                                $.ajax({
                                                    url: '/cart/add',
                                                    method: 'POST',
                                                    data: $("#addToCart").serialize(),
                                                    success: function (response) {
                                                        // عرض الرسالة باستخدام Toastify
                                                        Toastify({
                                                            text: response.message, // عرض الرسالة من response
                                                            duration: 3000, // المدة الزمنية لعرض الرسالة
                                                            gravity: "top", // اتجاه العرض
                                                            position: "right", // موقع الرسالة
                                                            backgroundColor: "#4CAF50", // لون الخلفية للرسالة
                                                        }).showToast();
                                                        if (response.cartCount) {
                                                            $('.nav-cart .count-box').text(response.cartCount);
                                                        }
                                                        // تحميل محتوى عربة التسوق المحدثة
                                                        updateCartModal();
                                                    },
                                                    error: function (xhr, status, error) {
                                                        $('#wishlistMessage').html('<p>حدث خطأ أثناء إضافة المنتج للمفضلة</p>');
                                                    }
                                                });
                                            });
                                            function updateCartModal() {
                                                $.ajax({
                                                    url: '/cart/items', // رابط يقوم بجلب العناصر المحدثة
                                                    method: 'GET',
                                                    success: function (response) {
                                                        // استبدل محتوى الـ modal الخاص بعربة التسوق
                                                        $('#shoppingCart .wrap').html(response);
                                                    }
                                                });
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /default -->
        <!-- tabs -->
        <section class="flat-spacing-17 pt_0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="widget-tabs style-has-border">
                            <ul class="widget-menu-tab">
                                <li class="item-title active">
                                    <span class="inner"> وصف المنتج  </span>
                                </li>
                                <li class="item-title">
                                    <span class="inner"> التقيمات  </span>
                                </li>
                            </ul>
                            <div class="widget-content-tab">
                                <div class="widget-content-inner active">
                                    <div class="">
                                        <p class="mb_30">
                                            {{$product['description']}}
                                        </p>
                                    </div>
                                </div>
                                <div class="widget-content-inner">
                                    <table class="tf-pr-attrs">
                                        <tbody>
                                        <tr class="tf-attr-pa-color">
                                            <th class="tf-attr-label">Color</th>
                                            <td class="tf-attr-value">
                                                <p>White, Pink, Black</p>
                                            </td>
                                        </tr>
                                        <tr class="tf-attr-pa-size">
                                            <th class="tf-attr-label">Size</th>
                                            <td class="tf-attr-value">
                                                <p>S, M, L, XL</p>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /tabs -->
        <!-- product -->
        <section class="flat-spacing-1 pt_0">
            <div class="container">
                <div class="flat-title">
                    <span class="title"> ربما يعجبك أيضا </span>
                </div>
                <div class="hover-sw-nav hover-sw-2">
                    <div class="swiper tf-sw-product-sell wrap-sw-over" data-preview="4" data-tablet="3" data-mobile="2"
                         data-space-lg="30" data-space-md="15" data-pagination="2" data-pagination-md="3"
                         data-pagination-lg="3">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide" lazy="true">
                                <div class="card-product">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="images/products/orange-1.jpg"
                                                 src="images/products/orange-1.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="images/products/white-1.jpg"
                                                 src="images/products/white-1.jpg" alt="image-product">
                                        </a>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                               class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                               class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                               class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                               class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                        <div class="size-list">
                                            <span>S</span>
                                            <span>M</span>
                                            <span>L</span>
                                            <span>XL</span>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Ribbed Tank Top</a>
                                        <span class="price">$16.95</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">Orange</span>
                                                <span class="swatch-value bg_orange-3"></span>
                                                <img class="lazyload" data-src="images/products/orange-1.jpg"
                                                     src="images/products/orange-1.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Black</span>
                                                <span class="swatch-value bg_dark"></span>
                                                <img class="lazyload" data-src="images/products/black-1.jpg"
                                                     src="images/products/black-1.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">White</span>
                                                <span class="swatch-value bg_white"></span>
                                                <img class="lazyload" data-src="images/products/white-1.jpg"
                                                     src="images/products/white-1.jpg" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" lazy="true">
                                <div class="card-product">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="images/products/brown.jpg"
                                                 src="images/products/brown.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="images/products/purple.jpg"
                                                 src="images/products/purple.jpg" alt="image-product">
                                        </a>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                               class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                               class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                               class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                               class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                        <div class="size-list">
                                            <span>M</span>
                                            <span>L</span>
                                            <span>XL</span>
                                        </div>
                                        <div class="on-sale-wrap">
                                            <div class="on-sale-item">-33%</div>
                                        </div>
                                        <div class="countdown-box">
                                            <div class="js-countdown" data-timer="1007500"
                                                 data-labels="d :,h :,m :,s"></div>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Ribbed modal T-shirt</a>
                                        <span class="price">From $18.95</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">Brown</span>
                                                <span class="swatch-value bg_brown"></span>
                                                <img class="lazyload" data-src="images/products/brown.jpg"
                                                     src="images/products/brown.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Light Purple</span>
                                                <span class="swatch-value bg_purple"></span>
                                                <img class="lazyload" data-src="images/products/purple.jpg"
                                                     src="images/products/purple.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Light Green</span>
                                                <span class="swatch-value bg_light-green"></span>
                                                <img class="lazyload" data-src="images/products/green.jpg"
                                                     src="images/products/green.jpg" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" lazy="true">
                                <div class="card-product">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="images/products/white-3.jpg"
                                                 src="images/products/white-3.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="images/products/white-4.jpg"
                                                 src="images/products/white-4.jpg" alt="image-product">
                                        </a>
                                        <div class="list-product-btn">
                                            <a href="#shoppingCart" data-bs-toggle="modal"
                                               class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Add to cart</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                               class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                               class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                               class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                        <div class="size-list">
                                            <span>S</span>
                                            <span>M</span>
                                            <span>L</span>
                                            <span>XL</span>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Oversized Printed T-shirt</a>
                                        <span class="price">$10.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" lazy="true">
                                <div class="card-product">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="images/products/white-2.jpg"
                                                 src="images/products/white-2.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="images/products/pink-1.jpg"
                                                 src="images/products/pink-1.jpg" alt="image-product">
                                        </a>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                               class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                               class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                               class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                               class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                        <div class="size-list">
                                            <span>S</span>
                                            <span>M</span>
                                            <span>L</span>
                                            <span>XL</span>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title">Oversized Printed T-shirt</a>
                                        <span class="price">$16.95</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">White</span>
                                                <span class="swatch-value bg_white"></span>
                                                <img class="lazyload" data-src="images/products/white-2.jpg"
                                                     src="images/products/white-2.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Pink</span>
                                                <span class="swatch-value bg_purple"></span>
                                                <img class="lazyload" data-src="images/products/pink-1.jpg"
                                                     src="images/products/pink-1.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Black</span>
                                                <span class="swatch-value bg_dark"></span>
                                                <img class="lazyload" data-src="images/products/black-2.jpg"
                                                     src="images/products/black-2.jpg" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" lazy="true">
                                <div class="card-product">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="images/products/brown-2.jpg"
                                                 src="images/products/brown-2.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="images/products/brown-3.jpg"
                                                 src="images/products/brown-3.jpg" alt="image-product">
                                        </a>
                                        <div class="size-list">
                                            <span>S</span>
                                            <span>M</span>
                                            <span>L</span>
                                            <span>XL</span>
                                        </div>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                               class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                               class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                               class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                               class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">V-neck linen T-shirt</a>
                                        <span class="price">$114.95</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">Brown</span>
                                                <span class="swatch-value bg_brown"></span>
                                                <img class="lazyload" data-src="images/products/brown-2.jpg"
                                                     src="images/products/brown-2.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">White</span>
                                                <span class="swatch-value bg_white"></span>
                                                <img class="lazyload" data-src="images/products/white-5.jpg"
                                                     src="images/products/white-5.jpg" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" lazy="true">
                                <div class="card-product">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product"
                                                 data-src="images/products/light-green-1.jpg"
                                                 src="images/products/light-green-1.jpg" alt="image-product">
                                            <img class="lazyload img-hover" data-src="images/products/light-green-2.jpg"
                                                 src="images/products/light-green-2.jpg" alt="image-product">
                                        </a>
                                        <div class="list-product-btn absolute-2">
                                            <a href="#quick_add" data-bs-toggle="modal"
                                               class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);"
                                               class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                               class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal"
                                               class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Loose Fit Sweatshirt</a>
                                        <span class="price">$10.00</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">Light Green</span>
                                                <span class="swatch-value bg_light-green"></span>
                                                <img class="lazyload" data-src="images/products/light-green-1.jpg"
                                                     src="images/products/light-green-1.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Black</span>
                                                <span class="swatch-value bg_dark"></span>
                                                <img class="lazyload" data-src="images/products/black-3.jpg"
                                                     src="images/products/black-3.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Blue</span>
                                                <span class="swatch-value bg_blue-2"></span>
                                                <img class="lazyload" data-src="images/products/blue.jpg"
                                                     src="images/products/blue.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Dark Blue</span>
                                                <span class="swatch-value bg_dark-blue"></span>
                                                <img class="lazyload" data-src="images/products/dark-blue.jpg"
                                                     src="images/products/dark-blue.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">White</span>
                                                <span class="swatch-value bg_white"></span>
                                                <img class="lazyload" data-src="images/products/white-6.jpg"
                                                     src="images/products/white-6.jpg" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Light Grey</span>
                                                <span class="swatch-value bg_light-grey"></span>
                                                <img class="lazyload" data-src="images/products/light-grey.jpg"
                                                     src="images/products/light-grey.jpg" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nav-sw nav-next-slider nav-next-product box-icon w_46 round"><span
                            class="icon icon-arrow-left"></span></div>
                    <div class="nav-sw nav-prev-slider nav-prev-product box-icon w_46 round"><span
                            class="icon icon-arrow-right"></span></div>
                    <div class="sw-dots style-2 sw-pagination-product justify-content-center"></div>
                </div>
            </div>
        </section>
        <!-- /product -->
    </div>
@endsection
