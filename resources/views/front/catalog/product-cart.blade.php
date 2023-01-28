<div class="col-lg-3 col-md-6 col-sm-12 pb-1">
    <a href="{{route('product-details',$product->id)}}" class="card product-item  mb-4 border-0 " style="border-radius: 41px">
        <div class="card-header border-0 product-img position-relative overflow-hidden bg-transparent  p-0">
            <img class="img-fluid w-75 m-auto d-block pt-2" style="border-radius: 50%;" src="{{asset('assets/front/')}}/img/product-2.png" alt="">
        </div>
        <div class="card-body  text-center p-1">
            <h6 class="text-truncate mb-3">{{$product->title}}</h6>
            <div class="d-flex justify-content-center">
                <h6>${{$product->price}}</h6>
            </div>
        </div>
        <div class="  justify-content-between ">
{{--            <a href="{{route('product-details',$product->id)}}" class="btn btn-sm text-dark p-1 w-100 btn-secondary"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>--}}
            <button data-product_id="{{$product->id}}" class="btn btn-sm text-dark p-1 add-to-cart w-75 btn-primary m-auto d-block mb-3"><i class="fa fa-shopping-cart mr-1"></i>Add To Cart</button>
        </div>
    </a>
</div>
