@extends('layouts.master')
	@section('content')
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
							@is('Admin')
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
						            		View Survey
						            	</a>
						            </li>
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
						       	</ul>
						  	</span>
						  	@endis
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
				<div class="row">
					<center>
						<a href="#start-survey" data-toggle="modal" class="btn btn-indigo btn-lg indigo">Select Platforms</a>
					</center>
				</div>
			</div>
		</div>
		@is('Admin')
		<a href="{{url('projects/create')}}" md-ink-ripple class="md-btn md-fab md-fab-bottom-right pos-fix green"><i class="mdi-content-add i-24"></i></a>
		@endis
	@endsection
	@section('modal')
		<div class="modal fade" id="start-survey" data-backdrop="false">
            <div id="ajax-modal" class="modal-dialog">
                <div class="modal-content">
                    <div class="panel panel-default">
                    	<div class="panel-heading">
                        <span class="card-title">Select Social Media Platforms To Take survey</span>
                    </div>
                    </div>
                    <div class="modal-body panel-body">
                       <form id="metric-score" action="{{ route('project.start_survey')}}" method="post">
                       	{!!csrf_field()!!}
							<table class="table">
								@foreach($projects as $project)
								<tr>
									<td>
										<label class="ui-switch bg-primary m-t-xs m-r">
								          	<input type="checkbox" name="projects[]" value="{{$project->id}}">
								          	<i></i>
								        </label>
									</td>
									<td>
										{{$project->project_name}}
									</td>
									<td>
								        {{$project->details}}
								   	</td>
								</tr>
								@endforeach
							</table>
							<div class="row">
								<center>
									<button type="submit" class="btn btn-indigo btn-lg indigo">
										Start Survey
									</button>
								</center>
							</div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
