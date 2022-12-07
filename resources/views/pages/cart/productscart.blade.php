<!-- CART TABLE-->
<div class="table-responsive mb-4">
    <table class="table text-nowrap">
        <thead class="bg-light">
            <tr>
                <th class="border-0 p-3" scope="col"><strong class="text-sm text-uppercase">Product</strong>
                </th>
                <th class="border-0 p-3" scope="col"><strong class="text-sm text-uppercase">Price</strong>
                </th>
                <th class="border-0 p-3" scope="col"><strong
                        class="text-sm text-uppercase">Quantity</strong></th>
                <th class="border-0 p-3" scope="col"><strong class="text-sm text-uppercase">Total</strong>
                </th>
                <th class="border-0 p-3" scope="col"><strong class="text-sm text-uppercase"></strong></th>
            </tr>
        </thead>
        <tbody class="border-0">
        @foreach ($cart as $item)
            <tr>
                <th class="ps-0 py-3 border-light" scope="row">
                    <div class="d-flex align-items-center"><a class="reset-anchor d-block animsition-link" href="{{route('detail', ["id"=>$item->product->id])}}">
                            <img src="{{asset($item->product->image)}}" alt="..." width="70"/></a>
                        <div class="ms-3"><strong class="h6"><a class="reset-anchor animsition-link" href="{{route('detail', ["id"=>$item->product->id])}}">{{$item->product->name}}</a></strong></div>
                    </div>
                </th>
                <td class="p-3 align-middle border-light">
                    <p class="mb-0 small">{{$item->product->price}} €</p>
                </td>
                <td class="p-3 align-middle border-light">
                    <div class="border d-flex align-items-center justify-content-between px-3"><span class="small text-uppercase text-gray headings-font-family">Quantity</span>
                        {{$item->quantity}}
                        <a class="col-lg-6" href="{{route("addProductCart",['id'=>$item->product->id, 'quantity'=>$item->quantity+1])}}">
                            <img src="{{asset('img/add.png')}}" width="10%" height="10%"/></a>
                    </div>
                </td>
                <td class="p-3 align-middle border-light">
                    <p class="mb-0 small">{{$item->product->price}} €</p>
                </td>
                <td class="p-3 align-middle border-light"><a class="reset-anchor" href="{{route("delProductCart",['id'=>$item->product->id])}}"><i
                            class="fas fa-trash-alt small text-muted"></i></a></td>            </tr>

            </tr>
        @endforeach
        </tbody>
    </table>
</div>
