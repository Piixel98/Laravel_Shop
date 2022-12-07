<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('base.header')
@include('base.navbar')
<body class="antialiased">
@include('base.hero')
<div class="container">
    @include('base.alert')
    <section class="py-5">
        <div class="container p-0">
            @include('pages.products.categories')
            <div class="row">
                <div class="col-lg-12 order-1 order-lg-2 mb-5 mb-lg-0">
                    @include('pages.products.listing')
                    <div class="row">
                        @include('pages.products.productList')
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
@include('base.jsfiles')
@include('base.footer')
</html>



