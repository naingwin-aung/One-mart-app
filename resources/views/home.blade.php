@extends('layouts.master')

@section('content')

<!--Hero-->
<main>
    <section class="hero d-flex flex-column align-items-center justify-content-center">
            <h2 class="text-white fw-bold">One Mart</h2>
            <h3 class="text-white mt-3 mb-5">ရောင်းမယ် ဝယ်မယ် လဲမယ်!</h3>
            <a href="{{url('/login')}}" class="hero-btn text-decoration-none">Join Now</a>
    </section>
</main>

<!--Category-->
<section class="category my-5">
    <h1 class="text-center pb-4 fw-bold">
        ပစ္စည်းအမျိုးအစားများ
    </h1>
    <div class="container mt-5">
        <div class="row slider">
            @for ($i = 0; $i < 19; $i++)
                <div class="col-6 col-md-3 px-3">
                    <a href="#"> 
                        <img src="{{url('/images/mobile.jpeg')}}" alt="mobile" class="img-fluid category-img rounded-3">
                    </a>
                    <p class="category-text text-white">Mobile</p>
                </div>
            @endfor
        </div>
    </div>
</section>

<!--Point-->
<section class="point mt-5 d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 text-center">
                <i class="fas fa-truck icon rounded-full"></i>
                <h4 class="mt-3 mb-4 fw-bold">Deliver service Shi thi</h4>
                <p text-muted>ရောင်းသူဝယ်သူ တိုက်ရိုက်ဆက်သွယ်</p>
            </div>
            <div class="col-12 col-md-4 text-center">
                <i class="fa fa-check-square icon"></i>
                <h4 class="mt-3 mb-4 fw-bold">သုံးရလွယ်တယ်</h4>
                <p text-muted>လိုချင်တာရှာဖို့ လွယ်ကူ၊ လျှင်မြန်</p>
            </div>
            <div class="col-12 col-md-4 text-center">
                <i class="fas fa-shopping-cart icon"></i>
                <h4 class="mt-3 mb-4 fw-bold">အမြန်ရောင်းထွက်တယ်</h4>
                <p text-muted>ဓာတ်ပုံရိုက်၊ ကြော်ငြာတင်၊ ရောင်း!</p>
            </div>
        </div>
    </div>
</section>

@endsection