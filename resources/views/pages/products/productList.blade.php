<!-- PRODUCT-->
@foreach ($products as $product)
    <div class="col-lg-4 col-sm-6">
        <div class="product text-center">
            <div class="mb-3 position-relative">
                <div class="badge text-white bg-"></div>
                <a class="d-block" href="{{route('detail', ["id" => $product->id])}}"><img class="img-fluid w-100"
                                                                   src="{{asset($product->image)}}" alt="..."></a>
                <div class="product-overlay">
                    <ul class="mb-0 list-inline">
                        <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark"
                                                                href="{{route("addProductCart",['id'=>$product->id,'quantity'=>1])}}">Add to cart</a>
                        </li>
                    </ul>
                </div>
            </div>
            <h6><a class="reset-anchor" href="{{route('detail', ["id" => $product->id])}}">{{$product->name}}</a></h6>
            <p class="small text-muted">{{$product->price}}€</p>
        </div>
    </div>
@endforeach

