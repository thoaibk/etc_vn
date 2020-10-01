<div id="index-slider">
    <div class="sscontainer">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($banners as $banner)
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="{{ ($loop->index == 0) ? 'active' : '' }}"></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach ($banners as $banner)
                    <div class="carousel-item {{ ($loop->index == 0) ? 'active' : '' }}">
                        <img class="carousel-image" src="/images/{{ pathToLink($banner['banner_image_path']) }}" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            @if(!empty($banner['text1']))
                                <h5>{{ $banner['text1'] }}</h5>
                            @endif
                            @if(!empty($banner['text2']))
                                <p>{{ $banner['text2'] }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach

            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
