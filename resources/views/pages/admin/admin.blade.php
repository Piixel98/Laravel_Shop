<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('base.header')
@include('base.navbar')
<body class="antialiased">
@include('base.hero')
<div class="container">
    <section>
        <div class="container">
            <h2>Categories:</h2>
            <table class="table text-nowrap">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Photo</th>
                    <th>Parent Id</th>
                    <th>Status</th>
                    <th>Description</th>
                    <th>Created</th>
                    <th>Updated</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th>{{$category->id}}</th>
                        <td>{{$category->name}}</td>
                        <td>{{$category->photo}}</td>
                        <td>{{$category->parentId}}</td>
                        <td>{{$category->status}}</td>
                        <td>{{$category->description}}</td>
                        <td>{{$category->created_at}}</td>
                        <td>{{$category->updated_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $categories->links() }}
            <br/>
            <h2>Products:</h2>
            <table class="table text-nowrap">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Image</th>
                    <th>Created</th>
                    <th>Updated</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th>{{$product->id}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->price}}€</td>
                        <td>{{$product->stock}}</td>
                        <td>
                            <img class="img-fluid" style="width: 100px" src="{{asset($product->image)}}" alt="..."/>
                        </td>
                        <td>{{$product->created_at}}</td>
                        <td>{{$product->updated_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $products->links() }}
            <br/>
            <br/>
            <h2>Orders:</h2>
            <table class="table text-nowrap">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Total Amount</th>
                    <th>PaymentMethod</th>
                    <th>PaymentStatus</th>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>City</th>
                    <th>Country</th>
                    <th>PostalCode</th>
                    <th>Address</th>
                    <th>Created</th>
                    <th>Updated</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <th>{{$order->id}}</th>
                        <td>{{$order->totalAmount}} €</td>
                        <td>{{$order->paymentMethod}}</td>
                        <td>{{$order->paymentStatus}}</td>
                        <td>{{$order->firstName}}</td>
                        <td>{{$order->lastName}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->city}}</td>
                        <td>{{$order->country}}</td>
                        <td>{{$order->postalCode}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->created_at}}</td>
                        <td>{{$order->updated_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $orders->links() }}
        </div>
    </section>
</div>
</body>
@include('base.jsfiles')
@include('base.footer')
</html>



