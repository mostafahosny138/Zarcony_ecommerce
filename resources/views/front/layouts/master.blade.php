<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ZarCony Ecommerce</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{asset('assets/front/')}}/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('assets/front/')}}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('assets/front/')}}/css/style.css" rel="stylesheet">

</head>

<body>


<!-- Navbar Start -->
<div class="container">
    <div class="row border-top px-xl-5">
        <div class="col-lg-12">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="{{route('index')}}" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto ">
                        <a href="{{route('index')}}" class="nav-item nav-link">Home</a>
                        <a href="{{route('brands')}}" class="nav-item nav-link active">Brands</a>


                    </div>

                    <div class="navbar-nav ml-auto py-0 pull-right">
                        @if(auth()->check() && !auth()->user()->is_admin)
                            <a href="javascript:;" class="nav-item nav-link">{{auth()->user()->name}}</a>
                                <form action="{{route('logout')}}" method="post">
                                @csrf
                                <input type="submit" class="btn btn-primary mt-2" value="Logout">
                            </form>
                        @else
                            <a href="{{route('login')}}" class="nav-item nav-link">Login</a>
                            <a href="{{route('register')}}" class="nav-item nav-link">Register</a>
                        @endif

                        <a href="{{route('cart')}}" class="btn ">
                            <i class="fas fa-shopping-cart text-primary pt-3"></i>
                        </a>

                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Navbar End -->

@yield('content')







<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/front/')}}/lib/easing/easing.min.js"></script>
<script src="{{asset('assets/front/')}}/lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Contact Javascript File -->
<script src="{{asset('assets/front/')}}/mail/jqBootstrapValidation.min.js"></script>
<script src="{{asset('assets/front/')}}/mail/contact.js"></script>

<!-- Template Javascript -->
<script src="{{asset('assets/front/')}}/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="{{asset('assets/front/')}}/js/notify.min.js"></script>


<script>
    $(document).on('click', '.add-to-cart', function (e) {
        e.preventDefault();

        var token = '{{csrf_token()}}';
        var product_id = $(this).data('product_id');

        $(this).attr('disabled',true);
        $(this).text('Loading ...');


        $.ajax({
            'type': 'POST',
            'url': "{{route('add-to-cart')}}",
            data: {'_token':token,'product_id':product_id},
            context:this,
            'statusCode': {
                200: function (responce) {
                    $(this).attr('disabled',false);
                    $(this).html('<i class="fa fa-shopping-cart mr-1"></i>Add To Cart');

                    $.notify("succesfully added", "success");
                },
                401: function (responce) {
                    $(this).attr('disabled',false);
                    $(this).html('<i class="fa fa-shopping-cart mr-1"></i>Add To Cart');
                    $.notify("Please login");
                },

            }
        })
    });


    $(document).on('submit', '.delete-cart-item', function (e) {
        e.preventDefault();
        var url = $(this).attr("action");

        $(this).remove();
        $.ajax({
            'type': 'DELETE',
            'url': url,
            data:{'_token':'{{csrf_token()}}'},
            context:this,
            'statusCode': {
                200: function (responce) {
                    $($(this).data('id')).remove();
                    $('#total').text(responce.data.total);
                    $.notify("succesfully deleted", "success");
                },

            }
        })
    });



    $(document).on('click', '.do-paginate', function (e) {
        e.preventDefault();
        var url = $(this).data('url');

        $(this).remove();
        $.ajax({
            'type': 'GET',
            'url': url,
            context:this,
            'statusCode': {
                200: function (responce) {

                $('#load_data').append(responce.data.html);
                },

            }
        })
    });


</script>

</body>

</html>
