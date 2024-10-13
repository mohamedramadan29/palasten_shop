@extends('front.layouts.master')
@section('title')
     المتجر
@endsection

@section('content')
    <div class="page_content">

        <!-- page-title -->
        <div class="tf-page-title">
            <div class="container-full">
                <div class="heading text-center"> المتجر  </div>
                <p class="text-center text-2 text_black-2 mt_5"> جميع المنتجات  </p>
            </div>
        </div>
        <!-- /page-title -->

        <!-- Section Product -->
        <section class="flat-spacing-2">
            <div class="container">
                <div class="tf-shop-control grid-3 align-items-center">

                    <ul class="tf-control-layout d-flex justify-content-center">
                        <li class="tf-view-layout-switch sw-layout-2" data-value-grid="grid-2">
                            <div class="item"><span class="icon icon-grid-2"></span></div>
                        </li>
                        <li class="tf-view-layout-switch sw-layout-3" data-value-grid="grid-3">
                            <div class="item"><span class="icon icon-grid-3"></span></div>
                        </li>
                        <li class="tf-view-layout-switch sw-layout-4 active" data-value-grid="grid-4">
                            <div class="item"><span class="icon icon-grid-4"></span></div>
                        </li>
                        <li class="tf-view-layout-switch sw-layout-5" data-value-grid="grid-5">
                            <div class="item"><span class="icon icon-grid-5"></span></div>
                        </li>
                        <li class="tf-view-layout-switch sw-layout-6" data-value-grid="grid-6">
                            <div class="item"><span class="icon icon-grid-6"></span></div>
                        </li>
                    </ul>
                    <div class="tf-control-sorting d-flex justify-content-end">
                        <div class="tf-dropdown-sort" style="border: none" data-bs-toggle="dropdown">
                            <form class="filter-choice select-form" name="sortProducts" id="sortProducts">
                                <select name="sort" title="sort-by" class="form-select"
                                        data-placeholder="Price: Low to High" id="sort" class="chosen-select">
                                    <option value="" selected> رتب حسب</option>
                                    <option
                                        @if(isset($_GET['sort']) && $_GET['sort'] == 'price_from_low_heigh') selected
                                        @endif value="price_from_low_heigh"> السعر : من الاقل الي الاعلي
                                    </option>
                                    <option
                                        @if(isset($_GET['sort']) && $_GET['sort'] == 'price_from_hieght_low') selected
                                        @endif value="price_from_hieght_low"> السعر : من الاعلي الي الاقل
                                    </option>
                                    <option @if(isset($_GET['sort']) && $_GET['sort'] == 'oldest') selected
                                            @endif value="oldest"> رتب حسب الاقدم
                                    </option>
                                    <option @if(isset($_GET['sort']) && $_GET['sort'] == 'latest') selected
                                            @endif value="latest">رتب حسب الاحدث
                                    </option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="wrapper-control-shop">
                    <div class="meta-filter-shop"></div>
                    <div class="grid-layout wrapper-shop" data-grid="grid-4">
                        @foreach($products as $product)
                            <div class="card-product">
                                <div class="card-product-wrapper">
                                    <a href="{{url('product/'.$product['slug'])}}" class="product-img">
                                        <img class="lazyload img-product"
                                             data-src="{{asset('assets/uploads/product_images/'.$product['image'])}}"
                                             src="{{asset('assets/uploads/product_images/'.$product['image'])}}"
                                             alt="{{$product['name']}}">
                                        @if($product->gallary && $product->gallary->first())
                                            <img class="lazyload img-hover"
                                                 data-src="{{asset('assets/uploads/product_gallery/'.$product->gallary->first()->image)}}"
                                                 src="{{asset('assets/uploads/product_gallery/'.$product->gallary->first()->image)}}"
                                                 alt="{{$product['name']}}">
                                        @else
                                            <img class="lazyload img-hover"
                                                 data-src="{{asset('assets/uploads/product_images/'.$product['image'])}}"
                                                 src="{{asset('assets/uploads/product_images/'.$product['image'])}}"
                                                 alt="{{$product['name']}}">
                                        @endif

                                    </a>
                                    <div class="list-product-btn">
                                        <form id="wishlistForm_{{$product['id']}}" method="post"
                                              action="{{url('wishlist/store')}}">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$product['id']}}">
                                            <button type="button" id="addToWishlist_{{$product['id']}}"
                                                    class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip"> اضف الي المفضلة  </span>
                                                <span class="icon icon-heart"></span>
                                            </button>
                                        </form>
                                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                        <script>
                                            $(document).ready(function () {
                                                $('#addToWishlist_{{$product['id']}}').on('click', function (e) {
                                                    e.preventDefault();
                                                    $.ajax({
                                                        method: 'POST',
                                                        url: 'wishlist/store',
                                                        data: $('#wishlistForm_{{$product['id']}}').serialize(),
                                                        success: function (response) {
                                                            // عرض الرسالة باستخدام Toastify
                                                            Toastify({
                                                                text: response.message, // عرض الرسالة من response
                                                                duration: 3000, // المدة الزمنية لعرض الرسالة
                                                                gravity: "top", // اتجاه العرض
                                                                position: "right", // موقع الرسالة
                                                                backgroundColor: "#4CAF50", // لون الخلفية للرسالة
                                                            }).showToast();
                                                            if (response.wishlistCount) {
                                                                $('.nav-wishlist .count-box').text(response.wishlistCount);
                                                            }
                                                        },
                                                        error: function (xhr, status, error) {
                                                            $('#wishlistMessage').html('<p>حدث خطأ أثناء إضافة المنتج للمفضلة</p>');
                                                        }
                                                    });
                                                });
                                            });
                                        </script>
                                        <button data-id="{{$product->id}}" href="" data-bs-toggle="modal"
                                                class="box-icon bg_white quickview tf-btn-loading btn-quick-view">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip"> مشاهدة </span>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <a href="{{url('product/'.$product['slug'])}}"
                                       class="title link"> {{$product['name']}} </a>
                                    @if(isset($product['discount']) && $product['discount'] !=null)
                                        <div class="">
                                                    <span
                                                        class="price main_price"> {{$product['discount']}} {{ $storeCurrency }} </span>
                                            <span
                                                class="price old_price"> {{$product['price']}} {{ $storeCurrency }} </span>
                                        </div>
                                    @else
                                        <span
                                            class="price main_price"> {{$product['price']}} {{ $storeCurrency }} </span>
                                    @endif

                                    @php
                                        $productVariations = \App\Models\admin\ProductVartions::where('product_id', $product['id'])->get();
                                    @endphp
                                    @if($productVariations->count() > 0)
                                        <a href="{{url('product/'.$product['slug'])}}" class="add-to-cart">
                                            مشاهدة الاختيارات
                                        </a>
                                    @else
                                        <form id="addToCart_{{$product['id']}}" class="" method="post"
                                              action="{{url('cart/add')}}">
                                            <input type="hidden" name="product_id" value="{{$product['id']}}">
                                            <input type="hidden" name="number" value="1">
                                            @if(isset($product['discount']) && $product['discount'] !=null)
                                                <input type="hidden" name="price"
                                                       value="{{$product['discount']}}">
                                            @else
                                                <input type="hidden" name="price" value="{{$product['price']}}">
                                            @endif
                                            <input type="hidden" id="hidden-variation" placeholder="دشقفهخر "
                                                   name="hidden-variation" value="">

                                            <button id="addtocartbutton_{{$product['id']}}" class="add-to-cart">
                                                اضف الي السلة
                                            </button>
                                        </form>
                                        <script>
                                            $(document).ready(function () {
                                                $("#addtocartbutton_{{$product['id']}}").on('click', function (e) {
                                                    e.preventDefault();
                                                    $.ajax({
                                                        url: '/cart/add',
                                                        method: 'POST',
                                                        headers: {
                                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                        },
                                                        data: $("#addToCart_{{$product['id']}}").serialize(),
                                                        success: function (response) {
                                                            // عرض الرسالة باستخدام Toastify
                                                            Toastify({
                                                                text: response.message,
                                                                duration: 3000,
                                                                gravity: "top",
                                                                position: "right",
                                                                backgroundColor: "#4CAF50",
                                                            }).showToast();

                                                            // تحديث عداد المنتجات في السلة
                                                            if (response.cartCount) {
                                                                $('.nav-cart .count-box').text(response.cartCount);
                                                            }

                                                            // تحديث محتويات الـ modal للسلة فورًا
                                                            updateCartModal();

                                                            // إظهار الـ modal بعد الإضافة
                                                            $('#shoppingCart').modal('show');
                                                        },
                                                        error: function (xhr, status, error) {
                                                            $('#wishlistMessage').html('<p>حدث خطأ أثناء إضافة المنتج للسلة </p>');
                                                        }
                                                    });
                                                });

                                                function updateCartModal() {
                                                    $.ajax({
                                                        url: '/cart/items', // رابط جلب العناصر المحدثة
                                                        method: 'GET',
                                                        success: function (response) {
                                                            console.log('Cart modal response:', response); // طباعة استجابة السيرفر للتحقق من البيانات

                                                            // استبدال محتويات الـ modal بالـ HTML المستلم من السيرفر
                                                            $('#shoppingCart .wrap').html(response.html);

                                                            // تحديث عداد السلة
                                                            $('.nav-cart .count-box').text(response.cartCount); // تحديث العداد مباشرة

                                                            // تحديث متغير $cartCount في الواجهة إذا كنت تستخدمه في أماكن أخرى
                                                            window.cartCount = response.cartCount; // تخزين القيمة في متغير عالمي
                                                            console.log(window.cartCount);
                                                        },
                                                        error: function (xhr, status, error) {
                                                            console.log('خطأ في تحديث السلة');
                                                        }
                                                    });
                                                }
                                            });

                                        </script>
                                    @endif


                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- pagination -->
                    {!! $products->links('vendor.pagination.pagination') !!}
                </div>

            </div>
        </section>
        <!-- /Section Product -->

    </div>
