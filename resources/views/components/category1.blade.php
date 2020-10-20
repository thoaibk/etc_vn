<div class="row">
    @foreach($categories as $cate)
        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="card service-card">
                <div class="card-body">
                    <div class="service-image">
                        <a href="{{ $cate->publicUrl() }}">
                            <img src="{{ $cate->thumb() }}" class="img-fluid" alt="{{ $cate->name }}">
                        </a>
                    </div>
                    <div class="service-meta mt-2">
                        <h4 class="service-name"><a class="service-link" href="{{ $cate->publicUrl() }}">{{ $cate->name }}</a></h4>
                        <p>{{ \Illuminate\Support\Str::limit($cate->short_desc, 76) }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
