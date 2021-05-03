<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a87e9d7c5f.js" crossorigin="anonymous"></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link href="css/style.css" rel="stylesheet">
    <!------ Include the above in your HEAD tag ---------->
</head>

<body id="LoginForm">
    <div class="limiter">
        <div class="container-login100" style="background-image: url(images/getstarted.jpeg);">
            <div class="wrap-login200">
                <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <span class="login100-form-logo">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ url('images/logo_anekamotor.png') }}" height="55" width="90">
                        </a>
                    </span>

                    <span class="login100-form-title p-b-34 p-t-27">
                        <div class="card-header" style="color: white;">{{ __('Register') }}</div>
                    </span>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf


                            <div class="wrap-input100 validate-input">
                                <input class="input100 @error('name') is-invalid @enderror" type="text" id="name" name="name" placeholder="Name" alue="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <span class="focus-input100" data-placeholder="&#xf207;"></span>
                            </div>


                            <div class="wrap-input100 validate-input" data-validate="Enter E-mail">
                                <input class="input100 @error('email') is-invalid @enderror" id="email" type="text" name="email" placeholder="E-mail Address" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <span class="focus-input100" data-placeholder="&#xf207;"></span>
                            </div>

                            <div class="wrap-input100 validate-input" data-validate="Enter password">
                                <input class="input100  @error('password') is-invalid @enderror" id="password" type="password" name="password" placeholder="Password" required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <span class="focus-input100" data-placeholder="&#xf191;"></span>
                            </div>

                            <div class="wrap-input100 validate-input" data-validate="Enter confirm password">
                                <input class="input100" id="password" tid="password-confirm" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                                <span class="focus-input100" data-placeholder="&#xf191;"></span>
                            </div>


                            <div class="container-login100-form-btn">
                                <button type="submit" class="login100-form-btn">
                                    {{ __('Register') }}
                                </button>
                        </form>
                    </div>

                    <br>
                    <div class="txt1 p-t-90">
                        Do you have an account? Please, click on
                        <a href="{{ route('login') }}"> {{ __('Login') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>


</body>

</html>