@endsection


@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('body').on('click', '#addtocartbutton', function (e) {
                e.preventDefault(); // منع السلوك الافتراضي للنموذج
                // إرسال الطلب باستخدام AJAX
                $.ajax({
                    url: '/cart/add',
                    method: 'POST',
                    data: $("#addToCart").serialize(), // البيانات المرسلة
                    success: function (response) {
                        // عرض الرسالة باستخدام Toastify
                        Toastify({
                            text: response.message,
                            duration: 3000,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#4CAF50",
                        }).showToast();

                        if (response.cartCount) {
                            $('.nav-cart .count-box').text(response.cartCount);
                        }
                        // تحديث عربة التسوق
                        // تحديث محتويات الـ modal للسلة فورًا
                        updateCartModal();

                        // إظهار الـ modal بعد الإضافة
                        $('#shoppingCart').modal('show');
                        $('#quick_view').modal('hide');
                    },
                    error: function (xhr, status, error) {
                        console.error("Error:", xhr.responseText); // عرض أي أخطاء
                        $('#wishlistMessage').html('<p>حدث خطأ أثناء إضافة المنتج للسلة</p>');
                    }
                });
            });

            // تحديث عربة التسوق
            function updateCartModal() {
                $.ajax({
                    url: '/cart/items', // رابط جلب العناصر المحدثة
                    method: 'GET',
                    success: function (response) {
                        console.log('Cart modal response:', response); // طباعة استجابة السيرفر للتحقق من البيانات

                        // استبدال محتويات الـ modal بالـ HTML المستلم من السيرفر
                        $('#shoppingCart .wrap').html(response.html);

                        // تحديث عداد السلة
                        $('.nav-cart .count-box').text(response.cartCount); // تحديث العداد مباشرة

                        // تحديث متغير $cartCount في الواجهة إذا كنت تستخدمه في أماكن أخرى
                        window.cartCount = response.cartCount; // تخزين القيمة في متغير عالمي
                        console.log(window.cartCount);
                    },
                    error: function (xhr, status, error) {
                        console.log('خطأ في تحديث السلة');
                    }
                });
            }
        });

    </script>

    <script>
        document.querySelectorAll('.btn-quick-view').forEach(button => {
            button.addEventListener('click', function () {
                const productId = this.getAttribute('data-id');

                // طلب AJAX لجلب البيانات
                fetch(`/product/quick-view/${productId}`)
                    .then(response => response.text())
                    .then(html => {
                        // إدخال المحتوى في المودال
                        document.getElementById('modal-content').innerHTML = html;

                        // إعادة تهيئة المودال
                        const modalElement = document.getElementById('quick_view');
                        const modal = new bootstrap.Modal(modalElement);
                        modal.show();

                        // تهيئة Swiper بعد تحميل المحتوى
                        var swiper = new Swiper('.tf-single-slide', {
                            navigation: {
                                nextEl: '.swiper-button-next',
                                prevEl: '.swiper-button-prev',
                            },
                        });
                        // تهيئة أزرار التحكم بالكمية
                        initializeQuantityButtons();
                    })
                    .catch(error => console.error('Error fetching product details:', error));
            });
        });

        // تهيئة أزرار التحكم بالكمية
        function initializeQuantityButtons() {
            document.querySelectorAll('.plus-btn').forEach(button => {
                button.addEventListener('click', function () {
                    const input = this.previousElementSibling;
                    input.value = parseInt(input.value) + 1;
                });
            });

            document.querySelectorAll('.minus-btn').forEach(button => {
                button.addEventListener('click', function () {
                    const input = this.nextElementSibling;
                    if (parseInt(input.value) > 1) {
                        input.value = parseInt(input.value) - 1;
                    }
                });
            });
        }

        document.addEventListener('hidden.bs.modal', function () {
            // إزالة أي عناصر overlay بقيت على الصفحة
            document.querySelectorAll('.modal-backdrop').forEach(overlay => {
                overlay.remove();
            });
            // إزالة فئة الـ modal-open من الـ body
            document.body.classList.remove('modal-open');
        });
    </script>





    <script>
        function fetchPrice() {
            let form = document.getElementById('addToCart');
            let formData = new FormData(form);

            fetch('{{ route("product.getPrice", $product->id) }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    // تحديث السعر في الواجهة
                    document.getElementById('price-value').innerText = data.price ? data.price + '{{$storeCurrency}}' : 'غير متوفر';

                    if (data.discount && data.discount > 0) {
                        // عرض السعر بعد التخفيض إذا كان موجودًا
                        document.getElementById('discounted-price').innerText = data.discount + '{{$storeCurrency}}';
                        document.getElementById('discount-section').style.display = 'block';
                        document.getElementById('price-value').style.textDecoration = "line-through";
                    } else {
                        // إخفاء قسم التخفيض إذا لم يكن هناك تخفيض
                        document.getElementById('discount-section').style.display = 'none';
                        document.getElementById('price-value').style.textDecoration = "none";
                    }
                    // تحديث الحقول المخفية بالقيمة الحقيقية للسعر والخصم
                    document.getElementById('hidden-variation').value = data.variation_id;
                    document.getElementById('hidden-price').value = data.price;
                    document.getElementById('hidden-discount').value = data.discount ? data.discount : '';
                })
                .catch(error => console.error('Error:', error));
        }
    </script>

@endsection
