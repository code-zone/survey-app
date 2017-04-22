@extends('layouts.layout')
    @section('content')
                <!-- header start -->
                @include('navigation')
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
                           {{--  <div class="footer-content">
                                <p class="large">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel nam magnam natus tempora cumque, aliquam deleniti voluptatibus voluptas. Repellat vel, et itaque commodi iste ab, laudantium voluptas deserunt nobis.</p>
                                <ul class="list-icons">
                                    <li><i class="fa fa-map-marker pr-10"></i> One infinity loop, 54100</li>
                                    <li><i class="fa fa-phone pr-10"></i> +00 1234567890</li>
                                    <li><i class="fa fa-fax pr-10"></i> +00 1234567891 </li>
                                    <li><i class="fa fa-envelope-o pr-10"></i> your@email.com</li>
                                </ul>
                                <ul class="social-links">
                                    <li class="facebook"><a target="_blank" href="https://www.facebook.com><i class="fa fa-facebook"></i></a></li>
                                    <li class="twitter"><a target="_blank" href="https://twitter.com"><i class="fa fa-twitter"></i></a></li>
                                    <li class="googleplus"><a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
                                    <li class="skype"><a target="_blank" href="http://www.skype.com"><i class="fa fa-skype"></i></a></li>
                                    <li class="linkedin"><a target="_blank" href="http://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li>
                                    <li class="youtube"><a target="_blank" href="http://www.youtube.com"><i class="fa fa-youtube"></i></a></li>
                                    <li class="flickr"><a target="_blank" href="http://www.flickr.com"><i class="fa fa-flickr"></i></a></li>
                                    <li class="pinterest"><a target="_blank" href="http://www.pinterest.com"><i class="fa fa-pinterest"></i></a></li>
                                </ul>
                            </div> --}}
                            
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
                                         
                                    </div>
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