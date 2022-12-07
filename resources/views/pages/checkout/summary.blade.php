<!-- ORDER SUMMARY-->
<div class="col-lg-4">
    <div class="card border-0 rounded-0 p-lg-4 bg-light">
        <div class="card-body">
            <h5 class="text-uppercase mb-4">Your order</h5>
            <ul class="list-unstyled mb-0">
                @foreach($cart as $item)
                    <li class="d-flex align-items-center justify-content-between">
                        <strong class="small fw-bold">{{$item->product->name}} x {{$item->quantity}}</strong>
                        <span class="text-muted small">{{$item->product->price*$item->quantity}} €</span></li>
                    <li class="border-bottom my-2"></li>
                @endforeach
                <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small fw-bold">Total</strong><span>{{$total}} €</span></li>
            </ul>
        </div>
    </div>
</div>
