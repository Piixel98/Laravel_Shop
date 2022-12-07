<!-- HERO SECTION-->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
            <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">{{strtoupper(\Route::currentRouteName())}}</h1>
            </div>
            <div class="col-lg-6 text-lg-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                        @if (\Route::currentRouteName() == 'index')
                            <li class="breadcrumb-item active" aria-current="page">Home</li>
                            <li class="breadcrumb-item"><a class="text-dark" href="{{route('products')}}">Products</a></li>
                            <li class="breadcrumb-item"><a class="text-dark" href="{{route('detail', ["id"=>1])}}">Detail</a></li>
                            <li class="breadcrumb-item"><a class="text-dark" href="{{route('cart')}}">Cart</a></li>
                        @elseif (\Route::currentRouteName() == 'products')
                            <li class="breadcrumb-item"><a class="text-dark" href="{{route('index')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Products</li>
                            <li class="breadcrumb-item"><a class="text-dark" href="{{route('detail', ["id"=>1])}}">Detail</a></li>
                            <li class="breadcrumb-item"><a class="text-dark" href="{{route('cart')}}">Cart</a></li>
                        @elseif (\Route::currentRouteName() == 'detail')
                            <li class="breadcrumb-item"><a class="text-dark" href="{{route('index')}}">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-dark" href="{{route('products')}}">Products</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail</li>
                            <li class="breadcrumb-item"><a class="text-dark" href="{{route('cart')}}">Cart</a></li>
                        @elseif (\Route::currentRouteName() == 'cart')
                            <li class="breadcrumb-item"><a class="text-dark" href="{{route('index')}}">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-dark" href="{{route('products')}}">Products</a></li>
                            <li class="breadcrumb-item"><a class="text-dark" href="{{route('detail', ["id"=>1])}}">Detail</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        @elseif (\Route::currentRouteName() == 'admin')
                            <li class="breadcrumb-item"><a class="text-dark" href="{{route('index')}}">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-dark" href="{{route('products')}}">Products</a></li>
                            <li class="breadcrumb-item"><a class="text-dark" href="{{route('detail', ["id"=>1])}}">Detail</a></li>
                            <li class="breadcrumb-item"><a class="text-dark" href="{{route('cart')}}">Cart</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Admin</li>
                        @endif
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
