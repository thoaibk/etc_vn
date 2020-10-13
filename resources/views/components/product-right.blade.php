@foreach($products as $product)
    <a class="card product-card text-decoration-none" href="{{ $product->publicUrl() }}">
        <div class="product-thumb">
            <img class="img-fluid" src="{{ $product->thumb('social') }}" alt="{{ $product->name }}">
        </div>
        <div class="mt-2 product-info pt-3">
            <h2 class="product-name text-decoration-none">{{ $product->name }}</h2>
        </div>
    </a>
@endforeach