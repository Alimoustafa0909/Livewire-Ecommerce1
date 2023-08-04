<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block;
        }
        .wishlisted{
            background-color: #F15412 !important;
            border: 1px  solid transparent !important;
        }
        .wishlisted i{
            color: #fff !important;
        }
    </style>

    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Shop
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="shop-product-fillter">
                            <div class="totall-product">
                                <p> We found <strong class="text-brand">{{$products->count()}}</strong> items for you!
                                </p>
                            </div>
                            <div class="sort-by-product-area">
                                <div class="sort-by-cover mr-10">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps"></i>Show:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> {{$pageSize}} <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="{{$pageSize==12 ? 'active': ''}}" href="#"
                                                   wire:click.prevent="changePageSize(12)">12</a></li>
                                            <li><a class="{{$pageSize==15 ? 'active': ''}}" href="#"
                                                   wire:click.prevent="changePageSize(15)">15</a></li>
                                            <li><a class="{{$pageSize==25 ? 'active': ''}}" href="#"
                                                   wire:click.prevent="changePageSize(25)">25</a></li>
                                            <li><a class="{{$pageSize==32 ? 'active': ''}}" href="#"
                                                   wire:click.prevent="changePageSize(32)">32</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sort-by-cover">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                        </div>

                                        <div class="sort-by-dropdown-wrap">
                                            <span> {{$orderBy}}<i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="{{$orderBy=='Default Sorting' ? 'active': ''}}"
                                                   wire:click.prevent="changeOrderBy('Default Sorting')">Default
                                                    Sorting</a></li>
                                            <li><a class="{{$orderBy=='Price: Low to High' ? 'active': ''}}"
                                                   wire:click.prevent="changeOrderBy('Price: Low to High')">Price: Low
                                                    to High</a></li>
                                            <li><a class="{{$orderBy=='Price: High to Low' ? 'active': ''}}"
                                                   wire:click.prevent="changeOrderBy('Price: High to Low')">Price: High
                                                    to Low</a></li>
                                            <li><a class="{{$orderBy=='Release Date' ? 'active': ''}}"
                                                   wire:click.prevent="changeOrderBy('Release Date')">Release Date</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row product-grid-3">
                            @if (Session::has('status'))
                                <div class="alert alert-success">
                                    <strong>Success ! {{ session::get('status') }}</strong>
                                </div>
                            @endif

{{--                            Getting all ID that found on wishlist and put it on varible --}}
                            @php
                                $wishItems= Cart::instance('wishlist')->content()->pluck('id');
                            @endphp
{{--                                .//////////////////////--}}
                            @foreach($products as $product)
                                <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{route('product.details',$product->slug)}}">
                                                    <img class="default-img"
                                                         src=" {{ asset('storage/images/products/' . $product['image']) }}"
                                                         alt="{{$product->name}}">
                                                    <img class="hover-img"
                                                         src="{{ asset('storage/images/products/' . $product['image']) }}"
                                                         alt="{{$product->name}}">
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Quick view" class="action-btn hover-up"
                                                   data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                                    <i class="fi-rs-search"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                                   href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn hover-up"
                                                   href="compare.php"><i class="fi-rs-shuffle"></i></a>
                                            </div>

                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="shop.html"></a>
                                            </div>
                                            <h2>
                                                <a href="{{route('product.details',$product->slug)}}">{{$product->name}}</a>
                                            </h2>
                                            <div clasFs="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                            </div>
                                            <div class="product-price">
                                                <span>${{$product->regular_price}}</span>
{{--                                                <span class="old-price">${{$product->regular_price}}</span>--}}

                                                {{--                                            <span class="old-price">{{$product->regular_price}}</span>--}}
                                            </div>
                                            <div class="product-action-1 show">
                                                @if($wishItems->contains($product->id))
                                                    <a aria-label="Remove From Wishlist" class="action-btn hover-up wishlisted" href="#" wire:click.prevent="removeFromWishlist({{$product->id}})"  ><i class="fi-rs-heart"></i></a>
                                                @else
                                                    <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#" wire:click.prevent="storeToWishlist({{$product->id}},'{{$product->name}}',{{$product->regular_price}})"><i class="fi-rs-heart"></i></a>
                                                @endif
                                                <a aria-label="Add To Cart" class="action-btn hover-up" href="#" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})"><i class="fi-rs-shopping-bag-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!--pagination-->
                        <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                            {{$products->links()}}
                        </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="row">
                            <div class="col-lg-12 col-mg-6"></div>
                            <div class="col-lg-12 col-mg-6"></div>
                        </div>
                        <div class="widget-category mb-30">
                            <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
                            <ul class="categories">
                                @foreach($categories as $category)
                                    <li><a href="{{route('product_category',$category->slug)}}">{{$category->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Fillter By colour -->
                        <div class="sidebar-widget price_range range mb-30">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title mb-10">Filter by Colour</h5>
                                <div class="bt-1 border-color-1"></div>
                            </div>
                            <div class="list-group">
                                <div class="list-group-item mb-10 mt-10">
                                    <label class="fw-900">Color</label>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox"
                                               id="exampleCheckbox1" value="">
                                        <label class="form-check-label"
                                               for="exampleCheckbox1"><span>Red (56)</span></label>
                                        <br>
                                        <input class="form-check-input" type="checkbox" name="checkbox"
                                               id="exampleCheckbox2" value="">
                                        <label class="form-check-label"
                                               for="exampleCheckbox2"><span>Green (78)</span></label>
                                        <br>
                                        <input class="form-check-input" type="checkbox" name="checkbox"
                                               id="exampleCheckbox3" value="">
                                        <label class="form-check-label"
                                               for="exampleCheckbox3"><span>Blue (54)</span></label>
                                    </div>
                                    <label class="fw-900 mt-15">Item Condition</label>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox"
                                               id="exampleCheckbox11" value="">
                                        <label class="form-check-label" for="exampleCheckbox11"><span>New (1506)</span></label>
                                        <br>
                                        <input class="form-check-input" type="checkbox" name="checkbox"
                                               id="exampleCheckbox21" value="">
                                        <label class="form-check-label"
                                               for="exampleCheckbox21"><span>Refurbished (27)</span></label>
                                        <br>
                                        <input class="form-check-input" type="checkbox" name="checkbox"
                                               id="exampleCheckbox31" value="">
                                        <label class="form-check-label"
                                               for="exampleCheckbox31"><span>Used (45)</span></label>
                                    </div>
                                </div>
                            </div>
                            <a href="shop.html" class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i> Fillter</a>
                        </div>
                        <!-- Product sidebar Widget -->
                        <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title mb-10">New products</h5>
                                <div class="bt-1 border-color-1"></div>
                            </div>
                            @foreach($new_products as $new_product)
                            <div class="single-post clearfix">
                                <div class="image">
                                    <img src="{{ asset('storage/images/products/' . $new_product['image'])}}" alt="{{$new_product->name}}">
                                </div>
                                <div class="content pt-10">
                                    <h5><a href="product-details.html">{{$new_product->name}}</a></h5>
                                    <p class="price mb-0 mt-5">{{$new_product->regular_price}}</p>
                                    <div class="product-rate">
                                        <div class="product-rating" style="width:90%"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        <div class="banner-img wow fadeIn mb-45 animated d-lg-block d-none">
                            <img src="{{asset('assets/imgs/banner/banner-11.jpg')}}" alt="">
                            <div class="banner-text">
                                <span>Women Zone</span>
                                <h4>Save 17% on <br>Office Dress</h4>
                                <a href="shop.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>