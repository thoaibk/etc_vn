<ul class="navbar-nav mr-auto nav-mega-menu">
    @foreach($categories as $cate)
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle catogary" href="{{ $cate->publicUrl() }}" id="navbarDropdown">
                <span class="text-uppercase"> {{ $cate->name }} </span>
                <i class="icon-has-dropdown fal fa-chevron-down d-block d-sm-none"></i>
            </a>

            <?php $products = $cate->products()->limit(6)->get() ?>
            @if(count($products) > 0)
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <div class="container">
                        <div class="row">

                            @foreach($products as $product)
                                <div class="col-md-2">
                                    <div class="product-menu">
                                        <a href="">
                                            <img class="img-fluid" src="{{ $product->thumb() }}" alt="{{ $product->name }}">
                                        </a>
                                        <div class="inner-footer">
                                            <h5 class="product-title mt-3 mb-0"><a class="product-link" href="{{ $product->publicUrl() }}">{{ $product->name }}</a></h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            @endif
        </li>
    @endforeach
</ul>