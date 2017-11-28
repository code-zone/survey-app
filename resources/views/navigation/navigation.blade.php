<!-- ================ --> 
        <header class="header fixed clearfix navbar navbar-fixed-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">

                        <!-- header-left start -->
                        <!-- ================ -->
                        <div class="header-left clearfix">

                            <!-- logo -->
                            <div class="logo smooth-scroll">
                                <a href="#banner"><img id="logo" src="{{asset('images/logo.png')}}" alt="Worthy"></a>
                            </div>

                            <!-- name-and-slogan -->
                            <div class="site-name-and-slogan smooth-scroll">
                                <div class="site-name"><a href="#banner">MSSLI</a></div>
                                <div class="site-slogan">Mobile Social Software Learnability Index</div>
                            </div>

                        </div>
                        <!-- header-left end -->

                    </div>
                    <div class="col-sm-6">

                        <!-- header-right start -->
                        <!-- ================ -->
                        <div class="header-right clearfix">

                            <!-- main-navigation start -->
                            <!-- ================ -->
                            <div class="main-navigation animated">

                                <!-- navbar start -->
                                <!-- ================ -->
                                <nav class="navbar navbar-default" role="navigation">
                                    <div class="container-fluid">

                                        <!-- Toggle get grouped for better mobile display -->
                                        <div class="navbar-header pull-right">
                                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                                                <span class="sr-only">Toggle navigation</span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                            </button>
                                        </div>

                                        <!-- Collect the nav links, forms, and other content for toggling -->
                                        <div class="collapse navbar-collapse scrollspy smooth-scroll" id="navbar-collapse-1">
                                            <ul class="nav navbar-nav navbar-right">
                                                <li class="{{isActive('/')}}"><a href="{{url('/')}}">Home</a></li>
                                                <li  class="{{isActive('contact')}}"><a href="{{url('contact')}}">About</a></li>
                                                <li  class="{{isActive('login')}}"><a href="{{url('login')}}">Sign In</a></li>
                                            </ul>
                                        </div>

                                    </div>
                                </nav>
                                <!-- navbar end -->

                            </div>
                            <!-- main-navigation end -->

                        </div>
                        <!-- header-right end -->

                    </div>
                </div>
            </div>
        </header>
        @push('css')
        <!-- Plugins -->
		<link href="{{asset('css/animations.css')}}" rel="stylesheet">

		<!-- Worthy core CSS file -->
		<link href="{{asset('css/style.css')}}" rel="stylesheet">

		<!-- Custom css --> 
		<link href="{{asset('css/custom.css')}}" rel="stylesheet">
        @endpush