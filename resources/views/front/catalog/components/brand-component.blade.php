@foreach($brands as $brand)
    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
        <a href="{{route('brand-products',$brand->id)}}">
            <div class="card product-item border-0 mb-4">

                <div class="card-footer text-center justify-content-between bg-light border">
                    <span class="btn btn-sm text-dark p-0">{{$brand->name}}</span>
                </div>
            </div>
        </a>
    </div>
@endforeach


<div class="col-12 pb-1">
    <nav aria-label="Page navigation">
        {{$brands->links('front.layouts.paginate')}}
    </nav>
</div>
