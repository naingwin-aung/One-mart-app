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
    <h2 class="text-center pb-4 fw-bold">
        ပစ္စည်းအမျိုးအစားများ
    </h2>
    <div class="coloredline mt-0"></div>

    <div class="container mt-5">
        <div class="row slider">
            @foreach ($categories as $category)
                <div class="col-6 col-md-3 px-3">
                    <a href="{{url("/category/$category->id/all")}}"> 
                        <img src="{{url('/images/'.$category->image)}}" alt="{{$category->name}}" class="img-fluid category-img rounded-3">
                    </a>
                    <p class="category-text text-white">{{$category->name}}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!--Point-->
<section class="point mt-5 d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 text-center">
                <h4 class="mt-3 mb-4 fw-bold">Deliver Service</h4>
                <p text-muted>အိမ်အရောက် ပို့</p>
            </div>

            <div class="col-12 col-md-4 text-center">
                <h4 class="mt-3 mb-4 fw-bold">သုံးရလွယ်တယ်</h4>
                <p text-muted>လိုချင်တာရှာဖို့ လွယ်ကူ၊ လျှင်မြန်</p>
            </div>
            <div class="col-12 col-md-4 text-center">
                <h4 class="mt-3 mb-4 fw-bold">အမြန်ရောင်းထွက်တယ်</h4>
                <p text-muted>ဓာတ်ပုံရိုက်၊ ကြော်ငြာတင်၊ ရောင်း!</p>
            </div>
        </div>
    </div>
</section>

@endsection