@extends('layouts.master')

@push('styles')

@endpush
@section('content')

    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Checkout
                </div>
            </div>
        </div>

        <section class="mt-50 mb-50">
            <div class="container">
                <form method="post" action="{{route('order.store')}}">
                    {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-25">
                            <h4>Billing Details</h4>
                        </div>


                            <div class="form-group">
                                <input type="text" value="{{Auth::user()->name}}" required="" name="name" placeholder=" Name *">
                            </div>
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror


                        <div class="form-group">
                                <input required="" value="{{Auth::user()->email}}" type="text" name="email" placeholder="Email address *" >
                            </div>
                        @error('email')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="form-group">
                                <input required="" type="text" name="phone" placeholder="Phone *">
                            </div>
                        @error('phone')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="form-group">
                                <input type="text" name="address" required="" placeholder="Address *">
                            </div>
                        @error('address')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="form-group">
                                <input required="" type="text" name="city" placeholder="City / Town *">
                            </div>
                        @error('city')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="form-group">
                                <input required="" type="text" name="country" placeholder="County *">
                            </div>
                        @error('country')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="form-group">
                                <input required="" type="text" name="postal_code" placeholder="Postcode / ZIP *">
                            </div>
                        @error('postal_code')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror


                    </div>
                    <div class="col-md-6">
                        <div class="order_review">
                            <div class="mb-20">
                                <h4>Your Orders</h4>
                            </div>

                            <div class="table-responsive order_table text-center">

                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th colspan="2">Product</th>
                                        <th>Qty</th>
                                        <th>Total</th>

                                    </tr>
                                    </thead>

                                    <tbody>


                                    @foreach(Cart::instance('cart')->content() as $item)

                                        <tr>
                                            <td class="image product-thumbnail"><img
                                                    src="{{ asset('storage/images/products/' . $item->model['image']) }}"
                                                    alt="#"></td>
                                            <td>
                                                <h5><a href="product-details.html">{{$item->model->name}}</a></h5>
                                            </td>
                                            <td>{{$item->qty}}</td>

                                            <td>${{$item->subtotal}}</td>
                                        </tr>

                                    @endforeach
                                    <tr>
                                        <th>SubTotal</th>
                                        <td class="product-subtotal" colspan="3">
                                            ${{Cart::subtotal()}}</td>
                                    </tr>

                                    <tr>
                                        <th>Tax</th>
                                        <td class="product-subtotal" colspan="3">
                                            ${{Cart::tax()}}</td>
                                    </tr>

                                    <tr>
                                        <th>Shipping</th>
                                        <td colspan="3"><em>Free Shipping</em></td>
                                    </tr>

                                    <tr>
                                        <th>Total</th>
                                        <td colspan="3" class="product-subtotal"><span
                                                class="font-xl text-brand fw-900">{{Cart::total()}}</span></td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                            <button  type="submit" class="btn btn-fill-out btn-block mt-30">Place Order</button>

                        </div>
                    </div>
                </div>
                </form>

                <div class="bt-1 border-color-1 mt-30 mb-30"></div>


                <div class="payment_method">


                    <form  action="{{route('payment')}}" method="post">
                        @csrf
                        <input type="hidden" name="amount" value={{Cart::total()}}>
                        <button  type="submit" class="btn btn-fill-out btn-block mt-30">Pay With Paypal</button>
                    </form>

                </div>

            </div>

        </section>

    </main>

@endsection
@push('scripts')
@endpush
