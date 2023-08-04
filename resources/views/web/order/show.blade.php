@extends('layouts.master')
@push('styles')

@endpush

@section('content')

    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header ">
                        <h4 class="text-black-50">Show Order</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order_details">
                                <h4>Shipping Details</h4>
                                <hr>
                                <label for=""> First Name</label>
                                <div class="border">{{$orders->name}} </div>
                                <label for=""> Email</label>
                                <div class="border">{{$orders->email}} </div>
                                <label for=""> Contact No.</label>
                                <div class="border">{{$orders->phone}} </div>

                                <label for="">Shipping Address</label>
                                <div class="border">
                                    {{$orders->address}} @php print ','@endphp
                                    {{$orders->city}} @php print ','@endphp
                                    {{$orders->country}}
                                </div>
                                <label for=""> Zip Code</label>
                                <div class="border p-2">{{$orders->postal_code}} </div>

                            </div>
                            <div class="col-md-6">
                                <h4>Order Details</h4>
                                <hr>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th> Name</th>
                                        <th> Quantity</th>
                                        <th> Price</th>
                                        <th> Image</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders->orderItems as $item)
                                        <tr>
                                            <td>{{$item->products->name}}</td>
                                            <td>{{$item->product_quantity}}</td>
                                            <td>{{$item->product_price * $item->product_quantity}}</td>

                                            <td>
                                                <img src="{{ asset('storage/images/products/' . $item->products['image']) }}"
                                                     width="75" height="75">
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <h4 class="px-2">  Total Price: <span > ${{$orders->total_price}}</span>  </h4>

                                <a href="{{url('MyOrders')}}" class="btn btn-danger float-end"> Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush
