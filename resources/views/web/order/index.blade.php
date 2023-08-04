@extends('layouts.master')
@push('styles')

@endpush

@section('content')

    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-black-50">My Orders</h4>
                    </div>
                    <div class="card-body">
                       @if($orders->count() > 0)
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th> Order Date</th>
                                <th> Tracking Number</th>
                                <th> Total Price</th>
                                <th> Status</th>
                                <th> Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $item)
                                <tr>
                                    <td>{{ date('d-m-Y',strtotime($item->created_at))}}</td>
                                    <td>{{ $item ->tracking_no}}</td>
                                    <td>{{ $item ->total_price}}</td>
                                    <td>{{ $item ->status=='0' ?'Pending': 'Delivered Succ' }}</td>
                                    <td>
                                        <a href="{{url('view-order/'.$item->id)}}" class="btn btn-light-dark"> View</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    @else
                        <h1> There is no Orders For You </h1>
                        <a type="button"> Continue Shopping</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush
