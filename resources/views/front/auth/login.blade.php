@extends('front.layouts.master')

@section('content')




    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary ">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Login</h1>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->
    <div class="container pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-6 m-auto">
                @error('error-credentials')
                <div class="mt-3 mb-3">
                    <span class="alert alert-danger">{{$message}}</span>
                </div>
                @enderror
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Login</h4>

                    <form method="post" action="{{route('do-login')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control" type="email" name="email" placeholder="example@email.com">
                                @error('email')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" name="password" >
                                @error('password')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Login</button>

                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
    <!-- Checkout End -->



@endsection
