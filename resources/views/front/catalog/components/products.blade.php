<div class="col-lg-12 col-md-12">
    <div class="row pb-3">
        @foreach($products as $product)
            @include('front.catalog.product-cart')
        @endforeach


        <div class="col-12 pb-1">
            {{$products->links('front.layouts.paginate',['pagd'=>'dddd'])}}

        </div>
    </div>
</div>
