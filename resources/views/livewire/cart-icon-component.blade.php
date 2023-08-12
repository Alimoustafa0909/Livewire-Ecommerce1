<div class="header-action-icon-2">
    <a class="mini-cart-icon" href="{{route('shop.cart')}}">
        <img alt="Surfside Media" src="{{asset('assets/imgs/theme/icons/icon-cart.svg')}}">
        @if(Cart::instance('cart')->count() > 0)
            <span class="pro-count blue">{{Cart::instance('cart')->count()}}</span>
        @endif
    </a>
    <div class="cart-dropdown-wrap cart-dropdown-hm2">
        <ul>
            @foreach(Cart::instance('cart')->content() as $item)
                @if($item->model)
                    <li>
                        <div class="shopping-cart-img">
                            <a href="{{route('product.details',$item->model->slug)}}"><img alt="Surfside Media"
                                                                                           src="{{ asset('storage/images/products/' . $item->model['image']) }}"></a>
                        </div>
                        <div class="shopping-cart-title">
                            <h4><a href="{{route('product.details',$item->model->slug)}}">{{substr($item->model->name,0,20)}}...</a></h4>
                            <h4><span>{{$item->qty}} × </span>${{number_format( $item->model->regular_price)}}</h4>
                        </div>
                        <div class="shopping-cart-delete">
                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                        </div>
                    </li>
                @endif
            @endforeach
        </ul>
        <div class="shopping-cart-footer">
            <div class="shopping-cart-total">
                <h4>Total <span>${{Cart::Subtotal()}}</span></h4>
            </div>
            <div class="shopping-cart-button">
                <a href="/cart" class="outline">View cart</a>
            </div>
        </div>
    </div>
</div>
