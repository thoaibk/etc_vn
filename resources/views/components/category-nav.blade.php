<li class="nav-item dropdown mr-3">
    <a class="nav-link category dropdown-toggle" data-toggle="dropdown" href="#" id="navbarDropdown">
        <span class="nav-text"> Sản phẩm </span>
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        @foreach($categories as $cate)
                    <a class="dropdown-item" href="#">{{ $cate->name }}</a>
        @endforeach
    </div>

</li> <!-- Catagory 2-->
