@extends('layouts.layout')

@section('content')
<!-- header start -->
    @include('navigation.navigation')
<div class="space"></div>
<div class="container">
<div class="space"></div>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4" style="margin-top:8.5%;">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    @if(session()->has('blocked'))
                    <div class="alert alert-danger">
                        <p>
                          {{session()->pull('blocked')}}
                        </p>
                  </div>
                  @endif
                    <br>
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control input-lg" name="email" value="{{ old('email') }}" required autofocus placeholder="E-Mail Address">
                                <i class="fa fa-envelope form-control-feedback"></i>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control input-lg" name="password" required placeholder="Password">
                                <i class="fa fa-key form-control-feedback"></i>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success pull-right">
                                    Sign In
                                </button>

                                <a class="" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
