@extends('front.layouts.master')
@section('title')
    فاتورة اتمام الطلب
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
                <div class="heading text-center"> فاتورة الطلب</div>
            </div>
        </div>
        <!-- /page-title -->
        <section class="invoice-section">
            <div class="cus-container2">
                <div class="top">
                    <a href="#" class="tf-btn btn-fill animate-hover-btn" onclick="printInvoice()">
                        طباعه الفاتورة
                    </a>

                </div>
                <div class="box-invoice print_content" id="print-content">
                    <div class="header">
                        <div class="wrap-top">
                            <div class="box-left">
                                <a href="{{url('/')}}">
                                    @php
                                    $publicsetting = \App\Models\admin\PublicSetting::select('website_logo')->first();
                                    $orderdata = \App\Models\front\Order::with('city')->where('id',\Illuminate\Support\Facades\Session::get('order_id'))->first();
                                    $items = \App\Models\front\OrderDetails::where('order_id',$orderdata['id'])->get();
                                            @endphp
                                    <img style="max-width: 150px" src="{{asset('assets/uploads/PublicSetting/'.$publicsetting['website_logo'])}}" alt="logo" class="logo">
                                </a>
                            </div>
                            <div class="box-right">
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <div class="title"> رقم الفاتورة  #</div>
                                    <span style="font-weight: bold;font-size: 20px" class="code-num">{{\Illuminate\Support\Facades\Session::get('order_id')}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="wrap-date">
                            <div class="box-left">
                                <label for=""> تاريخ الفاتورة  :</label>
                                <span class="date"> {{$orderdata['created_at']}} </span>
                            </div>
                        </div>
                        <div class="wrap-info">
                            <div class="box-left">
                                <div class="title"> بيانات العميل  </div>
                                <div class="wrap-table-invoice">
                                    <table class="invoice-table table table-bordered">
                                        <tbody>
                                        <tr style="border-bottom: 1px solid #ede8e8;">
                                            <th> الاسم  </th>
                                            <td> {{$orderdata['name']}} </td>
                                        </tr>

                                        <tr style="border-bottom: 1px solid #ede8e8;">
                                            <th> رقم الهاتف   </th>
                                            <td> {{$orderdata['phone']}} </td>
                                        </tr>
                                        <tr style="border-bottom: 1px solid #ede8e8;">
                                            <th>  البريد الالكتروني    </th>
                                            <td> {{$orderdata['email']}} </td>
                                        </tr>
                                        <tr style="border-bottom: 1px solid #ede8e8;">
                                            <th>  المدينة  </th>
                                            <td> {{$orderdata['city']['city']}} </td>
                                        </tr>
                                        <tr style="border-bottom: 1px solid #ede8e8;">
                                            <th>  العنوان   </th>
                                            <td> {{$orderdata['address']}} </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div class="wrap-table-invoice">
                            <table class="invoice-table">
                                <thead>
                                <tr class="title">
                                    <th> المنتج</th>
                                    <th> السعر</th>
                                    <th> الكمية</th>
                                    <th> المجموع</th>

                                </tr>
                                </thead>
                                <tbody>
                                @php $subtotal = 0 ; @endphp
                                @foreach($items as $item)
                                    @php  $subtotal = $subtotal + ($item['product_price'] * $item['product_qty']) @endphp
                                    <tr class="content">
                                        <td> {{$item['product_name']}}</td>
                                        <td>{{$item['product_price']}} {{ $storeCurrency }}</td>
                                        <td>{{$item['product_qty']}}</td>
                                        <td>{{$item['product_price'] * $item['product_qty']}} {{ $storeCurrency }} </td>
                                    </tr>
                                @endforeach
                                <tr class="content">
                                    <td class="total"> مجموع المنتجات  </td>
                                    <td></td>
                                    <td></td>
                                    <td class="total">{{$subtotal}} {{ $storeCurrency }}  </td>
                                </tr>
                                <tr class="content">
                                    <td class="total"> قيمة الشحن  </td>
                                    <td></td>
                                    <td></td>
                                    <td class="total">{{ $orderdata['shipping_price']}} {{ $storeCurrency }}  </td>
                                </tr>
                                <tr class="content">
                                    <td class="total"> المجموع الكلي   </td>
                                    <td></td>
                                    <td></td>
                                    <td class="total">{{ $orderdata['grand_total']}} {{ $storeCurrency }}  </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="footer">
                        <ul class="box-contact">
                            <li><a href="{{ url('/') }}">{{ url('/') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection

@section('js')
    <script>
        function printInvoice() {
            var printContent = document.getElementById('print-content').innerHTML;
            var originalContent = document.body.innerHTML;

            // استبدال محتوى الصفحة بالمحتوى الذي نريد طباعته فقط
            document.body.innerHTML = printContent;

            // أمر الطباعة
            window.print();

            // استعادة المحتوى الأصلي للصفحة بعد الطباعة
            document.body.innerHTML = originalContent;
        }
    </script>
@endsection
