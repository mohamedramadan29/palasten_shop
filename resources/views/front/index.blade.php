@extends('front.layouts.master')
@section('title')
    الرئيسية
@endsection

@section('content')
    <div class="page_content">
        <!-- Slider -->
        <div class="tf-slideshow slider-effect-fade position-relative hero_section">
            <div class="swiper tf-sw-slideshow" data-preview="1" data-tablet="1" data-mobile="1" data-centered="false"
                 data-space="0" data-loop="true" data-auto-play="false" data-delay="0" data-speed="1000">
                <div class="swiper-wrapper">
                    @foreach($banners as $banner)
                        <div class="swiper-slide">
                            <div class="wrap-slider">
                                <img src="{{asset('assets/uploads/banners/'.$banner['image'])}}"
                                     alt="fashion-slideshow">
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="wrap-pagination">
                <div class="container">
                    <div class="sw-dots sw-pagination-slider justify-content-center"></div>
                </div>
            </div>
        </div>
        <!-- /Slider -->
        <!-- Best seller -->
        <section class="flat-spacing-15 new_products">
            <div class="container">
                <div class="flat-title wow fadeInUp" data-wow-delay="0s">


                    <span class="title wow fadeInUp" data-wow-delay="0s"> الاكثر مبيعا  </span>
                    <p class="sub-title wow fadeInUp" data-wow-delay="0s">  اكثر المنتجات مبيعا في المتجر  </p>

                </div>
                <div class="hover-sw-nav hover-sw-3">
                    <div class="swiper tf-sw-product-sell wrap-sw-over" data-preview="4" data-tablet="3" data-mobile="2" data-space-lg="30" data-space-md="15" data-pagination="2" data-pagination-md="3" data-pagination-lg="3">
                        <div class="swiper-wrapper">
                            @foreach($bestproducts as $product)
                                <div class="swiper-slide" lazy="true">
                                    <div class="card-product">
                                        <div class="card-product-wrapper">
                                            <a href="{{url('product/'.$product['slug'])}}" class="product-img">
                                                <img class="lazyload img-product" data-src="{{asset('assets/front/images/products/orange-1.jpg')}}" src="{{asset('assets/front/images/products/orange-1.jpg')}}" alt="image-product">
                                                <img class="lazyload img-hover" data-src="{{asset('assets/front/images/products/white-1.jpg')}}" src="{{asset('assets/front/images/products/white-1.jpg')}}" alt="image-product">
                                            </a>
                                            <div class="list-product-btn">
                                                <a href="#quick_add" data-bs-toggle="modal" class="box-icon bg_white quick-add tf-btn-loading">
                                                    <span class="icon icon-bag"></span>
                                                    <span class="tooltip"> اضف الي السلة  </span>
                                                </a>
                                                <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                                    <span class="icon icon-heart"></span>
                                                    <span class="tooltip"> اضف الي المفضلة  </span>
                                                    <span class="icon icon-delete"></span>
                                                </a>
                                                <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                                    <span class="icon icon-view"></span>
                                                    <span class="tooltip"> مشاهدة </span>
                                                </a>
                                            </div>
                                            <div class="size-list">
                                                <span>4 sizes available</span>
                                            </div>
                                        </div>
                                        <div class="card-product-info">
                                            <a href="{{url('product/'.$product['slug'])}}" class="title link"> {{$product['name']}} </a>
                                            <span class="price"> {{$product['price']}} {{ $storeCurrency }} </span>
                                            <ul class="list-color-product">
                                                <li class="list-color-item color-swatch active">
                                                    <span class="tooltip">Orange</span>
                                                    <span class="swatch-value bg_orange-3"></span>
                                                    <img class="lazyload" data-src="{{asset('assets/front/images/products/orange-1.jpg')}}" src="{{asset('assets/front/images/products/orange-1.jpg')}}" alt="image-product">
                                                </li>
                                                <li class="list-color-item color-swatch">
                                                    <span class="tooltip">Black</span>
                                                    <span class="swatch-value bg_dark"></span>
                                                    <img class="lazyload" data-src="{{asset('assets/front/images/products/black-1.jpg')}}" src="{{asset('assets/front/images/products/black-1.jpg')}}" alt="image-product">
                                                </li>
                                                <li class="list-color-item color-swatch">
                                                    <span class="tooltip">White</span>
                                                    <span class="swatch-value bg_white"></span>
                                                    <img class="lazyload" data-src="{{asset('assets/front/images/products/white-1.jpg')}}" src="{{asset('assets/front/images/products/white-1.jpg')}}" alt="image-product">
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="swiper-slide" lazy="true">
                                <div class="card-product">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('assets/front/images/products/orange-1.jpg')}}" src="{{asset('assets/front/images/products/orange-1.jpg')}}" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('assets/front/images/products/white-1.jpg')}}" src="{{asset('assets/front/images/products/white-1.jpg')}}" alt="image-product">
                                        </a>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal" class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                        <div class="size-list">
                                            <span>4 sizes available</span>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Ribbed Tank Top</a>
                                        <span class="price">$16.95</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">Orange</span>
                                                <span class="swatch-value bg_orange-3"></span>
                                                <img class="lazyload" data-src="{{asset('assets/front/images/products/orange-1.jpg')}}" src="{{asset('assets/front/images/products/orange-1.jpg')}}" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Black</span>
                                                <span class="swatch-value bg_dark"></span>
                                                <img class="lazyload" data-src="{{asset('assets/front/images/products/black-1.jpg')}}" src="{{asset('assets/front/images/products/black-1.jpg')}}" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">White</span>
                                                <span class="swatch-value bg_white"></span>
                                                <img class="lazyload" data-src="{{asset('assets/front/images/products/white-1.jpg')}}" src="{{asset('assets/front/images/products/white-1.jpg')}}" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" lazy="true">
                                <div class="card-product">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('assets/front/images/products/orange-1.jpg')}}" src="{{asset('assets/front/images/products/orange-1.jpg')}}" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('assets/front/images/products/white-1.jpg')}}" src="{{asset('assets/front/images/products/white-1.jpg')}}" alt="image-product">
                                        </a>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal" class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                        <div class="size-list">
                                            <span>4 sizes available</span>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Ribbed Tank Top</a>
                                        <span class="price">$16.95</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">Orange</span>
                                                <span class="swatch-value bg_orange-3"></span>
                                                <img class="lazyload" data-src="{{asset('assets/front/images/products/orange-1.jpg')}}" src="{{asset('assets/front/images/products/orange-1.jpg')}}" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Black</span>
                                                <span class="swatch-value bg_dark"></span>
                                                <img class="lazyload" data-src="{{asset('assets/front/images/products/black-1.jpg')}}" src="{{asset('assets/front/images/products/black-1.jpg')}}" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">White</span>
                                                <span class="swatch-value bg_white"></span>
                                                <img class="lazyload" data-src="{{asset('assets/front/images/products/white-1.jpg')}}" src="{{asset('assets/front/images/products/white-1.jpg')}}" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" lazy="true">
                                <div class="card-product">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('assets/front/images/products/orange-1.jpg')}}" src="{{asset('assets/front/images/products/orange-1.jpg')}}" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('assets/front/images/products/white-1.jpg')}}" src="{{asset('assets/front/images/products/white-1.jpg')}}" alt="image-product">
                                        </a>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal" class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                        <div class="size-list">
                                            <span>4 sizes available</span>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Ribbed Tank Top</a>
                                        <span class="price">$16.95</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">Orange</span>
                                                <span class="swatch-value bg_orange-3"></span>
                                                <img class="lazyload" data-src="{{asset('assets/front/images/products/orange-1.jpg')}}" src="{{asset('assets/front/images/products/orange-1.jpg')}}" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Black</span>
                                                <span class="swatch-value bg_dark"></span>
                                                <img class="lazyload" data-src="{{asset('assets/front/images/products/black-1.jpg')}}" src="{{asset('assets/front/images/products/black-1.jpg')}}" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">White</span>
                                                <span class="swatch-value bg_white"></span>
                                                <img class="lazyload" data-src="{{asset('assets/front/images/products/white-1.jpg')}}" src="{{asset('assets/front/images/products/white-1.jpg')}}" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" lazy="true">
                                <div class="card-product">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('assets/front/images/products/orange-1.jpg')}}" src="{{asset('assets/front/images/products/orange-1.jpg')}}" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('assets/front/images/products/white-1.jpg')}}" src="{{asset('assets/front/images/products/white-1.jpg')}}" alt="image-product">
                                        </a>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal" class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                        <div class="size-list">
                                            <span>4 sizes available</span>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Ribbed Tank Top</a>
                                        <span class="price">$16.95</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">Orange</span>
                                                <span class="swatch-value bg_orange-3"></span>
                                                <img class="lazyload" data-src="{{asset('assets/front/images/products/orange-1.jpg')}}" src="{{asset('assets/front/images/products/orange-1.jpg')}}" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Black</span>
                                                <span class="swatch-value bg_dark"></span>
                                                <img class="lazyload" data-src="{{asset('assets/front/images/products/black-1.jpg')}}" src="{{asset('assets/front/images/products/black-1.jpg')}}" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">White</span>
                                                <span class="swatch-value bg_white"></span>
                                                <img class="lazyload" data-src="{{asset('assets/front/images/products/white-1.jpg')}}" src="{{asset('assets/front/images/products/white-1.jpg')}}" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" lazy="true">
                                <div class="card-product">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{asset('assets/front/images/products/orange-1.jpg')}}" src="{{asset('assets/front/images/products/orange-1.jpg')}}" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{asset('assets/front/images/products/white-1.jpg')}}" src="{{asset('assets/front/images/products/white-1.jpg')}}" alt="image-product">
                                        </a>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal" class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                        <div class="size-list">
                                            <span>4 sizes available</span>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">Ribbed Tank Top</a>
                                        <span class="price">$16.95</span>
                                        <ul class="list-color-product">
                                            <li class="list-color-item color-swatch active">
                                                <span class="tooltip">Orange</span>
                                                <span class="swatch-value bg_orange-3"></span>
                                                <img class="lazyload" data-src="{{asset('assets/front/images/products/orange-1.jpg')}}" src="{{asset('assets/front/images/products/orange-1.jpg')}}" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">Black</span>
                                                <span class="swatch-value bg_dark"></span>
                                                <img class="lazyload" data-src="{{asset('assets/front/images/products/black-1.jpg')}}" src="{{asset('assets/front/images/products/black-1.jpg')}}" alt="image-product">
                                            </li>
                                            <li class="list-color-item color-swatch">
                                                <span class="tooltip">White</span>
                                                <span class="swatch-value bg_white"></span>
                                                <img class="lazyload" data-src="{{asset('assets/front/images/products/white-1.jpg')}}" src="{{asset('assets/front/images/products/white-1.jpg')}}" alt="image-product">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="nav-sw nav-next-slider nav-next-product box-icon w_46 round"><span class="icon icon-arrow-left"></span></div>
                    <div class="nav-sw nav-prev-slider nav-prev-product box-icon w_46 round"><span class="icon icon-arrow-right"></span></div>
                </div>
            </div>
        </section>
        <!-- /Best seller -->
        <!-- Start Best Products -->
        <section class="flat-spacing-5 flat-seller new_products">
            <div class="container">
                <div class="flat-title">
                    <span class="title"> احدث المنتجات  </span>
                    <p class="sub-title"> احدث المنتجات في المتجر  </p>
                </div>
                <div class="grid-layout loadmore-item wow fadeInUp" data-wow-delay="0s" data-grid="grid-4">

                    <div class="card-product fl-item">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product"
                                     data-src="{{asset('assets/front/images/products/orange-1.jpg')}}"
                                     src="{{asset('assets/front/images/products/orange-1.jpg')}}" alt="image-product">
                                <img class="lazyload img-hover"
                                     data-src="{{asset('assets/front/images/products/white-1.jpg')}}"
                                     src="{{asset('assets/front/images/products/white-1.jpg')}}" alt="image-product">
                            </a>
                            <div class="list-product-btn">
                                <a href="#quick_add" data-bs-toggle="modal"
                                   class="box-icon bg_white quick-add tf-btn-loading">
                                    <span class="icon icon-bag"></span>
                                    <span class="tooltip">Quick Add</span>
                                </a>
                                <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
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
                                    <img class="lazyload"
                                         data-src="{{asset('assets/front/images/products/orange-1.jpg')}}"
                                         src="{{asset('assets/front/images/products/orange-1.jpg')}}"
                                         alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Black</span>
                                    <span class="swatch-value bg_dark"></span>
                                    <img class="lazyload"
                                         data-src="{{asset('assets/front/images/products/black-1.jpg')}}"
                                         src="{{asset('assets/front/images/products/black-1.jpg')}}"
                                         alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">White</span>
                                    <span class="swatch-value bg_white"></span>
                                    <img class="lazyload"
                                         data-src="{{asset('assets/front/images/products/white-1.jpg')}}"
                                         src="{{asset('assets/front/images/products/white-1.jpg')}}"
                                         alt="image-product">
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-product fl-item">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product"
                                     data-src="{{asset('assets/front/images/products/orange-1.jpg')}}"
                                     src="{{asset('assets/front/images/products/orange-1.jpg')}}" alt="image-product">
                                <img class="lazyload img-hover"
                                     data-src="{{asset('assets/front/images/products/white-1.jpg')}}"
                                     src="{{asset('assets/front/images/products/white-1.jpg')}}" alt="image-product">
                            </a>
                            <div class="list-product-btn">
                                <a href="#quick_add" data-bs-toggle="modal"
                                   class="box-icon bg_white quick-add tf-btn-loading">
                                    <span class="icon icon-bag"></span>
                                    <span class="tooltip">Quick Add</span>
                                </a>
                                <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
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
                                    <img class="lazyload"
                                         data-src="{{asset('assets/front/images/products/orange-1.jpg')}}"
                                         src="{{asset('assets/front/images/products/orange-1.jpg')}}"
                                         alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Black</span>
                                    <span class="swatch-value bg_dark"></span>
                                    <img class="lazyload"
                                         data-src="{{asset('assets/front/images/products/black-1.jpg')}}"
                                         src="{{asset('assets/front/images/products/black-1.jpg')}}"
                                         alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">White</span>
                                    <span class="swatch-value bg_white"></span>
                                    <img class="lazyload"
                                         data-src="{{asset('assets/front/images/products/white-1.jpg')}}"
                                         src="{{asset('assets/front/images/products/white-1.jpg')}}"
                                         alt="image-product">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-product fl-item">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product"
                                     data-src="{{asset('assets/front/images/products/orange-1.jpg')}}"
                                     src="{{asset('assets/front/images/products/orange-1.jpg')}}" alt="image-product">
                                <img class="lazyload img-hover"
                                     data-src="{{asset('assets/front/images/products/white-1.jpg')}}"
                                     src="{{asset('assets/front/images/products/white-1.jpg')}}" alt="image-product">
                            </a>
                            <div class="list-product-btn">
                                <a href="#quick_add" data-bs-toggle="modal"
                                   class="box-icon bg_white quick-add tf-btn-loading">
                                    <span class="icon icon-bag"></span>
                                    <span class="tooltip">Quick Add</span>
                                </a>
                                <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
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
                                    <img class="lazyload"
                                         data-src="{{asset('assets/front/images/products/orange-1.jpg')}}"
                                         src="{{asset('assets/front/images/products/orange-1.jpg')}}"
                                         alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Black</span>
                                    <span class="swatch-value bg_dark"></span>
                                    <img class="lazyload"
                                         data-src="{{asset('assets/front/images/products/black-1.jpg')}}"
                                         src="{{asset('assets/front/images/products/black-1.jpg')}}"
                                         alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">White</span>
                                    <span class="swatch-value bg_white"></span>
                                    <img class="lazyload"
                                         data-src="{{asset('assets/front/images/products/white-1.jpg')}}"
                                         src="{{asset('assets/front/images/products/white-1.jpg')}}"
                                         alt="image-product">
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-product fl-item">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product"
                                     data-src="{{asset('assets/front/images/products/orange-1.jpg')}}"
                                     src="{{asset('assets/front/images/products/orange-1.jpg')}}" alt="image-product">
                                <img class="lazyload img-hover"
                                     data-src="{{asset('assets/front/images/products/white-1.jpg')}}"
                                     src="{{asset('assets/front/images/products/white-1.jpg')}}" alt="image-product">
                            </a>
                            <div class="list-product-btn">
                                <a href="#quick_add" data-bs-toggle="modal"
                                   class="box-icon bg_white quick-add tf-btn-loading">
                                    <span class="icon icon-bag"></span>
                                    <span class="tooltip">Quick Add</span>
                                </a>
                                <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
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
                                    <img class="lazyload"
                                         data-src="{{asset('assets/front/images/products/orange-1.jpg')}}"
                                         src="{{asset('assets/front/images/products/orange-1.jpg')}}"
                                         alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Black</span>
                                    <span class="swatch-value bg_dark"></span>
                                    <img class="lazyload"
                                         data-src="{{asset('assets/front/images/products/black-1.jpg')}}"
                                         src="{{asset('assets/front/images/products/black-1.jpg')}}"
                                         alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">White</span>
                                    <span class="swatch-value bg_white"></span>
                                    <img class="lazyload"
                                         data-src="{{asset('assets/front/images/products/white-1.jpg')}}"
                                         src="{{asset('assets/front/images/products/white-1.jpg')}}"
                                         alt="image-product">
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-product fl-item">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product"
                                     data-src="{{asset('assets/front/images/products/orange-1.jpg')}}"
                                     src="{{asset('assets/front/images/products/orange-1.jpg')}}" alt="image-product">
                                <img class="lazyload img-hover"
                                     data-src="{{asset('assets/front/images/products/white-1.jpg')}}"
                                     src="{{asset('assets/front/images/products/white-1.jpg')}}" alt="image-product">
                            </a>
                            <div class="list-product-btn">
                                <a href="#quick_add" data-bs-toggle="modal"
                                   class="box-icon bg_white quick-add tf-btn-loading">
                                    <span class="icon icon-bag"></span>
                                    <span class="tooltip">Quick Add</span>
                                </a>
                                <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
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
                                    <img class="lazyload"
                                         data-src="{{asset('assets/front/images/products/orange-1.jpg')}}"
                                         src="{{asset('assets/front/images/products/orange-1.jpg')}}"
                                         alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Black</span>
                                    <span class="swatch-value bg_dark"></span>
                                    <img class="lazyload"
                                         data-src="{{asset('assets/front/images/products/black-1.jpg')}}"
                                         src="{{asset('assets/front/images/products/black-1.jpg')}}"
                                         alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">White</span>
                                    <span class="swatch-value bg_white"></span>
                                    <img class="lazyload"
                                         data-src="{{asset('assets/front/images/products/white-1.jpg')}}"
                                         src="{{asset('assets/front/images/products/white-1.jpg')}}"
                                         alt="image-product">
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-product fl-item">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product"
                                     data-src="{{asset('assets/front/images/products/orange-1.jpg')}}"
                                     src="{{asset('assets/front/images/products/orange-1.jpg')}}" alt="image-product">
                                <img class="lazyload img-hover"
                                     data-src="{{asset('assets/front/images/products/white-1.jpg')}}"
                                     src="{{asset('assets/front/images/products/white-1.jpg')}}" alt="image-product">
                            </a>
                            <div class="list-product-btn">
                                <a href="#quick_add" data-bs-toggle="modal"
                                   class="box-icon bg_white quick-add tf-btn-loading">
                                    <span class="icon icon-bag"></span>
                                    <span class="tooltip">Quick Add</span>
                                </a>
                                <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
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
                                    <img class="lazyload"
                                         data-src="{{asset('assets/front/images/products/orange-1.jpg')}}"
                                         src="{{asset('assets/front/images/products/orange-1.jpg')}}"
                                         alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Black</span>
                                    <span class="swatch-value bg_dark"></span>
                                    <img class="lazyload"
                                         data-src="{{asset('assets/front/images/products/black-1.jpg')}}"
                                         src="{{asset('assets/front/images/products/black-1.jpg')}}"
                                         alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">White</span>
                                    <span class="swatch-value bg_white"></span>
                                    <img class="lazyload"
                                         data-src="{{asset('assets/front/images/products/white-1.jpg')}}"
                                         src="{{asset('assets/front/images/products/white-1.jpg')}}"
                                         alt="image-product">
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-product fl-item">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product"
                                     data-src="{{asset('assets/front/images/products/orange-1.jpg')}}"
                                     src="{{asset('assets/front/images/products/orange-1.jpg')}}" alt="image-product">
                                <img class="lazyload img-hover"
                                     data-src="{{asset('assets/front/images/products/white-1.jpg')}}"
                                     src="{{asset('assets/front/images/products/white-1.jpg')}}" alt="image-product">
                            </a>
                            <div class="list-product-btn">
                                <a href="#quick_add" data-bs-toggle="modal"
                                   class="box-icon bg_white quick-add tf-btn-loading">
                                    <span class="icon icon-bag"></span>
                                    <span class="tooltip">Quick Add</span>
                                </a>
                                <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
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
                                    <img class="lazyload"
                                         data-src="{{asset('assets/front/images/products/orange-1.jpg')}}"
                                         src="{{asset('assets/front/images/products/orange-1.jpg')}}"
                                         alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Black</span>
                                    <span class="swatch-value bg_dark"></span>
                                    <img class="lazyload"
                                         data-src="{{asset('assets/front/images/products/black-1.jpg')}}"
                                         src="{{asset('assets/front/images/products/black-1.jpg')}}"
                                         alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">White</span>
                                    <span class="swatch-value bg_white"></span>
                                    <img class="lazyload"
                                         data-src="{{asset('assets/front/images/products/white-1.jpg')}}"
                                         src="{{asset('assets/front/images/products/white-1.jpg')}}"
                                         alt="image-product">
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-product fl-item">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product"
                                     data-src="{{asset('assets/front/images/products/orange-1.jpg')}}"
                                     src="{{asset('assets/front/images/products/orange-1.jpg')}}" alt="image-product">
                                <img class="lazyload img-hover"
                                     data-src="{{asset('assets/front/images/products/white-1.jpg')}}"
                                     src="{{asset('assets/front/images/products/white-1.jpg')}}" alt="image-product">
                            </a>
                            <div class="list-product-btn">
                                <a href="#quick_add" data-bs-toggle="modal"
                                   class="box-icon bg_white quick-add tf-btn-loading">
                                    <span class="icon icon-bag"></span>
                                    <span class="tooltip">Quick Add</span>
                                </a>
                                <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
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
                                    <img class="lazyload"
                                         data-src="{{asset('assets/front/images/products/orange-1.jpg')}}"
                                         src="{{asset('assets/front/images/products/orange-1.jpg')}}"
                                         alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Black</span>
                                    <span class="swatch-value bg_dark"></span>
                                    <img class="lazyload"
                                         data-src="{{asset('assets/front/images/products/black-1.jpg')}}"
                                         src="{{asset('assets/front/images/products/black-1.jpg')}}"
                                         alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">White</span>
                                    <span class="swatch-value bg_white"></span>
                                    <img class="lazyload"
                                         data-src="{{asset('assets/front/images/products/white-1.jpg')}}"
                                         src="{{asset('assets/front/images/products/white-1.jpg')}}"
                                         alt="image-product">
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-product fl-item">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product"
                                     data-src="{{asset('assets/front/images/products/orange-1.jpg')}}"
                                     src="{{asset('assets/front/images/products/orange-1.jpg')}}" alt="image-product">
                                <img class="lazyload img-hover"
                                     data-src="{{asset('assets/front/images/products/white-1.jpg')}}"
                                     src="{{asset('assets/front/images/products/white-1.jpg')}}" alt="image-product">
                            </a>
                            <div class="list-product-btn">
                                <a href="#quick_add" data-bs-toggle="modal"
                                   class="box-icon bg_white quick-add tf-btn-loading">
                                    <span class="icon icon-bag"></span>
                                    <span class="tooltip">Quick Add</span>
                                </a>
                                <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
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
                                    <img class="lazyload"
                                         data-src="{{asset('assets/front/images/products/orange-1.jpg')}}"
                                         src="{{asset('assets/front/images/products/orange-1.jpg')}}"
                                         alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Black</span>
                                    <span class="swatch-value bg_dark"></span>
                                    <img class="lazyload"
                                         data-src="{{asset('assets/front/images/products/black-1.jpg')}}"
                                         src="{{asset('assets/front/images/products/black-1.jpg')}}"
                                         alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">White</span>
                                    <span class="swatch-value bg_white"></span>
                                    <img class="lazyload"
                                         data-src="{{asset('assets/front/images/products/white-1.jpg')}}"
                                         src="{{asset('assets/front/images/products/white-1.jpg')}}"
                                         alt="image-product">
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-product fl-item">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product"
                                     data-src="{{asset('assets/front/images/products/orange-1.jpg')}}"
                                     src="{{asset('assets/front/images/products/orange-1.jpg')}}" alt="image-product">
                                <img class="lazyload img-hover"
                                     data-src="{{asset('assets/front/images/products/white-1.jpg')}}"
                                     src="{{asset('assets/front/images/products/white-1.jpg')}}" alt="image-product">
                            </a>
                            <div class="list-product-btn">
                                <a href="#quick_add" data-bs-toggle="modal"
                                   class="box-icon bg_white quick-add tf-btn-loading">
                                    <span class="icon icon-bag"></span>
                                    <span class="tooltip">Quick Add</span>
                                </a>
                                <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
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
                                    <img class="lazyload"
                                         data-src="{{asset('assets/front/images/products/orange-1.jpg')}}"
                                         src="{{asset('assets/front/images/products/orange-1.jpg')}}"
                                         alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Black</span>
                                    <span class="swatch-value bg_dark"></span>
                                    <img class="lazyload"
                                         data-src="{{asset('assets/front/images/products/black-1.jpg')}}"
                                         src="{{asset('assets/front/images/products/black-1.jpg')}}"
                                         alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">White</span>
                                    <span class="swatch-value bg_white"></span>
                                    <img class="lazyload"
                                         data-src="{{asset('assets/front/images/products/white-1.jpg')}}"
                                         src="{{asset('assets/front/images/products/white-1.jpg')}}"
                                         alt="image-product">
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-product fl-item">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product"
                                     data-src="{{asset('assets/front/images/products/orange-1.jpg')}}"
                                     src="{{asset('assets/front/images/products/orange-1.jpg')}}" alt="image-product">
                                <img class="lazyload img-hover"
                                     data-src="{{asset('assets/front/images/products/white-1.jpg')}}"
                                     src="{{asset('assets/front/images/products/white-1.jpg')}}" alt="image-product">
                            </a>
                            <div class="list-product-btn">
                                <a href="#quick_add" data-bs-toggle="modal"
                                   class="box-icon bg_white quick-add tf-btn-loading">
                                    <span class="icon icon-bag"></span>
                                    <span class="tooltip">Quick Add</span>
                                </a>
                                <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
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
                                    <img class="lazyload"
                                         data-src="{{asset('assets/front/images/products/orange-1.jpg')}}"
                                         src="{{asset('assets/front/images/products/orange-1.jpg')}}"
                                         alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Black</span>
                                    <span class="swatch-value bg_dark"></span>
                                    <img class="lazyload"
                                         data-src="{{asset('assets/front/images/products/black-1.jpg')}}"
                                         src="{{asset('assets/front/images/products/black-1.jpg')}}"
                                         alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">White</span>
                                    <span class="swatch-value bg_white"></span>
                                    <img class="lazyload"
                                         data-src="{{asset('assets/front/images/products/white-1.jpg')}}"
                                         src="{{asset('assets/front/images/products/white-1.jpg')}}"
                                         alt="image-product">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-product fl-item">
                        <div class="card-product-wrapper">
                            <a href="product-detail.html" class="product-img">
                                <img class="lazyload img-product"
                                     data-src="{{asset('assets/front/images/products/orange-1.jpg')}}"
                                     src="{{asset('assets/front/images/products/orange-1.jpg')}}" alt="image-product">
                                <img class="lazyload img-hover"
                                     data-src="{{asset('assets/front/images/products/white-1.jpg')}}"
                                     src="{{asset('assets/front/images/products/white-1.jpg')}}" alt="image-product">
                            </a>
                            <div class="list-product-btn">
                                <a href="#quick_add" data-bs-toggle="modal"
                                   class="box-icon bg_white quick-add tf-btn-loading">
                                    <span class="icon icon-bag"></span>
                                    <span class="tooltip">Quick Add</span>
                                </a>
                                <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
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
                                    <img class="lazyload"
                                         data-src="{{asset('assets/front/images/products/orange-1.jpg')}}"
                                         src="{{asset('assets/front/images/products/orange-1.jpg')}}"
                                         alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">Black</span>
                                    <span class="swatch-value bg_dark"></span>
                                    <img class="lazyload"
                                         data-src="{{asset('assets/front/images/products/black-1.jpg')}}"
                                         src="{{asset('assets/front/images/products/black-1.jpg')}}"
                                         alt="image-product">
                                </li>
                                <li class="list-color-item color-swatch">
                                    <span class="tooltip">White</span>
                                    <span class="swatch-value bg_white"></span>
                                    <img class="lazyload"
                                         data-src="{{asset('assets/front/images/products/white-1.jpg')}}"
                                         src="{{asset('assets/front/images/products/white-1.jpg')}}"
                                         alt="image-product">
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="tf-pagination-wrap view-more-button text-center">
                    <button class="tf-btn-loading tf-loading-default style-2 btn-loadmore "><span
                            class="text"> مشاهدة المزيد  </span></button>
                </div>
            </div>
        </section>

        <!-- End Best Product  -->

        <!-- Categories -->
        <section class="flat-spacing-4 flat-categorie">
            <div class="container-full">
                <div class="flat-title-v2">
                    <div class="box-sw-navigation">
                        <div class="nav-sw nav-next-slider nav-next-collection"><span class="icon icon-arrow-right"></span></div>
                        <div class="nav-sw nav-prev-slider nav-prev-collection"><span class="icon icon-arrow-left"></span></div>
                    </div>
                    <span class="text-3 fw-7 text-uppercase title wow fadeInUp" data-wow-delay="0s"> اقسام المتجر  </span>
                </div>
                <div class="row">
                    <div class="col-xl-9 col-lg-8 col-md-8">
                        <div class="swiper tf-sw-collection" data-preview="3" data-tablet="2" data-mobile="2" data-space-lg="30" data-space-md="30" data-space="15" data-loop="false" data-auto-play="false">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide" lazy="true">
                                    <div class="collection-item style-left hover-img">
                                        <div class="collection-inner">
                                            <a href="shop-default.html" class="collection-image img-style">
                                                <img class="lazyload" data-src="{{asset('assets/front/images/collections/collection-17.jpg')}}" src="{{asset('assets/front/images/collections/collection-17.jpg')}}" alt="collection-img">
                                            </a>
                                            <div class="collection-content">
                                                <a href="shop-default.html" class="tf-btn collection-title hover-icon fs-15"><span>Clothing</span><i class="icon icon-arrow1-top-left"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide" lazy="true">
                                    <div class="collection-item style-left hover-img">
                                        <div class="collection-inner">
                                            <a href="shop-default.html" class="collection-image img-style">
                                                <img class="lazyload" data-src="{{asset('assets/front/images/collections/collection-14.jpg')}}" src="{{asset('assets/front/images/collections/collection-14.jpg')}}" alt="collection-img">
                                            </a>
                                            <div class="collection-content">
                                                <a href="shop-default.html" class="tf-btn collection-title hover-icon fs-15"><span>Sunglasses</span><i class="icon icon-arrow1-top-left"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide" lazy="true">
                                    <div class="collection-item style-left hover-img">
                                        <div class="collection-inner">
                                            <a href="shop-default.html" class="collection-image img-style">
                                                <img class="lazyload" data-src="{{asset('assets/front/images/collections/collection-18.jpg')}}" src="{{asset('assets/front/images/collections/collection-18.jpg')}}" alt="collection-demo-1">
                                            </a>
                                            <div class="collection-content">
                                                <a href="shop-default.html" class="tf-btn collection-title hover-icon fs-15"><span>Bags</span><i class="icon icon-arrow1-top-left"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide" lazy="true">
                                    <div class="collection-item style-left hover-img">
                                        <div class="collection-inner">
                                            <a href="shop-default.html" class="collection-image img-style">
                                                <img class="lazyload" data-src="{{asset('assets/front/images/collections/collection-15.jpg')}}" src="{{asset('assets/front/images/collections/collection-15.jpg')}}" alt="collection-demo-1">
                                            </a>
                                            <div class="collection-content">
                                                <a href="shop-default.html" class="tf-btn collection-title hover-icon fs-15"><span>Fashion</span><i class="icon icon-arrow1-top-left"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide" lazy="true">
                                    <div class="collection-item style-left hover-img">
                                        <div class="collection-inner">
                                            <a href="shop-default.html" class="collection-image img-style">
                                                <img class="lazyload" data-src="{{asset('assets/front/images/collections/collection-20.jpg')}}" src="{{asset('assets/front/images/collections/collection-20.jpg')}}" alt="collection-demo-1">
                                            </a>
                                            <div class="collection-content">
                                                <a href="shop-default.html" class="tf-btn collection-title hover-icon fs-15"><span>Accessories</span><i class="icon icon-arrow1-top-left"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-4">
                        <div class="discovery-new-item">
                            <h5> جميع الاقسام  </h5>
                            <a href="shop-collection-list.html"><i class="icon-arrow1-top-left"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- /Categories -->
        <!-- Testimonial -->
        <section class="flat-spacing-5 pt_0 flat-testimonial">
            <div class="container">
                <div class="flat-title wow fadeInUp" data-wow-delay="0s">
                    <span class="title"> آراء العملاء  </span>
                    <p class="sub-title"> ماذا يقول العملاء عنا  </p>
                </div>
                <div class="wrap-carousel">
                    <div class="swiper tf-sw-testimonial" data-preview="3" data-tablet="2" data-mobile="1"
                         data-space-lg="30" data-space-md="15">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="testimonial-item style-column wow fadeInUp" data-wow-delay="0s">
                                    <div class="rating">
                                        <i class="icon-start"></i>
                                        <i class="icon-start"></i>
                                        <i class="icon-start"></i>
                                        <i class="icon-start"></i>
                                        <i class="icon-start"></i>
                                    </div>
                                    <div class="heading"> افضل موقع للتسوق  </div>
                                    <div class="text">
                                        “ أجد دائمًا شيئًا أنيقًا وبأسعار معقولة على موقع الأزياء هذا  ”
                                    </div>
                                    <div class="author">
                                        <div class="name"> محمد رمضان  </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimonial-item style-column wow fadeInUp" data-wow-delay="0s">
                                    <div class="rating">
                                        <i class="icon-start"></i>
                                        <i class="icon-start"></i>
                                        <i class="icon-start"></i>
                                        <i class="icon-start"></i>
                                        <i class="icon-start"></i>
                                    </div>
                                    <div class="heading"> افضل موقع للتسوق  </div>
                                    <div class="text">
                                        “ أجد دائمًا شيئًا أنيقًا وبأسعار معقولة على موقع الأزياء هذا  ”
                                    </div>
                                    <div class="author">
                                        <div class="name"> محمد رمضان  </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimonial-item style-column wow fadeInUp" data-wow-delay="0s">
                                    <div class="rating">
                                        <i class="icon-start"></i>
                                        <i class="icon-start"></i>
                                        <i class="icon-start"></i>
                                        <i class="icon-start"></i>
                                        <i class="icon-start"></i>
                                    </div>
                                    <div class="heading"> افضل موقع للتسوق  </div>
                                    <div class="text">
                                        “ أجد دائمًا شيئًا أنيقًا وبأسعار معقولة على موقع الأزياء هذا  ”
                                    </div>
                                    <div class="author">
                                        <div class="name"> محمد رمضان  </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimonial-item style-column wow fadeInUp" data-wow-delay="0s">
                                    <div class="rating">
                                        <i class="icon-start"></i>
                                        <i class="icon-start"></i>
                                        <i class="icon-start"></i>
                                        <i class="icon-start"></i>
                                        <i class="icon-start"></i>
                                    </div>
                                    <div class="heading"> افضل موقع للتسوق  </div>
                                    <div class="text">
                                        “ أجد دائمًا شيئًا أنيقًا وبأسعار معقولة على موقع الأزياء هذا  ”
                                    </div>
                                    <div class="author">
                                        <div class="name"> محمد رمضان  </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimonial-item style-column wow fadeInUp" data-wow-delay="0s">
                                    <div class="rating">
                                        <i class="icon-start"></i>
                                        <i class="icon-start"></i>
                                        <i class="icon-start"></i>
                                        <i class="icon-start"></i>
                                        <i class="icon-start"></i>
                                    </div>
                                    <div class="heading"> افضل موقع للتسوق  </div>
                                    <div class="text">
                                        “ أجد دائمًا شيئًا أنيقًا وبأسعار معقولة على موقع الأزياء هذا  ”
                                    </div>
                                    <div class="author">
                                        <div class="name"> محمد رمضان  </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimonial-item style-column wow fadeInUp" data-wow-delay="0s">
                                    <div class="rating">
                                        <i class="icon-start"></i>
                                        <i class="icon-start"></i>
                                        <i class="icon-start"></i>
                                        <i class="icon-start"></i>
                                        <i class="icon-start"></i>
                                    </div>
                                    <div class="heading"> افضل موقع للتسوق  </div>
                                    <div class="text">
                                        “ أجد دائمًا شيئًا أنيقًا وبأسعار معقولة على موقع الأزياء هذا  ”
                                    </div>
                                    <div class="author">
                                        <div class="name"> محمد رمضان  </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nav-sw nav-next-slider nav-next-testimonial lg"><span
                            class="icon icon-arrow-left"></span></div>
                    <div class="nav-sw nav-prev-slider nav-prev-testimonial lg"><span
                            class="icon icon-arrow-right"></span></div>
                    <div class="sw-dots style-2 sw-pagination-testimonial justify-content-center"></div>
                </div>
            </div>
        </section>
        <!-- /Testimonial -->
        <!-- Brand -->
        <section class="flat-spacing-12">
            <div class="">
                <div class="wrap-carousel wrap-brand wrap-brand-v2 autoplay-linear">
                    <div class="swiper tf-sw-brand border-0" data-play="true" data-loop="true" data-preview="6" data-tablet="4" data-mobile="2" data-space-lg="30" data-space-md="15">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="brand-item-v2">
                                    <img class="lazyload" data-src="{{asset('assets/front/images/brand/brand-01.png')}}" src="{{asset('assets/front/images/brand/brand-01.png')}}" alt="image-brand">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-item-v2">
                                    <img class="lazyload" data-src="{{asset('assets/front/images/brand/brand-02.png')}}" src="{{asset('assets/front/images/brand/brand-02.png')}}" alt="image-brand">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-item-v2">
                                    <img class="lazyload" data-src="{{asset('assets/front/images/brand/brand-03.png')}}" src="{{asset('assets/front/images/brand/brand-03.png')}}" alt="image-brand">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-item-v2">
                                    <img class="lazyload" data-src="{{asset('assets/front/images/brand/brand-04.png')}}" src="{{asset('assets/front/images/brand/brand-04.png')}}" alt="image-brand">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-item-v2">
                                    <img class="lazyload" data-src="{{asset('assets/front/images/brand/brand-05.png')}}" src="{{asset('assets/front/images/brand/brand-05.png')}}" alt="image-brand">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-item-v2">
                                    <img class="lazyload" data-src="{{asset('assets/front/images/brand/brand-06.png')}}" src="{{asset('assets/front/images/brand/brand-06.png')}}" alt="image-brand">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Brand -->
        <!-- Icon box -->
        <section class="flat-spacing-7 flat-iconbox wow fadeInUp" data-wow-delay="0s">
            <div class="container">
                <div class="wrap-carousel wrap-mobile">
                    <div class="swiper tf-sw-mobile" data-preview="1" data-space="15">
                        <div class="swiper-wrapper wrap-iconbox">
                            <div class="swiper-slide">
                                <div class="tf-icon-box style-border-line text-center">
                                    <div class="icon">
                                        <i class="icon-shipping"></i>
                                    </div>
                                    <div class="content">
                                        <div class="title"> شحن مجاني  </div>
                                        <p> احصل علي شحن مجاني عند طلب اكثر من 200 ريال  </p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tf-icon-box style-border-line text-center">
                                    <div class="icon">
                                        <i class="icon-payment fs-22"></i>
                                    </div>
                                    <div class="content">
                                        <div class="title"> اداوات دفع  </div>
                                        <p> ادفع من خلال طرق دفع متعددة  </p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tf-icon-box style-border-line text-center">
                                    <div class="icon">
                                        <i class="icon-return fs-22"></i>
                                    </div>
                                    <div class="content">
                                        <div class="title"> 14 يوم للاستبدال والارجاع  </div>
                                        <p> في خلال 30 يوم من خلال اي عملية شراء </p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tf-icon-box style-border-line text-center">
                                    <div class="icon">
                                        <i class="icon-suport"></i>
                                    </div>
                                    <div class="content">
                                        <div class="title"> دعم فني  </div>
                                        <p> دعم فني علي مدار ال 24 ساعة  </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="sw-dots style-2 sw-pagination-mb justify-content-center"></div>
                </div>
            </div>
        </section>
        <!-- /Icon box -->
    </div>
@endsection
