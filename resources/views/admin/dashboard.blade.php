@extends('admin.layouts.master')
@section('title')
    الرئيسية
@endsection
@section('content')
    <!-- ==================================================== -->
    <!-- Start right Content here -->
    <!-- ==================================================== -->
    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">

            <!-- Start here.... -->

            <div class="row">
                <div class="col-md-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-md bg-soft-primary rounded">
                                        <i class="bx bx-cart avatar-title fs-32 text-primary"></i>
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-6 text-end">
                                    <p class="text-muted mb-0"> الطلبات </p>
                                    <h3 class="text-dark mt-1 mb-0"> 1000 </h3>
                                </div> <!-- end col -->
                            </div> <!-- end row-->
                        </div> <!-- end card body -->
                        <div class="card-footer py-2 bg-light bg-opacity-50">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="{{url('admin/transactions')}}" class="text-reset fw-semibold fs-12"> مشاهدة
                                    التفاصيل </a>
                            </div>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
                <div class="col-md-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-md bg-soft-primary rounded">
                                        <iconify-icon icon="solar:t-shirt-bold-duotone"
                                                      class="avatar-title fs-32 text-primary"></iconify-icon>
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-6 text-end">
                                    <p class="text-muted mb-0"> المنتجات </p>
                                    <h3 class="text-dark mt-1 mb-0"> 80 </h3>
                                </div> <!-- end col -->
                            </div> <!-- end row-->
                        </div> <!-- end card body -->
                        <div class="card-footer py-2 bg-light bg-opacity-50">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="{{url('admin/transactions')}}" class="text-reset fw-semibold fs-12"> مشاهدة
                                    التفاصيل </a>
                            </div>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-md-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-md bg-soft-primary rounded">
                                        <iconify-icon icon="solar:clipboard-list-bold-duotone"
                                                      class="avatar-title fs-24 text-primary"></iconify-icon>
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-6 text-end">
                                    <p class="text-muted mb-0"> التصنيفات الرئيسية </p>
                                    <h3 class="text-dark mt-1 mb-0"> 10 </h3>
                                </div> <!-- end col -->
                            </div> <!-- end row-->
                        </div> <!-- end card body -->
                        <div class="card-footer py-2 bg-light bg-opacity-50">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="#!" class="text-reset fw-semibold fs-12"> مشاهدة التفاصيل </a>
                            </div>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-md-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-md bg-soft-primary rounded">
                                        <i class="bx bx-user avatar-title fs-24 text-primary"></i>
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-6 text-end">
                                    <p class="text-muted mb-0 text-truncate"> العملاء </p>
                                    <h3 class="text-dark mt-1 mb-0">3</h3>
                                </div> <!-- end col -->
                            </div> <!-- end row-->
                        </div> <!-- end card body -->
                        <div class="card-footer py-2 bg-light bg-opacity-50">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="#!" class="text-reset fw-semibold fs-12"> مشاهدة التفاصيل </a>
                            </div>
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div> <!-- end row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-3anchor" id="datalabels"> رسم بياني شهري للمبيعات </h4>
                        </div>
                        <div class="card-body">
                            <div dir="ltr">
                                <div id="datalabels-column" class="apex-charts"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-3anchor" id="datalabels"> احدث الطلبات   </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table-search" class="table table-bordered gridjs-table align-middle mb-0 table-hover table-centered">
                                    <thead class="bg-light-subtle">
                                    <tr>
                                        <th style="width: 20px;">
                                        </th>
                                        <th> الاسم   </th>
                                        <th> البريد الالكتروني  </th>
                                        <th> السعر الكلي  </th>
                                        <th> العمليات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php

                                        $i = 1;
                                    @endphp
{{--                                    @foreach($brands as $brand)--}}
                                        <tr>
                                            <td>
                                               1
                                            </td>
                                            <td> محمد رمضان   </td>
                                            <td>
                                              mohamed@gmail.com
                                            </td>
                                            <td> 1000 دولار </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="#" class="btn btn-soft-primary btn-sm">
                                                        <iconify-icon icon="solar:pen-2-broken"
                                                                      class="align-middle fs-18"></iconify-icon>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td> محمد رمضان   </td>
                                        <td>
                                            mohamed@gmail.com
                                        </td>
                                        <td> 1000 دولار </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="#" class="btn btn-soft-primary btn-sm">
                                                    <iconify-icon icon="solar:pen-2-broken"
                                                                  class="align-middle fs-18"></iconify-icon>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            2
                                        </td>
                                        <td> محمد رمضان   </td>
                                        <td>
                                            mohamed@gmail.com
                                        </td>
                                        <td> 1000 دولار </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="#" class="btn btn-soft-primary btn-sm">
                                                    <iconify-icon icon="solar:pen-2-broken"
                                                                  class="align-middle fs-18"></iconify-icon>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            3
                                        </td>
                                        <td> محمد رمضان   </td>
                                        <td>
                                            mohamed@gmail.com
                                        </td>
                                        <td> 1000 دولار </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="#" class="btn btn-soft-primary btn-sm">
                                                    <iconify-icon icon="solar:pen-2-broken"
                                                                  class="align-middle fs-18"></iconify-icon>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            4
                                        </td>
                                        <td> محمد رمضان   </td>
                                        <td>
                                            mohamed@gmail.com
                                        </td>
                                        <td> 1000 دولار </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="#" class="btn btn-soft-primary btn-sm">
                                                    <iconify-icon icon="solar:pen-2-broken"
                                                                  class="align-middle fs-18"></iconify-icon>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
{{--                                    @endforeach--}}

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- ==================================================== -->
    <!-- End Page Content -->
    <!-- ==================================================== -->
@endsection

@section('js')
    <script src="{{asset('assets/admin/js/components/apexchart-column.js')}}"></script>
@endsection
