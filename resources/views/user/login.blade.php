<!DOCTYPE html>
<html lang="eng">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Arts & Crafts</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <!-- Css Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/elegant-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slicknav.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<div class="container-fluid">
    <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
            <div class="bg-white rounded p-4 p-sm-5 my-4 mx-3" style="border: 1px solid #28a745;">
                <div class="d-flex align-items-center justify-content-between mb-3">
                   
                    <h3 class="text-success">Login </h3>
                </div>
                <form action="{{ url('/loginLogic') }}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                       
                        <label for="floatingInput">Email address</label>
                        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="Enter Your Email" required>
                    </div>
                    <div class="form-floating mb-4">
                        
                        <label for="floatingPassword">Password</label>
                        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                    </div>
                    <input type="submit" class="btn btn-success py-3 w-100 mb-4" value="Login">
                </form>
                <p class="text-center mb-0">Don't have an Account? <a href="{{ url('/sign') }}" class="text-success">Sign Up</a></p>
            </div>
        </div>
    </div>
</div>

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/mixitup.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>



</body>

</html>