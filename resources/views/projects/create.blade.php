@extends('layouts.master')
	@section('content')
		<div class="card">
			<div class="card-heading">
				<span class="card-title">Create Survey</span>
			</div>
			<div class="card-body">
				<form class="form-horizontal" method="post" action="{{ route('projects.store') }}" enctype="multipart/form-data">
					{!!csrf_field()!!}
					<div class="md-form-group {{$errors->has('project_name') ? 'has-error' : ''}}">
			          <input class="md-input" name="project_name" value="{{old('project_name')}}">
			          <label>Title</label>
			          {!!$errors->first('project_name', '<span class="help-block">:message</span>')!!}
			        </div>
			        <div class="md-form-group {{$errors->has('details') ? 'has-error' : ''}}">
			        	<textarea class="md-input" name="details" rows="4">{{old('details')}}</textarea>
			          <label>Details</label>
			          {!!$errors->first('details', '<span class="help-block">:message</span>')!!}
			        </div>
			        <div class="md-form-group">
			        	<input class="md-input" type="file" name="image" accept=".jpg .jpeg .png">
			        	<label>Image</label>
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