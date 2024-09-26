@extends('front.layouts.master')
@section('title')
    الرئيسية | سلة الشراء
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
                <div class="heading text-center"> سلة الشراء</div>
            </div>
        </div>
        <!-- /page-title -->

        <!-- page-cart -->
        <section class="flat-spacing-11">
            <div class="container">
                @if($cartcount > 0 )

                    {{--            <div class="tf-cart-countdown">--}}
                    {{--                <div class="title-left">--}}
                    {{--                    <svg class="d-inline-block" xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 16 24" fill="rgb(219 18 21)">--}}
                    {{--                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0899 24C11.3119 22.1928 11.4245 20.2409 10.4277 18.1443C10.1505 19.2691 9.64344 19.9518 8.90645 20.1924C9.59084 18.2379 9.01896 16.1263 7.19079 13.8576C7.15133 16.2007 6.58824 17.9076 5.50148 18.9782C4.00436 20.4517 4.02197 22.1146 5.55428 23.9669C-0.806588 20.5819 -1.70399 16.0418 2.86196 10.347C3.14516 11.7228 3.83141 12.5674 4.92082 12.8809C3.73335 7.84186 4.98274 3.54821 8.66895 0C8.6916 7.87426 11.1062 8.57414 14.1592 12.089C17.4554 16.3071 15.5184 21.1748 10.0899 24Z"></path>--}}
                    {{--                    </svg>--}}
                    {{--                    <p>These products are limited, checkout within </p>--}}
                    {{--                </div>--}}
                    {{--                <div class="js-countdown timer-count" data-timer="600" data-labels="d:,h:,m:,s"></div>--}}
                    {{--            </div>--}}
                    <div class="tf-page-cart-wrap">
                        <div class="tf-page-cart-item">
                            <table class="tf-table-page-cart">
                                <thead>
                                <tr>
                                    <th> المنتج</th>
                                    <th> السعر</th>
                                    <th> الكمية</th>
                                    <th> المجموع</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $subtotal = 0 ; @endphp
                                @foreach($cartItems as $item)
                                    @php  $subtotal = $subtotal + ($item['price'] * $item['qty']) @endphp
                                    <tr class="tf-cart-item file-delete">
                                        <td class="tf-cart-item_product">
                                            <a href="{{url('product/'.$item['productdata']['slug'])}}" class="img-box">
                                                <img
                                                    src="{{asset('assets/uploads/product_images/'.$item['productdata']['image'])}}"
                                                    alt="img-product">
                                            </a>
                                            <div class="cart-info">
                                                <a href="{{url('product/'.$item['productdata']['slug'])}}"
                                                   class="cart-title link"> {{$item['productdata']['name']}} </a>
                                                <div class="cart-meta-variant">White / M</div>
                                                <form method="post" action="{{url('cart/delete/'.$item['id'])}}">
                                                    @csrf
                                                    <input type="hidden" name="item_id" value="{{$item['id']}}">
                                                    <button type="submit" class="remove-cart"><i
                                                            class="bi bi-trash-fill"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                        <td class="tf-cart-item_price" cart-data-title="Price">
                                            <div class="cart-price">  {{$item['price']}} {{ $storeCurrency }} </div>
                                        </td>
                                        <td class="tf-cart-item_quantity" cart-data-title="Quantity">
                                            <div class="cart-quantity">
                                                <div class="wg-quantity">
                                                    <span class="btn-quantity minus-btn">
                                                        <svg class="d-inline-block" width="9" height="1"
                                                             viewBox="0 0 9 1" fill="currentColor"><path
                                                                d="M9 1H5.14286H3.85714H0V1.50201e-05H3.85714L5.14286 0L9 1.50201e-05V1Z"></path></svg>
                                                    </span>
                                                    <input type="text" name="number" value="{{$item['qty']}}">
                                                    <span class="btn-quantity plus-btn">
                                                        <svg class="d-inline-block" width="9" height="9"
                                                             viewBox="0 0 9 9" fill="currentColor"><path
                                                                d="M9 5.14286H5.14286V9H3.85714V5.14286H0V3.85714H3.85714V0H5.14286V3.85714H9V5.14286Z"></path></svg>
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="tf-cart-item_total" cart-data-title="Total">
                                            <div
                                                class="cart-total"> {{$item['qty'] * $item['price']}} {{ $storeCurrency }} </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tf-page-cart-footer">
                            <div class="tf-cart-footer-inner">
                                <div class="tf-page-cart-checkout">
                                    <div class="tf-cart-totals-discounts">
                                        <h3> المجموع الفرعي  </h3>
                                        <span class="total-value"> {{$subtotal}} {{ $storeCurrency }}  </span>
                                    </div>
                                    <div class="cart-checkbox">
                                        <input type="checkbox" class="tf-check" id="check-agree">
                                        <label for="check-agree" class="fw-4">
                                            الموافقة علي  <a href="{{url('terms')}}"> الشروط والاحكام  </a>
                                        </label>
                                    </div>
                                    <div class="cart-checkout-btn">
                                        <a href="{{url('checkout')}}"
                                           class="tf-btn w-100 btn-fill animate-hover-btn radius-3 justify-content-center">
                                            <span> اتمام الطلب  </span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="tf-page-cart text-center mt_140 mb_200">
                        <h5 class="mb_24"> سلة المشتريات فارغة </h5>
                        <p class="mb_24"> يمكنك الاطلاع على جميع المنتجات المتوفرة وشراء بعضها في المتجر </p>
                        <a href="{{url('shop')}}" class="tf-btn btn-sm radius-3 btn-fill btn-icon animate-hover-btn">
                            الرجوع الي المتجر <i class="icon icon-arrow1-top-left"></i></a>
                    </div>
                @endif

            </div>
        </section>
    </div>
    <!-- page-cart -->
@endsection
