@extends('layouts.master')
	@section('content')
		<div class="card">
			<div class="card-heading">
				<span class="card-title">Create Metric</span>
			</div>
			<div class="card-body">
				<form class="form-horizontal" method="post" action="{{ route('metrics.store') }}">
					{!!csrf_field()!!}
					<div class="col-sm-6">
						<div class="md-form-group {{$errors->has('metric_name') ? 'has-error' : ''}}">
				          <input class="md-input" name="metric_name" value="{{old('metric_name')}}">
				          <label>Metric</label>
				          {!!$errors->first('metric_name', '<span class="help-block">:message</span>')!!}
				        </div>
					</div>
					<div class="col-sm-6">
						<div class="md-form-group {{$errors->has('score_index') ? 'has-error' : ''}}">
				          <input class="md-input" name="score_index" value="{{old('score_index')}}">
				          <label>Metric Score</label>
				          {!!$errors->first('score_index', '<span class="help-block">:message</span>')!!}
				        </div>
					</div>
					<div class="col-sm-12">
				        <div class="md-form-group {{$errors->has('details') ? 'has-error' : ''}}">
				        	<textarea class="md-input" name="details" rows="4">{{old('details')}}</textarea>
				        	 {!!$errors->first('details', '<span class="help-block">:message</span>')!!}
				          <label>Details</label>
				        </div>
				    </div>
			        <div class="md-form-group">
          				<button class="btn btn-primary">
          				<i class="icon mdi-content-add i-20"></i>
          				&nbsp; Create
          				</button>
        			</div>
				</form>
			</div>
		</div>
	@endsection