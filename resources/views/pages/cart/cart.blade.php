<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('base.header')
@include('base.navbar')
@include('base.hero')
<body class="antialiased">
<div class="container">
    <section class="py-5">
        <h2 class="h5 text-uppercase mb-4">Shopping cart</h2>
        @include('base.alert')
        <div class="row">
            <div class="col-lg-8 mb-4 mb-lg-0">
                @include('pages.cart.productscart')
                <!-- CART NAV-->
                <div class="bg-light px-4 py-3">
                    <div class="row align-items-center text-center">
                        <div class="col-md-6 mb-3 mb-md-0 text-md-start"><a class="btn btn-link p-0 text-dark btn-sm"
                                                                            href="{{route('products')}}"><i
                                    class="fas fa-long-arrow-alt-left me-2"> </i>Continue shopping</a></div>
                        @if(count($cart)==0)
                            <div class="col-md-5 text-md-end"><a class="btn btn-outline-dark btn-sm disabled"
                                                                 href="#!">Procceed to checkout<i
                                        class="fas fa-long-arrow-alt-right ms-2"></i></a>
                                <a>Cart is empty!</a>
                            </div>
                        @else
                            <div class="col-md-6 text-md-end"><a class="btn btn-outline-dark btn-sm"
                                                                 href="{{route('checkout')}}">Procceed to checkout<i
                                        class="fas fa-long-arrow-alt-right ms-2"></i></a></div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- ORDER TOTAL-->
            <div class="col-lg-4">
                <div class="card border-0 rounded-0 p-lg-4 bg-light">
                    <div class="card-body">
                        <h5 class="text-uppercase mb-4">Cart total</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="d-flex align-items-center justify-content-between"><strong
                                    class="text-uppercase small font-weight-bold">Subtotal</strong><span
                                    class="text-muted small">
                                        {{($total)}} €</span></li>
                            <li class="border-bottom my-2"></li>
                            <li class="d-flex align-items-center justify-content-between mb-4"><strong
                                    class="text-uppercase small font-weight-bold">Total</strong><span>{{$total}} €</span></li>
                            <li>
                                <form action="#">
                                    <div class="input-group mb-0">
                                        <input class="form-control" type="text" placeholder="Enter your coupon">
                                        <button class="btn btn-dark btn-sm w-120" type="submit"><i
                                                class="fas fa-gift me-2"></i>Apply coupon
                                        </button>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('pages.main.emailNewsletter')
@include('base.jsfiles')
@include('base.footer')
<script src="{{asset('js/checkout.js')}}"></script>
</body>
</html>
