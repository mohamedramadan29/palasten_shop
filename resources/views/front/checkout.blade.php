@extends('front.layouts.master')
@section('title')
    اتمام الطلب
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
                <div class="heading text-center"> اتمام الطلب</div>
            </div>
        </div>
        <!-- /page-title -->

        <!-- page-cart -->
        <section class="flat-spacing-11">
            <div class="container">
                <form method="post" action="{{url('order/store')}}"
                      class="form-checkout tf-page-cart-checkout widget-wrap-checkout">
                    @csrf
                    <div class="tf-page-cart-wrap layout-2">
                        <div class="tf-page-cart-item">
                            <h5 class="fw-5 mb_20"> تفاصيل الشحن </h5>

                            <div class="box grid-2">
                                <fieldset class="fieldset">
                                    <label for="name"> الاسم الاول </label>
                                    <input type="text" id="name" placeholder="" name="name" required
                                           value="{{old('name')}}">
                                </fieldset>
                                <fieldset class="fieldset">

                                    <label for="name"> اسم العائلة </label>
                                    <input type="text" id="name2" placeholder="" name="name2" required
                                           value="{{old('name2')}}">
                                </fieldset>
                            </div>
                            <fieldset class="box fieldset">
                                <label for="country"> حدد المدينة </label>
                                <div class="select-custom">
                                    <select class="form-select w-100" id="shippingcity" name="shippingcity">
                                        <option value="" disabled selected> -- حدد --</option>
                                        @foreach($shippingCity as $city)
                                            <option
                                                {{old('shippingcity') == $city['id'] ? 'selected' : ''}} value="{{$city['id']}}">{{$city['city']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </fieldset>
                            <fieldset class="box fieldset">
                                <label for="address"> العنوان </label>
                                <input type="text" id="address" name="address" required value="{{old('address')}}">
                            </fieldset>
                            <fieldset class="box fieldset">
                                <label for="phone"> رقم الهاتف </label>
                                <input type="number" id="phone" name="phone" required value="{{old('phone')}}">
                            </fieldset>
                            <fieldset class="box fieldset">
                                <label for="phone2"> رقم بديل (اختياري) </label>
                                <input type="number" id="phone2" name="phone2" value="{{old('phone2')}}">
                            </fieldset>

                            <fieldset class="box fieldset">
                                <label for="note"> ملاحظات اضافية (اختياري)</label>
                                <textarea name="note" id="note">{{old('note')}}</textarea>
                            </fieldset>
                        </div>
                        <div class="tf-page-cart-footer">
                            <div class="tf-cart-footer-inner">
                                <h5 class="fw-5 mb_20"> طلبك </h5>
                                <ul class="wrap-checkout-product">
                                    @php $subtotal = 0 ; @endphp
                                    @foreach($cartitems as $item)
                                        @php  $subtotal = $subtotal + ($item['price'] * $item['qty']) @endphp
                                        <li class="checkout-product-item">
                                            <figure class="img-product">
                                                <img
                                                    src="{{asset('assets/uploads/product_images/'.$item['productdata']['image'])}}"
                                                    alt=" {{$item['productdata']['name']}}">
                                                <span class="quantity">{{$item['qty']}}</span>
                                            </figure>
                                            <div class="content">
                                                <div class="info">
                                                    <p class="name">Vanilla White</p>
                                                </div>
                                                <span
                                                    class="price">  {{$item['qty'] * $item['price']}} {{ $storeCurrency }} </span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="d-flex justify-content-between line pb_20 pt-4">
                                    <h6 class="fw-5"> مجموع المنتجات </h6>
                                    <h6 class="total-products fw-5"> {{number_format($subtotal,2)}}  {{ $storeCurrency }} </h6>
                                </div>
                                <div class="d-flex justify-content-between line pb_20 pt-4">
                                    <h6 class="fw-5"> قيمة الشحن </h6>
                                    <h6 class="shipping-price fw-5">$0.00</h6>
                                </div>
                                <form id="applycoupon" method="post" action="javascript:void(0);">
                                    @csrf
                                    <div class="coupon-box pb-20 pt-5 d-flex justify-content-between">
                                        <input id="code" name="code" type="text" placeholder=" كود خصم ">
                                        <button id="coupon_button" class="tf-btn btn-sm radius-3 btn-fill btn-icon animate-hover-btn">تطبيق</button>
                                    </div>
                                </form>

                                @if (Session::has('coupon_amount'))
                                    <div class="d-flex justify-content-between line pb_20 pt-4">
                                        <h6 class="fw-5"> قيمه الخصم </h6>
                                        <h6 class="fw-5">
                                            - {{ Session::get('coupon_amount') }} {{ $storeCurrency }}  </h6>
                                    </div>
                                @endif

                                <input type="hidden" id="shipping-price" name="shipping_price" value="">
                                <div class="d-flex justify-content-between line pb_20 pt-4">
                                    <h6 class="fw-5"> المجموع الكلي </h6>
                                    @if (Session::has('coupon_amount'))
                                        <h6 class="grand-total fw-5"> {{number_format($subtotal - Session::get('coupon_amount'), 2)}} {{ $storeCurrency }} </h6>
                                    @else
                                        <h6 class="grand-total fw-5"> {{number_format($subtotal, 2)}} {{ $storeCurrency }} </h6>
                                    @endif
                                    <input type="hidden" id="coupon_amount" name="coupon_amount"
                                           value="{{ Session::has('coupon_amount') ? Session::get('coupon_amount') : 0 }}">
                                    <input type="hidden" id="grand_total" name="grand_total" value="">
                                </div>
                                <div class="wd-check-payment">
                                </div>
                                <br>
                                <button
                                    class="tf-btn radius-3 btn-fill btn-icon animate-hover-btn justify-content-center">
                                    اتمام الطلب
                                </button>

                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </section>
    </div>
    <!-- page-cart -->
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#shippingcity').on('change', function () {
                var cityId = $(this).val(); // احصل على ID المدينة المحددة
                if (cityId) {
                    $.ajax({
                        url: '/get-shipping-price', // رابط API لجلب سعر الشحن
                        type: 'GET',
                        data: {city_id: cityId},
                        success: function (response) {
                            // تحديث قيمة الشحن في الواجهة
                            $('.shipping-price').text(response.price + ' {{ $storeCurrency }}');

                            // حساب المجموع الكلي: مجموع المنتجات + قيمة الشحن
                            var subtotal = parseFloat($('.total-products').text().replace(',', ''));
                            var shippingPrice = parseFloat(response.price);

                            // جلب قيم الخصم وقيمة الشحن
                            var couponAmount = parseFloat($('#coupon_amount').val()) || 0;
                            var shipping_price_input = document.getElementById('shipping-price');
                            shipping_price_input.value = shippingPrice;

                            // حساب المجموع الكلي
                            var grandTotal = (subtotal + shippingPrice) - couponAmount;
                            $('.grand-total').text(grandTotal.toFixed(2) + ' {{ $storeCurrency }}');
                            var grand_total = document.getElementById('grand_total');
                            grand_total.value = grandTotal;
                        },
                        error: function () {
                            alert('خطأ أثناء جلب سعر الشحن');
                        }
                    });
                }
            });
        });


    </script>

    <script>
        // Apply Coupon Code
        $("#coupon_button").click(function ($e) {
            $e.preventDefault();
            var code = $("#code").val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/apply_coupon',
                data: {code: code},
                success: function (resp) {
                    if (resp.message != '') {
                        alert(resp.message);
                        if (resp.coupon_amount > 0) {
                            $(".discountAmount").text(resp.coupon_amount + "ر.س");
                        } else {
                            $(".discountAmount").text(" 0 ر.س");
                        }
                        if (resp.grand_total > 0) {
                            $(".grand_total").text(resp.grand_total + "ر.س");
                        }
                        // إعادة تحميل الصفحة بعد تطبيق الكوبون
                        location.reload();
                    }

                }, error: function () {
                    alert('error');
                }
            });
        })
    </script>

@endsection
