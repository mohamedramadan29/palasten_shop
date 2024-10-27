@extends('admin.layouts.master')
@section('title')
    فاتورة الطلب
@endsection
@section('css')

@endsection
@section('content')
    <!-- ==================================================== -->
    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">

            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Logo & title -->
                            <div class="clearfix pb-3 bg-info-subtle p-lg-3 p-2 m-n2 rounded position-relative">
                                <div class="">
                                    <div class="auth-logo">
                                        <img class="logo-dark me-1"
                                             src ={{Storage::url('uploads/PublicSetting/'.$publicsetting['website_logo'])}}

                                             alt="logo-dark"
                                             height="24"/>
                                    </div>
                                    <div class="mt-4">
                                        <table class="table table-bordered mb-0">
                                            <tbody>
                                            <tr>
                                                <td class="p-0 pe-5 py-1">
                                                    <p class="mb-0 text-dark fw-semibold"> رقم الفاتورة </p>
                                                </td>
                                                <td class="text-end text-dark fw-semibold px-0 py-1"># {{$order['id']}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-0 pe-5 py-1">
                                                    <p class="mb-0"> تاريخ الفاتورة : </p>
                                                </td>
                                                <td class="text-end text-dark fw-medium px-0 py-1"> {{$order['created_at']}}  </td>
                                            </tr>
                                            <tr>
                                                <td class="p-0 pe-5 py-1">
                                                    <p class="mb-0"> الاسم : </p>
                                                </td>
                                                <td class="text-end text-dark fw-medium px-0 py-1"> {{$order['name']}} </td>
                                            </tr>
                                            <tr>
                                                <td class="p-0 pe-5 py-1">
                                                    <p class="mb-0"> رقم الهاتف : </p>
                                                </td>
                                                <td class="text-end text-dark fw-medium px-0 py-1">{{$order['phone']}}</td>
                                            </tr>
                                            <tr>
                                                <td class="p-0 pe-5 py-1">
                                                    <p class="mb-0"> البريد الالكتروني : </p>
                                                </td>
                                                <td class="text-end text-dark fw-medium px-0 py-1">{{$order['email']}}</td>
                                            </tr>
                                            <tr>
                                                <td class="p-0 pe-5 py-1">
                                                    <p class="mb-0"> المدينة : </p>
                                                </td>
                                                <td class="text-end text-dark fw-medium px-0 py-1">{{$order['shipping']['city']}}</td>
                                            </tr>
                                            <tr>
                                                <td class="p-0 pe-5 py-1">
                                                    <p class="mb-0">العنوان : </p>
                                                </td>
                                                <td class="text-end text-dark fw-medium px-0 py-1">{{$order['address']}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="position-absolute top-100 start-50 translate-middle">
                                    <img src="{{asset('assets/admin/images/check-2.png')}}" alt="" class="img-fluid">
                                </div>
                            </div>

                            <div class="clearfix pb-3 mt-4">

                            </div>


                            <div class="row">
                                <div class="col-12">
                                    <div class="table-borderless table-responsive text-nowrap table-centered">
                                        <table class="table mb-0">
                                            <thead class="bg-light bg-opacity-50">
                                            <tr>
                                                <th> المنتج</th>
                                                <th> قيمة الشحن</th>
                                                <th> السعر الكلي</th>
                                            </tr>
                                            </thead> <!-- end thead -->
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div>
                                                            <a href="#!"
                                                               class="text-dark fw-medium fs-15">  {{$order['product_name']}} </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td> {{ number_format($order['ship_price'],2)}}  {{$publicsetting['website_currency']}} </td>
                                                <td> {{ number_format($order['total_price'],2)}}  {{$publicsetting['website_currency']}} </td>
                                            </tr>
                                            </tbody> <!-- end tbody -->
                                        </table> <!-- end table -->
                                    </div> <!-- end table responsive -->
                                </div> <!-- end col -->
                            </div> <!-- end row -->



                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <div class="alert alert-danger alert-icon p-2" role="alert">
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="avatar-sm rounded bg-danger d-flex justify-content-center align-items-center fs-18 me-2 flex-shrink-0">
                                                <i class="bx bx-info-circle text-white"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                توصيل الطلب يكون في حد اقصي 7 ايام
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3 mb-1">
                                <div class="text-end d-print-none">
                                    <a href="javascript:window.print()" class="btn btn-info width-xl"> طباعة </a>
                                </div>
                            </div>

                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div>
        <!-- End Container Fluid -->
    </div>
@endsection

@section('js')
@endsection
