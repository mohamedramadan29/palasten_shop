@extends('admin.layouts.master')
@section('title')
    الالوان العامة للموقع
@endsection
@section('css')
@endsection
@section('content')
    <!-- ==================================================== -->
    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">
            <form method="post" action="{{url('admin/colors/update')}}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-xl-12 col-lg-12 ">
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
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"> الالوان العامة للموقع </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 col-4">
                                    <div class="mb-3">
                                        <label for="website_background" class="form-label"> لون خلفية المتجر    </label>
                                        <input type="color" id="website_background" class="form-control" name="website_background"
                                               value="{{$colors['website_background']}}">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-4">
                                    <div class="mb-3">
                                        <label for="top_navbar_background" class="form-label"> خلفية الشريط الاعلاني  </label>
                                        <input type="color" id="top_navbar_background" class="form-control"
                                               name="top_navbar_background"
                                               value="{{$colors['top_navbar_background']}}">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-4">
                                    <div class="mb-3">
                                        <label for="second_navbar_background" class="form-label"> خلفية  شريط البحث   </label>
                                        <input type="color" id="second_navbar_background" class="form-control"
                                               name="second_navbar_background"
                                               value="{{$colors['second_navbar_background']}}">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-4">
                                    <div class="mb-3">
                                        <label for="third_navbar_background" class="form-label"> خلفية النافبار  </label>
                                        <input type="color" id="third_navbar_background" class="form-control"
                                               name="third_navbar_background"
                                               value="{{$colors['third_navbar_background']}}">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-4">
                                    <div class="mb-3">
                                        <label for="main_title_color" class="form-label"> اللون الاساسي للعناوين  </label>
                                        <input type="color" id="main_title_color" class="form-control"
                                               name="main_title_color"
                                               value="{{$colors['main_title_color']}}">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-4">
                                    <div class="mb-3">
                                        <label for="all_button_background" class="form-label">  لون خلفية عرض الكل  </label>
                                        <input type="color" id="all_button_background" class="form-control"
                                               name="all_button_background"
                                               value="{{$colors['all_button_background']}}">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-4">
                                    <div class="mb-3">
                                        <label for="main_price_color" class="form-label"> لون السعر الاساسي  </label>
                                        <input type="color" id="main_price_color" class="form-control"
                                               name="main_price_color"
                                               value="{{$colors['main_price_color']}}">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-4">
                                    <div class="mb-3">
                                        <label for="public_add_to_cart_background" class="form-label">  لون خلفية زر اضف الي السلة   </label>
                                        <input type="color" id="public_add_to_cart_background" class="form-control"
                                               name="public_add_to_cart_background"
                                               value="{{$colors['public_add_to_cart_background']}}">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-4">
                                    <div class="mb-3">
                                        <label for="public_add_to_cart_color" class="form-label">  لون  زر اضف الي السلة   </label>
                                        <input type="color" id="public_add_to_cart_color" class="form-control"
                                               name="public_add_to_cart_color"
                                               value="{{$colors['public_add_to_cart_color']}}">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-4">
                                    <div class="mb-3">
                                        <label for="footer_background" class="form-label"> لون خلفية الفوتر    </label>
                                        <input type="color" id="footer_background" class="form-control"
                                               name="footer_background"
                                               value="{{$colors['footer_background']}}">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-4">
                                    <div class="mb-3">
                                        <label for="footer_color" class="form-label"> لون نص الفوتر </label>
                                        <input type="color" id="footer_color" class="form-control"
                                               name="footer_color"
                                               value="{{$colors['footer_color']}}">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="p-3 bg-light mb-3 rounded">
                        <div class="row justify-content-end g-2">
                            <div class="col-lg-2">
                                <button type="submit" class="btn btn-outline-secondary w-100"> حفظ <i
                                        class='bx bxs-save'></i></button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>
    <!-- End Container Fluid -->


    <!-- ==================================================== -->
    <!-- End Page Content -->
    <!-- ==================================================== -->
@endsection

@section('js')

@endsection
