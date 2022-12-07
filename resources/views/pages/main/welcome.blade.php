<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('base.header')
@include('base.navbar')
<body class="antialiased">
<!-- HERO SECTION-->
<div class="container">
    <section class="hero pb-3 bg-cover bg-center d-flex align-items-center"
             style="background: url({{asset ('img/hero-banner-alt.jpg')}})">
        <div class="container py-5">
            <div class="row px-4 px-lg-5">
                <div class="col-lg-6">
                    <p class="text-muted small text-uppercase mb-2">New Inspiration 2020</p>
                    <h1 class="h2 text-uppercase mb-3">20% off on new season</h1>
                    <a class="btn btn-dark" href="{{route('products')}}">Browse collections</a>
                </div>
            </div>
        </div>
    </section>
    @include('pages.main.categories')
    @include('base.services')
</div>
@include('pages.main.emailNewsletter')
@include('base.jsfiles')
@include('base.footer')
</body>
</html>



