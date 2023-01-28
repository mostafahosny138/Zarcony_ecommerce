@extends('front.layouts.master')

@section('content')

    <!-- Shop Start -->
    <div class="container pt-5">
        <div class="row px-xl-5" id="load_data">


            <!-- Shop Product Start -->
            @include('front.catalog.components.products')

            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->

@endsection
