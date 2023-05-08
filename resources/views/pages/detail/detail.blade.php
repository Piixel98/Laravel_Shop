<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('base.header')
@include('base.navbar')
<body>
@include('base.hero')
<section class="py-5">
    <div class="container">
        @include('base.alert')
        <div class="row mb-5">
            <div class="col-lg-6">
                <!-- PRODUCT SLIDER-->
                <div class="row m-sm-0">
                    <div class="col-sm-2 p-sm-0 order-2 order-sm-1 mt-2 mt-sm-0 px-xl-2">
                        <div class="swiper product-slider-thumbs">
                            <div class="swiper-wrapper">
                                @if($product->image == null)
                                    <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100" src="#!" alt="..."></div>
                                @else
                                    <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100" src="{{asset($product->image)}}" alt="..."></div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-10 order-1 order-sm-2">
                        <div class="swiper product-slider">
                            <div class="swiper-wrapper">
                                @if($product->image == null)
                                    <div class="swiper-slide h-auto"><a class="glightbox product-view" href="#!" data-gallery="gallery2" data-glightbox="Product item 1"><img class="img-fluid" src="#!" alt="..."></a></div>
                                @else
                                    <div class="swiper-slide h-auto"><a class="glightbox product-view" href="{{asset($product->image)}}" data-gallery="gallery2" data-glightbox="Product item 1"><img class="img-fluid" src="{{asset($product->image)}}" alt="..."></a></div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- PRODUCT DETAILS-->
            <div class="col-lg-6">
                <ul class="list-inline mb-2 text-sm">
                    <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                    <li class="list-inline-item m-0 1"><i class="fas fa-star small text-warning"></i></li>
                    <li class="list-inline-item m-0 2"><i class="fas fa-star small text-warning"></i></li>
                    <li class="list-inline-item m-0 3"><i class="fas fa-star small text-warning"></i></li>
                    <li class="list-inline-item m-0 4"><i class="fas fa-star small text-warning"></i></li>
                </ul>
                <h1>{{$product->name}}</h1>
                <p class="text-muted lead">{{$product->price}}</p>
                <p class="text-sm mb-4">{{$product->description}}</p>
                <div class="row align-items-stretch mb-4">
                    <div class="col-sm-5 pr-sm-0">
                        <div class="border d-flex align-items-center justify-content-between py-1 px-3 bg-white border-white"><span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                            <div class="quantity">
                                <input class="form-control border-0 shadow-0 p-0" type="text" value="1">
                            </div>
                        </div>
                    </div>
                    @if($product->stock != 0)
                        @if(session()->has('cart'))
                            @if(count(session('cart')) > 0)
                                @foreach(session('cart') as $item)
                                    @if($item->product->id == $product->id)
                                        <a class="col-sm-3 pl-sm-0 btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0"
                                           href="{{route("addProductCart",['id'=>$product->id,'quantity'=>$item->quantity+1])}}">Add to cart</a>
                                        @break
                                    @else
                                        @continue
                                    @endif
                                @endforeach
                            @else
                                <a class="col-sm-3 pl-sm-0 btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0"
                                   href="{{route("addProductCart",['id'=>$product->id,'quantity'=>1])}}">Add to cart</a>
                            @endif
                        @else
                            <a class="col-sm-3 pl-sm-0 btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0"
                               href="{{route("addProductCart",['id'=>$product->id,'quantity'=>1])}}">Add to cart</a>
                        @endif
                    @else
                            <a class="col-sm-3 pl-sm-0 btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center disabled px-0">OUT OF STOCK</a>
                    @endif
                    <br>
                    <ul class="list-unstyled small d-inline-block">
                    <li class="px-3 py-2 mb-1 bg-white"><strong class="text-uppercase">SKU:</strong><span class="ms-2 text-muted">{{$product->sku}}</span></li>
                    <li class="px-3 py-2 mb-1 bg-white text-muted"><strong class="text-uppercase text-dark">Category:</strong><a class="reset-anchor ms-2" href="#!">{{$product->categories[0]->name}}</a></li>
                </ul>
            </div>
        </div>
        <!-- DETAILS TABS-->
        <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
            <li class="nav-item"><a class="nav-link text-uppercase active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a></li>
            <li class="nav-item"><a class="nav-link text-uppercase" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a></li>
        </ul>
        <div class="tab-content mb-5" id="myTabContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                <div class="p-4 p-lg-5 bg-white">
                    <h6 class="text-uppercase">Product description </h6>
                    <p class="text-muted text-sm mb-0">{{$product->description}}</p>
                </div>
            </div>
            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                <div class="p-4 p-lg-5 bg-white">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="d-flex mb-3">
                                <div class="flex-shrink-0"><img class="rounded-circle" src="{{asset('img/customer-1.png')}}" alt="" width="50"/></div>
                                <div class="ms-3 flex-shrink-1">
                                    <h6 class="mb-0 text-uppercase">Jason Doe</h6>
                                    <p class="small text-muted mb-0 text-uppercase">20 May 2020</p>
                                    <ul class="list-inline mb-1 text-xs">
                                        <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                                        <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                                        <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                                        <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                                        <li class="list-inline-item m-0"><i class="fas fa-star-half-alt text-warning"></i></li>
                                    </ul>
                                    <p class="text-sm mb-0 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="flex-shrink-0"><img class="rounded-circle" src="{{asset('img/customer-2.png')}}" alt="" width="50"/></div>
                                <div class="ms-3 flex-shrink-1">
                                    <h6 class="mb-0 text-uppercase">Jane Doe</h6>
                                    <p class="small text-muted mb-0 text-uppercase">20 May 2020</p>
                                    <ul class="list-inline mb-1 text-xs">
                                        <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                                        <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                                        <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                                        <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                                        <li class="list-inline-item m-0"><i class="fas fa-star-half-alt text-warning"></i></li>
                                    </ul>
                                    <p class="text-sm mb-0 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
</body>
@include('base.jsfiles')
@include('base.footer')
</html>

