@extends('admin.layouts.master')
@section('title')
    تعديل كوبون الخصم
@endsection
@section('css')

    {{--    <!-- DataTables CSS -->--}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@endsection
@section('content')
    <!-- ==================================================== -->
    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-xxl">
            <form method="post" action="{{url('admin/coupon/update/'.$coupon_data['id'])}}" enctype="multipart/form-data">
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
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> تعديل كوبون الخصم  </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label"> كود الخصم </label>
                                            <input required type="text" class="form-control" name="coupon_code"
                                                   value="{{$coupon_data['coupon_code'] }}">
                                        </div>

                                    </div>

                                    <div class="col-lg-6">
                                        <label for="categories" class="form-label"> حدد الاقسام </label>
                                        <select required name='categories[]' class="form-control"
                                                id="categories" id="choices-multiple-remove-button" data-choices data-choices-removeItem name="choices-multiple-remove-button" multiple>
                                            <option value=""> -- حدد نوع القسم --</option>
                                            <option @if($coupon_data['categories'] == 'all') selected
                                                    @endif value="all"> الكل
                                            </option>
                                            @php
                                                $coupon_categories = explode(',',$coupon_data['categories']);
                                            @endphp
                                            @foreach ($allcategories as $category)
                                                <option @if(in_array($category['id'],$coupon_categories)) selected
                                                        @endif value='{{ $category['id'] }}'> {{ $category['name'] }} </option>
                                            @endforeach
                                        </select>


                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="users" class="form-label"> المستخدمين </label>
                                            <select required name='users[]' class="form-control" id="users" id="choices-multiple-remove-button" data-choices data-choices-removeItem name="choices-multiple-remove-button" multiple>
                                                <option value=""> -- حدد المتسخدمين --</option>
                                                <option @if($coupon_data['users'] == 'all') selected @endif value="all">
                                                    الكل
                                                </option>
                                                @php $users = explode(',',$coupon_data['users']) @endphp
                                                @foreach ($allusers as $user)
                                                    <option @if(in_array($user['email'],$users)) selected
                                                            @endif value='{{ $user['email'] }}'> {{ $user['email'] }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="type" class="form-label"> نوع استخدام الكوبون </label>
                                            <select required name="coupon_type" class="form-control" id="type" data-choices
                                                    data-choices-groups data-placeholder="Select Crater">
                                                <option value=""> -- حدد نوع استخدام  الكوبون --</option>
                                                <option @if($coupon_data['coupon_type'] == 'مرة واحده') selected
                                                        @endif  value='مرة واحده'> مره واحده
                                                </option>
                                                <option @if($coupon_data['coupon_type'] == 'اكثر من مره') selected
                                                        @endif value='اكثر من مره'> اكثر من مره
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="amount_type" class="form-label"> نوع الخصم  </label>
                                            <select required name="amount_type" class="form-control" id="amount_type" data-choices
                                                    data-choices-groups data-placeholder="Select Crater">
                                                <option value=""> -- حدد نوع الخصم --</option>
                                                <option @if($coupon_data['amount_type'] == 'خصم ثابت') selected
                                                        @endif value='خصم ثابت'> خصم ثابت
                                                </option>
                                                <option @if($coupon_data['amount_type'] == 'متغير٪') selected
                                                        @endif value='متغير٪'> متغير [ % ]
                                                </option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label"> قيمه الخصم  </label>
                                            <input required type="number" min="1" class="form-control"
                                                   name="amount" value="{{$coupon_data['amount']}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">تاريخ الانتهاء  </label>
                                            <input required type="date" class="form-control" name="expire_date"
                                                   value="{{ $coupon_data['expire_date'] }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="status" class="form-label">  الحاله  </label>
                                        <select required name="status" class="form-control" id="status" data-choices
                                                data-choices-groups data-placeholder="Select Crater">
                                            <option value=""> -- حدد حالة -- </option>
                                            <option @if($coupon_data['status'] == 1) selected @endif value='1'>
                                                فعال
                                            </option>
                                            <option @if($coupon_data['status'] == 0) selected @endif value='0'> غير
                                                فعال
                                            </option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="p-3 bg-light mb-3 rounded">
                            <div class="row justify-content-end g-2">
                                <div class="col-lg-2">
                                    <a href="{{url('admin/main-categories')}}" class="btn btn-primary w-100"> رجوع </a>
                                </div>
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
