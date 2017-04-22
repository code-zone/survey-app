@extends('layouts.master')
	@section('content')
		<div class="row">
			<div class="col-sm-12">
				@is('Admin')
				<a href="{{url('projects/create')}}" class="btn btn-primary pull-right">
					Create Survey
				</a>
				@endis
			</div>		
		</div>
		<br>
		<div class="card">
			<div class="card-heading">
				<span class="card-title">Surveys</span>
			</div>
			<div class="card-body">
				<div class="row">
				<p>
					Take part in these surveys, Try as much as possible to give the right feedback so that we can be abble to create better products
				</p>
				<br>
				@foreach($projects as $project)
					<div class="col-sm-4">
						<div class="panel panel-card">
							 <div class="item">
							    <img src="{{ asset($project->image) }}" class="w-full r-t" alt="Washed Out">
							    	<div class="bottom teal p">
							       		{{$project->project_name}}
								   	</div>
							</div>
							<span class="dropdown">
						  		<a md-ink-ripple class="md-btn md-raised md-fab pink m-r md-fab-offset pull-right" data-toggle="dropdown">
						  			<span class="text-white">
						  				<i class="fa fa-ellipsis-v fa-lg"></i>
						  			</span>
						  		</a>
						  		<ul class="dropdown-menu dropdown-menu-scale pull-up text-color">
						            <li>
						            	<a href="{{ route('project.metrics.show', $project->id) }}" >
						            		<i class="icon mdi-action-settings-voice i-20"></i>
						            		Start Survey
						            	</a>
						            </li>
						            @is('Admin')
						            <li>
						            	<a href="{{ route('project.metrics.add', $project->id) }}" >
						            		<i class="icon mdi-action-settings i-20"></i>
						            		Add Metrics Measures
						            	</a>
						            </li>
						            <li>
						            	<a href="{{ route('project.edit', $project->id) }}" >
						            		<i class="icon mdi-content-create i-20"></i>
						            		Edit
						            	</a>
						            </li>
						            @endis
						       	</ul>
						  	</span>
							<div class="p">
							    <h3>{{$project->project_name}}</h3>
							    <p>
							        {{$project->details}}
							   	</p>
							</div>
						</div>
					</div>
				@endforeach
				</div>
			</div>
		</div>
	@endsection