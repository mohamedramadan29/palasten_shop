@extends('front.layouts.master')

@section('title')
    الرئيسية
@endsection

@section('content')
    <div class="page_content">
        <div class="hero">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('assets/front/images/banner1.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/front/images/banner2.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/front/images/banner3.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!------------------- Start Newer Products ---------------->
        <div class="new_producs">
            <div class="container">
                <div class="data">
                    <div class="data_header">
                        <div class="data_header_name">
                            <h1 class='header2'> احدث المنتجات   </h1>
                        </div>
                        <div>
                            <a href="shop" class='global_button btn'> تصفح المزيد </a>
                        </div>
                    </div>
                    <div class="products" id='products'>
                        <div class="product_info">
                            <div class="main_image">
                                <img src="{{ asset('assets/front/images/pro2.webp') }}" alt="">
                            </div>
                            <div class="product_details">
                                <h4> اسم المنتج الثاني </h4>
                                <div class="price">
                                    <p class="main_price text-decoration-line-through"> 20 <span> ريال </span> </p>
                                    <p class="sale_price"> 12 <span> ريال </span> </p>
                                </div>
                                <div class="add_cart">
                                    <button class="view_product"> <i class="bi bi-search-heart"></i> </button>
                                    <button class="btn global_button"> اضف للسلة <i class="bi bi-cart"></i> </button>
                                </div>
                            </div>
                        </div>
                        <div class="product_info">
                            <div class="main_image">
                                <img src="{{ asset('assets/front/images/pro1.webp') }}" alt="">
                            </div>
                            <div class="product_details">
                                <h4> اسم المنتج الثاني </h4>
                                <div class="price">
                                    <p class="main_price text-decoration-line-through"> 20 <span> ريال </span> </p>
                                    <p class="sale_price"> 12 <span> ريال </span> </p>
                                </div>
                                <div class="add_cart">
                                    <button class="view_product"> <i class="bi bi-search-heart"></i> </button>
                                    <button class="btn global_button"> اضف للسلة <i class="bi bi-cart"></i> </button>
                                </div>
                            </div>
                        </div>
                        <div class="product_info">
                            <div class="main_image">
                                <img src="{{ asset('assets/front/images/pro3.webp') }}" alt="">
                            </div>
                            <div class="product_details">
                                <h4> اسم المنتج الثاني </h4>
                                <div class="price">
                                    <p class="main_price text-decoration-line-through"> 20 <span> ريال </span> </p>
                                    <p class="sale_price"> 12 <span> ريال </span> </p>
                                </div>
                                <div class="add_cart">
                                    <button class="view_product"> <i class="bi bi-search-heart"></i> </button>
                                    <button class="btn global_button"> اضف للسلة <i class="bi bi-cart"></i> </button>
                                </div>
                            </div>
                        </div>
                        <div class="product_info">
                            <div class="main_image">
                                <img src="{{ asset('assets/front/images/pro4.webp') }}" alt="">
                            </div>
                            <div class="product_details">
                                <h4> اسم المنتج الثاني </h4>
                                <div class="price">
                                    <p class="main_price text-decoration-line-through"> 20 <span> ريال </span> </p>
                                    <p class="sale_price"> 12 <span> ريال </span> </p>
                                </div>
                                <div class="add_cart">
                                    <button class="view_product"> <i class="bi bi-search-heart"></i> </button>
                                    <button class="btn global_button"> اضف للسلة <i class="bi bi-cart"></i> </button>
                                </div>
                            </div>
                        </div>
                        <div class="product_info">
                            <div class="main_image">
                                <img src="{{ asset('assets/front/images/pro1.webp') }}" alt="">
                            </div>
                            <div class="product_details">
                                <h4> اسم المنتج الثاني </h4>
                                <div class="price">
                                    <p class="main_price text-decoration-line-through"> 20 <span> ريال </span> </p>
                                    <p class="sale_price"> 12 <span> ريال </span> </p>
                                </div>
                                <div class="add_cart">
                                    <button class="view_product"> <i class="bi bi-search-heart"></i> </button>
                                    <button class="btn global_button"> اضف للسلة <i class="bi bi-cart"></i> </button>
                                </div>
                            </div>
                        </div>
                        <div class="product_info">
                            <div class="main_image">
                                <img src="{{ asset('assets/front/images/pro3.webp') }}" alt="">
                            </div>
                            <div class="product_details">
                                <h4> اسم المنتج الثاني </h4>
                                <div class="price">
                                    <p class="main_price text-decoration-line-through"> 20 <span> ريال </span> </p>
                                    <p class="sale_price"> 12 <span> ريال </span> </p>
                                </div>
                                <div class="add_cart">
                                    <button class="view_product"> <i class="bi bi-search-heart"></i> </button>
                                    <button class="btn global_button"> اضف للسلة <i class="bi bi-cart"></i> </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!------------------- End Newer Products ------------------->

        <!------------------- Start Best  Products ---------------->
        <div class="new_producs">
            <div class="container">
                <div class="data">
                    <div class="data_header">
                        <div class="data_header_name">
                            <h1 class='header2'> افضل المنتجات مبيعا  </h1>
                        </div>
                        <div>
                            <a href="shop" class='global_button btn'> تصفح المزيد </a>
                        </div>
                    </div>
                    <div class="products" id='products'>
                        <div class="product_info">
                            <div class="main_image">
                                <img src="{{ asset('assets/front/images/pro2.webp') }}" alt="">
                            </div>
                            <div class="product_details">
                                <h4> اسم المنتج الثاني </h4>
                                <div class="price">
                                    <p class="main_price text-decoration-line-through"> 20 <span> ريال </span> </p>
                                    <p class="sale_price"> 12 <span> ريال </span> </p>
                                </div>
                                <div class="add_cart">
                                    <button class="view_product"> <i class="bi bi-search-heart"></i> </button>
                                    <button class="btn global_button"> اضف للسلة <i class="bi bi-cart"></i> </button>
                                </div>
                            </div>
                        </div>
                        <div class="product_info">
                            <div class="main_image">
                                <img src="{{ asset('assets/front/images/pro1.webp') }}" alt="">
                            </div>
                            <div class="product_details">
                                <h4> اسم المنتج الثاني </h4>
                                <div class="price">
                                    <p class="main_price text-decoration-line-through"> 20 <span> ريال </span> </p>
                                    <p class="sale_price"> 12 <span> ريال </span> </p>
                                </div>
                                <div class="add_cart">
                                    <button class="view_product"> <i class="bi bi-search-heart"></i> </button>
                                    <button class="btn global_button"> اضف للسلة <i class="bi bi-cart"></i> </button>
                                </div>
                            </div>
                        </div>
                        <div class="product_info">
                            <div class="main_image">
                                <img src="{{ asset('assets/front/images/pro3.webp') }}" alt="">
                            </div>
                            <div class="product_details">
                                <h4> اسم المنتج الثاني </h4>
                                <div class="price">
                                    <p class="main_price text-decoration-line-through"> 20 <span> ريال </span> </p>
                                    <p class="sale_price"> 12 <span> ريال </span> </p>
                                </div>
                                <div class="add_cart">
                                    <button class="view_product"> <i class="bi bi-search-heart"></i> </button>
                                    <button class="btn global_button"> اضف للسلة <i class="bi bi-cart"></i> </button>
                                </div>
                            </div>
                        </div>
                        <div class="product_info">
                            <div class="main_image">
                                <img src="{{ asset('assets/front/images/pro4.webp') }}" alt="">
                            </div>
                            <div class="product_details">
                                <h4> اسم المنتج الثاني </h4>
                                <div class="price">
                                    <p class="main_price text-decoration-line-through"> 20 <span> ريال </span> </p>
                                    <p class="sale_price"> 12 <span> ريال </span> </p>
                                </div>
                                <div class="add_cart">
                                    <button class="view_product"> <i class="bi bi-search-heart"></i> </button>
                                    <button class="btn global_button"> اضف للسلة <i class="bi bi-cart"></i> </button>
                                </div>
                            </div>
                        </div>
                        <div class="product_info">
                            <div class="main_image">
                                <img src="{{ asset('assets/front/images/pro1.webp') }}" alt="">
                            </div>
                            <div class="product_details">
                                <h4> اسم المنتج الثاني </h4>
                                <div class="price">
                                    <p class="main_price text-decoration-line-through"> 20 <span> ريال </span> </p>
                                    <p class="sale_price"> 12 <span> ريال </span> </p>
                                </div>
                                <div class="add_cart">
                                    <button class="view_product"> <i class="bi bi-search-heart"></i> </button>
                                    <button class="btn global_button"> اضف للسلة <i class="bi bi-cart"></i> </button>
                                </div>
                            </div>
                        </div>
                        <div class="product_info">
                            <div class="main_image">
                                <img src="{{ asset('assets/front/images/pro3.webp') }}" alt="">
                            </div>
                            <div class="product_details">
                                <h4> اسم المنتج الثاني </h4>
                                <div class="price">
                                    <p class="main_price text-decoration-line-through"> 20 <span> ريال </span> </p>
                                    <p class="sale_price"> 12 <span> ريال </span> </p>
                                </div>
                                <div class="add_cart">
                                    <button class="view_product"> <i class="bi bi-search-heart"></i> </button>
                                    <button class="btn global_button"> اضف للسلة <i class="bi bi-cart"></i> </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!------------------- End Best Products ------------------->


    </div>
@endsection


@section('js')
    <script>
        $(document).ready(function() {
            $('.products').slick({
                rtl: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                infinite: true,
                prevArrow: '<button type="button" class="slick-prev"><i class="bi bi-arrow-right-circle-fill"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="bi bi-arrow-left-circle-fill"></i></button>',
                centerMode: true,
                variableWidth: false,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 3,
                        }
                    },
                    {
                        breakpoint: 900,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            variableWidth: true,
                        }
                    }
                ]

            });
        });
    </script>
@endsection
