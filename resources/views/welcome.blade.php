@extends('layouts.layout')
    @section('content')
                <!-- header start -->
                @include('navigation.navigation')
        <!-- banner start -->
        <!-- ================ -->
        <div id="banner" class="banner">
            <div class="banner-image"></div>
            <div class="banner-caption">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 object-non-visible" data-animation-effect="fadeIn">
                            <h2 class="text-center">Get answers with the world’s leading survey platform <span>MSSLI</span></h2>
                            <p class="lead text-center">Give yourself and the rest of your team the answers you need to make smarter decisions. Use our robust analytics to make data-driven decisions. Get responses in real time, slice and dice data to reveal insights, and easily share presentation-ready charts and reports. </p>
                            <div class="text-center scrollspy smooth-scroll">
                                <a href="#register" style="background: rgba(0,0,0, 0.0);" class="btn btn-default">Get Started</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner end -->
    
        <!-- footer start -->
        <!-- ================ -->
        <footer id="footer">

            <!-- .footer start -->
            <!-- ================ -->
            <div class="footer section">
                <div class="container">
                    <div id="register" class="row">
                        <div class="col-sm-6">
                            <img src="{{ asset('images/chart.png') }}">
                            <p>
                                Join the Survey and give us your feedback about usability, effectiveness and perfomance for varous software and Mobile Applications
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <div class="footer-content">
                                <h2>Create An Account</h2>
                                <p>Create an account and join the survey</p>
                                <form role="form" method="post" id="footer-form" action="{{ route('register') }}">
                        {{ csrf_field() }}
                                    <div class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label class="sr-only" for="name">Name</label>
                                        <input type="text" class="form-control" placeholder="Name" name="name" value="{{old('name')}}">
                                        <i class="fa fa-user form-control-feedback"></i>
                                         {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                                    </div>
                                    <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label class="sr-only" for="email">Email address</label>
                                        <input type="email" class="form-control" placeholder="Enter email" name="email" value="{{old('email')}}">
                                        <i class="fa fa-envelope form-control-feedback"></i>
                                        {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                    </div>
                                    <div class="form-group has-feedback {{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                        <label class="sr-only" for="phone_number">Phone Number</label>
                                        <input type="text" class="form-control" placeholder="Enter you phone number" name="phone_number" value="{{old('phone_number')}}">
                                        <i class="fa fa-phone form-control-feedback"></i>
                                        {!! $errors->first('phone_number', '<span class="help-block">:message</span>') !!}
                                    </div>
                                    <div class="form-group {{ $errors->has('age') ? ' has-error' : '' }}">
                                        <label class="sr-only" for="password">Age</label>
                                        <select name="age" class="select2">
                                            <optgroup label="Age Ranges">
                                                <option value="10">10 to 20 Years</option>
                                                <option value="20">21 to 40 Years</option>
                                                <option value="40">41 to 60 Years</option>
                                                <option value="60">60+ Years</option>   
                                            </optgroup>
                                        </select>
                                         {!! $errors->first('age', '<span class="help-block">:message</span>') !!}
                                    </div>
                                    <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label class="sr-only" for="password">Password</label>
                                        <input type="password" class="form-control" placeholder="Enter Password" name="password">
                                        <i class="fa fa-key form-control-feedback"></i>
                                         {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                                    </div>
                                    <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label class="sr-only">Confirm Password</label>
                                        <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
                                        <i class="fa fa-key form-control-feedback"></i>
                                         
                                    </div>{{ $errors->has('name') ? ' has-error' : '' }}
                                <input type="submit" value="Register" class="btn btn-success pull-right">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
            <!-- .footer end -->
    @endsection
    @push('js-scripts')
        <script>
           $('.select2').select2({width:"100%"})
        </script>
    @endpush