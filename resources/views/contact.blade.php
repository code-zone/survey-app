@extends('layouts.layout')
    @section('content')
     <!-- header start -->
        @include('navigation.navigation')
        <div class="space"></div>
        <!-- footer start -->
		<!-- ================ -->
        @php
            $site = DB::table('configs')->get();
        @endphp
		<footer id="footer">

			<!-- .footer start -->
			<!-- ================ -->
			<div class="footer section">
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
                        <h2>About Author</h2>
							<div class="footer-content">
								<p class="large">{{$site->where('key', 'about')->first()->value}}</p>
								<ul class="list-icons">
									<li><i class="fa fa-user pr-10"></i> {{$site->where('key', 'author')->first()->value}}</li>
									<li><i class="fa fa-phone pr-10"></i> {{$site->where('key', 'phone')->first()->value}}</li>
									<li><i class="fa fa-fax pr-10"></i> {{$site->where('key', 'secondary_phone')->first()->value}} </li>
									<li><i class="fa fa-envelope-o pr-10"></i>{{$site->where('key', 'email')->first()->value}}</li>
								</ul>
							</div>
						</div>
						<div class="col-sm-6">
                            <h2>Get in Touch</h2>
							<div class="footer-content">
                                @if(session()->has('response'))
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>Success!</strong> {{session('response')}}
                                </div>
                                @endif
                                @if(session()->has('error'))
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>Error!</strong> {{session('error')}}
                                </div>
                                @endif
                                <p>Do you have an Idea, opinion or having trouble please contact us here</p>
								<form role="form" id="footer-form" action="{{url('send-feedback')}}" method="post">
									{{csrf_field()}}
                                    <div class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
										<label class="sr-only" for="name2">Name</label>
										<input type="text" class="form-control" value="{{old('name')}}" placeholder="Name" name="name" >
										<i class="fa fa-user form-control-feedback"></i>
                                         {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
									</div>
									<div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
										<label class="sr-only" for="email2">Email address</label>
										<input type="email" class="form-control" value="{{old('email')}}" placeholder="Enter email" name="email" >
										<i class="fa fa-envelope form-control-feedback"></i>
                                         {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
									</div>
									<div class="form-group has-feedback {{ $errors->has('message') ? ' has-error' : '' }}">
										<label class="sr-only" for="message2">Message</label>
										<textarea class="form-control" rows="6" id="message2" placeholder="Message" name="message" >{{old('message')}}</textarea>
										<i class="fa fa-pencil form-control-feedback"></i>
                                         {!! $errors->first('message', '<span class="help-block">:message</span>') !!}
									</div>
									<input type="submit" value="Send" class="btn btn-default">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- .footer end -->
        @endsection