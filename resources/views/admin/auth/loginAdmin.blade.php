@extends('admin.AdminHome')
@section('title', 'Login Admin')
@section('admin_content')
    <!-- BEGIN : LOGIN PAGE 5-1 -->
    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="">
                <img src="{{asset('adminAssets/assets/pages/img/logo-big.png')}}" alt="" /> </a>
        </div>
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" action="{{route('admin.login')}}" method="post">
                @csrf

                <h3 class="form-title font-green">Sign In</h3>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter any E-mail and password. </span>
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">E-mail</label>
                    <input id="email" type="email"  class="form-control form-control-solid placeholder-no-fix @error('email') is-invalid @enderror" autocomplete="off" placeholder="E-mail"  value="{{ old('email') }}" name="email" /> </div>
                    @error('email')
                        <span class="invalid-feedback alert text-danger" role="alert">
                         <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input id="password"  class="form-control form-control-solid placeholder-no-fix @error('password') is-invalid @enderror" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
                    @error('password')
                    <span class="invalid-feedback alert text-danger" role="alert">
                             <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                <div class="form-actions">
                    <button type="submit" class="btn green uppercase">Login</button>
                    <label class="rememberme check mt-checkbox mt-checkbox-outline">
                        <input type="checkbox" name="remember" value="1" />Remember
                        <span></span>
                    </label>
                </div>
            </form>
            <!-- END LOGIN FORM -->

        </div>
        <div class="copyright"> {{date('Y')}} © Admin. </div>
        <!-- END LOGO -->
{{--        <div class="user-login-5">--}}
{{--        <div class="row bs-reset">--}}
{{--            <div class="col-md-6 bs-reset mt-login-5-bsfix">--}}
{{--                <div class="login-bg" style="background:url({{asset('adminAssets/assets/pages/img/login/bg1.jpg')}})">--}}
{{--                    <img class="login-logo" src="{{asset('adminAssets/assets/pages/img/login/logo.png')}}" /> </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 login-container bs-reset mt-login-5-bsfix">--}}
{{--                <div class="login-content">--}}
{{--                    <h1>FindJop Admin</h1>--}}
{{--                    <p> Lorem ipsum dolor sit amet, coectetuer adipiscing elit sed diam nonummy et nibh euismod aliquam erat volutpat. Lorem ipsum dolor sit amet, coectetuer adipiscing. </p>--}}
{{--                    <form action="{{ route('admin.login')}}" class="login-form" method="post">--}}
{{--                        @csrf--}}
{{--                        <div class="alert alert-danger display-hide">--}}
{{--                            <button class="close" data-close="alert"></button>--}}
{{--                            <span>Enter any E-mail and password. </span>--}}
{{--                        </div>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-xs-6">--}}
{{--                                <input id="email" type="email" class="form-control form-control-solid placeholder-no-fix form-group @error('email') is-invalid @enderror"  name="email" value="{{ old('email') }}" autocomplete="off" placeholder="E-mail"  required/> </div>--}}
{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                     <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            <div class="col-xs-6">--}}
{{--                                <input id="password" type="password" class="form-control form-control-solid placeholder-no-fix form-group @error('email') is-invalid @enderror" name="password"   autocomplete="off" placeholder="Password" name="password" required/> </div>--}}
{{--                                @error('password')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                         <strong>{{ $message }}</strong>--}}
{{--                                        </span>--}}
{{--                                @enderror--}}
{{--                        </div>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-sm-4">--}}
{{--                                <div class="rem-password">--}}
{{--                                    <label class="rememberme mt-checkbox mt-checkbox-outline">--}}
{{--                                        <input type="checkbox" name="remember" value="1" /> Remember me--}}
{{--                                        <span></span>--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm-8 text-right">--}}
{{--                                <button class="btn green" type="submit">Sign In</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--                <div class="login-footer">--}}
{{--                    <div class="row bs-reset">--}}
{{--                        <div class="col-xs-5 bs-reset">--}}
{{--                            <ul class="login-social">--}}
{{--                                <li>--}}
{{--                                    <a href="javascript:;">--}}
{{--                                        <i class="icon-social-facebook"></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="javascript:;">--}}
{{--                                        <i class="icon-social-twitter"></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="javascript:;">--}}
{{--                                        <i class="icon-social-dribbble"></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="col-xs-7 bs-reset">--}}
{{--                            <div class="login-copyright text-right">--}}
{{--                                <p>Copyright &copy; {{date('Y')}}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    </body>

    <!-- END : LOGIN PAGE 5-1 -->
{{--    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">--}}

{{--        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">--}}
{{--            <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">FindJop<span class="tx-info tx-normal">admin</span></div>--}}
{{--            <div class="tx-center mg-b-60">Good Admin</div>--}}
{{--            <form method="POST" action="{{ route('admin.login') }}">--}}
{{--                @csrf--}}
{{--                <div class="form-group">--}}
{{--                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus   placeholder="Enter your E-Mail">--}}
{{--                        @error('email')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                             <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                        @enderror--}}
{{--                </div><!-- form-group -->--}}
{{--                <div class="form-group">--}}
{{--                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">--}}
{{--                        @error('password')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                        @enderror--}}
{{--                    @if (Route::has('password.request'))--}}
{{--                        <a class="tx-info tx-12 d-block mg-t-10" href="{{ route('password.request') }}">--}}
{{--                            {{ __('Forgot Your Password?') }}--}}
{{--                        </a>--}}
{{--                    @endif--}}
{{--                </div><!-- form-group -->--}}
{{--                <button type="submit" class="btn btn-info btn-block">Sign In</button>--}}
{{--            </form>--}}
{{--        </div><!-- login-wrapper -->--}}
{{--    </div><!-- d-flex -->--}}
@endsection
