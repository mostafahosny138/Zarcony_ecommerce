@extends('front.layouts.master')

@section('content')




    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary ">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Register</h1>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->
    <div class="container pt-5">
        <div class="row ">
            <div class="col-lg-6  m-auto">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">CREATE NEW USER</h4>
                    <form method="post" action="{{route('do-register')}}">
                        @csrf
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Name</label>
                            <input class="form-control" value="{{old('name')}}" name="name" type="text" placeholder="John" autocomplete="off">
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" value="{{old('email')}}" type="email" name="email" placeholder="example@email.com" autocomplete="off">
                            @error('email')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Password</label>
                            <input class="form-control" type="password" name="password" autocomplete="off">
                            @error('password')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Password Confirmation</label>
                            <input class="form-control" type="password" name="password_confirmation" placeholder="" autocomplete="off">
                            @error('password_confirmation')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Register</button>

                    </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
    <!-- Checkout End -->



@endsection
