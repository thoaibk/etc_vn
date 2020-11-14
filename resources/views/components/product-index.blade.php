<div class="row">
    @foreach($products as $product)
        <div class="col-md-4">
            <div class="card product-card p-0">
                <img src="{{ $product->thumb('small') }}" class="product-img card-img-top" alt="{{ $product->name }}">
                <div class="card-body">
                    <h3 class="product-title">
                        <a href="{{ $product->publicUrl() }}">{{ $product->name }}</a>
                    </h3>
                    <a href="{{ $product->publicUrl() }}" class="btn btn-detail btn-block"><i class="fal fa-chevron-circle-right"></i> Xem chi tiết</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
