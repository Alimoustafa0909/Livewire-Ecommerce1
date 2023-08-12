

    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header ">
                        <h4 class="text-black-50">Your Order</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order_details">
                                <h4>Shipping Details</h4>
                                <hr>
                                <label for="">  Name: {{$orders->name}}</label>
<br><br>
                                <label for=""> Email: {{$orders->email}}</label>
                                <br><br>
                                <label for=""> Contact No: {{$orders->phone}}</label>
                                <br><br>

                                <label for=""> Tracking No.: {{$orders->tracking_no}}</label>

                                <br><br>

                                <label for="">Shipping Address:   {{$orders->address}} @php print ','@endphp
                                    {{$orders->city}} @php print ','@endphp
                                    {{$orders->country}}</label>

                                <br><br>
                                </div>
                                <label for=""> Zip Code: {{$orders->postal_code}}</label>
                            <br><br>

                            </div>
                            <div class="col-md-6">
                                <h4>Order Details</h4>
                                <hr>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th> Name</th>
                                        <th> Qty</th>
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
                                                <img src="{{ storage_path('app/public/images/products/' . $item->products['image']) }}"
                                                     width="75" height="75">
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <h4 class="px-2">  Total Price: <span > ${{$orders->total_price}}</span>  </h4>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
