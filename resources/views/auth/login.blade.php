<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Automated System for Marking Theory Based Examination Questions</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset ('/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet')}}">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('/css/templatemo-finance-business.css')}}">
    <link rel="stylesheet" href="{{asset('/css/owl.css')}}">
    <!--

Finance Business TemplateMo

https://templatemo.com/tm-545-finance-business

-->
</head>
<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <div class="callback-form">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2><em>Login</em></h2>
                        <span>Please provide your student's, Lecturer or Admin login details</span>
                    </div>
                </div>
                <div class="col-md-8 m-auto">
                    <div class="contact-form">
                        <form id="contact" action="/login" method="post">
                            @csrf
                            <div class="row col-md-8 m-auto">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" id="email" pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" required="">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </fieldset>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="password" type="password" class="form-control form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required="">
                                    </fieldset>

                                </div>

                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="border-button">Login</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Additional Scripts -->
    <script src="{{asset('/js/custom.js')}}"></script>
    <script src="{{asset('/js/owl.js')}}"></script>
    <script src="{{asset('/js/slick.js')}}"></script>
    <script src="{{asset('/js/accordions.js')}}"></script>

    <script language="text/Javascript">
        cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
        function clearField(t) { //declaring the array outside of the
            if (!cleared[t.id]) { // function makes it static and global
                cleared[t.id] = 1; // you could use true and false, but that's more typing
                t.value = ''; // with more chance of typos
                t.style.color = '#fff';
            }
        }
    </script>

</body>

</html>