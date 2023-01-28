@extends('front.layouts.master')

@section('content')


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">We have successfully received your order </h1>
            <div class="d-inline-flex">
                <a href="{{route('index')}}" class="m-0">Go TO Home</a>
            </div>
        </div>
    </div>
    <!-- Page Header End -->





@endsection
