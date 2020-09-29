<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link {{ active_class(if_route('backend.product.edit')) }}" href="{{ route('backend.product.edit', ['id' => $product->id]) }}">Thông tin chung</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ active_class(if_route('backend.product.metadata')) }}" href="{{ route('backend.product.metadata', ['product_id' => $product->id]) }}">Thuộc tính sản phẩm</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ active_class(if_route('backend.product.images')) }}" href="{{ route('backend.product.images', ['id' => $product->id]) }}">Hình ảnh</a>
    </li>
</ul>
