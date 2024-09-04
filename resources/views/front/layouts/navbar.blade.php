<div class="top_navbar">
    <div class="sections">
        <div class="logo_section">
            <img src="{{ asset('assets/front/images/logo.png') }}" alt="logo">
        </div>
        <div class="search_section">
            <form method="get" action="">
                @csrf
                <div class="search">
                    <select class="">
                        <option value=""> الكل </option>
                        <option value=""> آلات موسيقية </option>
                        <option value=""> اجهزة امازون </option>
                        <option value=""> ملابس </option>
                        <option value=""> احذية </option>
                        <option value=""> آلات موسيقية </option>
                        <option value=""> اجهزة امازون </option>
                        <option value=""> ملابس </option>
                        <option value=""> احذية </option>
                    </select><input class="search_input" type="text" placeholder="اكتب كلمة البحث"><button
                        type="submit"> <i class="bi bi-search"></i> </button>
                </div>
            </form>
        </div>
        <div class="cart_section">
            <div class="cart">
                <span class="counter">2</span>
                <i class="bi bi-cart-plus-fill"></i>
            </div>
        </div>
    </div>
</div>

<div class="second_navbar">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link toogle_menu" href="#"> <i class="bi bi-list"></i> الكل </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"> عروض اليوم </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">الجوالات </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"> الالكترونيات </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"> مستلزمات المنزل </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"> العاب الفيديو </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<div class="toogle_navbar">
    <div class="overlay"></div>
    <div class="new_links">
        <i class="bi bi-x-circle-fill closebutton"></i>
        <h6> الأكثر شيوعاً </h6>
        <ul>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="index"> الرئيسية </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="westernunion"> إرسال الأموال مع WESTERN UNION أونلاين </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="dollar"> حجز دولار للمسافرين </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="accounts"> حسابات المنصة </a>
            </li>
        </ul>
        <hr>
        <h6> الأجهزة والمحتوى الرقمي </h6>
        <ul>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="index"> الرئيسية </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="westernunion"> إرسال الأموال مع WESTERN UNION أونلاين </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="dollar"> حجز دولار للمسافرين </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="accounts"> حسابات المنصة </a>
            </li>
        </ul>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuIcon = document.querySelector('.toogle_menu');
        const newLinks = document.querySelector('.new_links');
        const closebutton  = document.querySelector('.closebutton');
        const overlay = document.querySelector('.overlay');
        const body = document.body;

        mobileMenuIcon.addEventListener('click', function() {
            newLinks.classList.toggle('active');
            overlay.classList.toggle('active');
            body.classList.toggle('overlay-active');
        });

        overlay.addEventListener('click', function() {
            newLinks.classList.remove('active');
            overlay.classList.remove('active');
            body.classList.remove('overlay-active');
        });
        closebutton.addEventListener('click', function() {
            newLinks.classList.remove('active');
            overlay.classList.remove('active');
            body.classList.remove('overlay-active');
        });
    });
</script>
