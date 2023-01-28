@extends('front.layouts.master')

@section('content')


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Checkout</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->
    <form method="post" action="{{route('do-checkout')}}">
    @csrf
    <div class="container pt-1">
        <div class="row px-xl-5">
            <div class="col-lg-6" >
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Products</h5>
                        @foreach($items as $item)
                            <div class="d-flex justify-content-between">
                                <p>{{$item->product->title}}</p>
                                <p>${{$item->product->price}}</p>
                            </div>
                        @endforeach

                        <hr class="mt-0">

                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">${{$total}}</h5>
                        </div>
                    </div>
                </div>


            </div>

            <div class="col-lg-6" >

                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Confirm</h4>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <lable>Address</lable>
                            <input class="form-control" type="text" name="address" required placeholder="123 Street">
                        </div>


                        <div class="form-group mt-2">
                            <label for="">payment</label>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment_method" value="cod" checked id="directcheck">
                                <label class="custom-control-label" for="directcheck">Cash On Delivery</label>
                            </div>
                        </div>


                    </div>
                    @if($total>0)
                    <div class="card-footer border-secondary bg-transparent">
                        <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3" type="submit">Place Order</button>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
    </form>
    <!-- Checkout End -->


@endsection
