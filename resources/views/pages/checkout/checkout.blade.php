<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('base.header')
@include('base.navbar')
<body class="antialiased">
<div class="container">
    @include('pages.checkout.hero')
    @include('base.alert')
    <div id="alertMsgSuccess" class="alert alert-dismissible alert-success" style="display: none"  role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Order added successfully
    </div>
    <div id="alertMsgError" class="alert alert-dismissible alert-danger" style="display: none"  role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Error processing order
    </div>
    <section class="py-5">
        <h2 class="h5 text-uppercase mb-4">Billing details</h2>
        <div class="row">
            <div class="col-lg-8">
                <form id="checkout" >
                    <input id=csrf type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <input id=paymentMethod type="hidden" name="total" value="CARD"/>
                    <input id=totalAmount type="hidden" name="total" value="{{$total}}"/>
                    <div class="row gy-3">
                        <div class="col-lg-6">
                            <label class="form-label text-sm text-uppercase" for="firstName">First name </label>
                            <input class="form-control form-control-lg" type="text" id="firstName"
                                   placeholder="Enter your first name" required>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label text-sm text-uppercase" for="lastName">Last name </label>
                            <input class="form-control form-control-lg" type="text" id="lastName"
                                   placeholder="Enter your last name" required>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label text-sm text-uppercase" for="email">Email address </label>
                            <input class="form-control form-control-lg" type="email" id="email"
                                   placeholder="e.g. Jason@example.com" required>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label text-sm text-uppercase" for="phone">Phone number </label>
                            <input class="form-control form-control-lg" type="tel" id="phone"
                                   placeholder="e.g. +34 666000666" required>
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label text-sm text-uppercase" for="address">Address line 1 </label>
                            <input class="form-control form-control-lg" type="text" id="address"
                                   placeholder="House number and street name" required>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label text-sm text-uppercase" for="city">City </label>
                            <input class="form-control form-control-lg" type="text" id="city"
                                   placeholder="Your city" required>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label text-sm text-uppercase" for="postalCode">Postal Code </label>
                            <input class="form-control form-control-lg" type="text" id="postalCode"
                                   placeholder="Postal code" required>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label class="form-label text-sm text-uppercase" for="country">Country</label>
                            <select class="country" id="country" data-customclass="form-control form-control-lg rounded-0">
                                <option value>Choose your country</option>
                            </select>
                        </div>
                        <div class="col-lg-8 form-group">
                        @if(count($cart)==0)
                                <button class="btn btn-dark" type="submit" disabled>Place order</button>
                                <a class="text-gray-500">Cart is empty!</a>
                            @else
                                <button class="btn btn-dark checkout" type="submit">Place order</button>
                        @endif
                        </div>
                    </div>
                </form>
            </div>
            @include('pages.checkout.summary')
        </div>
    </section>
</div>
</body>
@include('base.footer')
@include('base.jsfiles')
<script src="{{asset('js/checkout.js')}}"></script>
</html>
