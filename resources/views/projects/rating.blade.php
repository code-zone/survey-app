@extends('layouts.master')
	@section('content')
		<div class="row">
			<div class="col-sm-12">
			</div>		
		</div>
		<br>
		<div class="card">
			<div class="card-heading">
				<span class="card-title">{{$project->project_name}}</span>
			</div>
			<div class="card-body">
				<p>
					Please give us your ratings for {{$project->project_name}} based on these metrics. Your perticipation in this survey is highly appreciated.
				</p>
				<div class="row">
				@foreach($project->metrics as $metric)
					<div class="col-sm-4">
						<div class="panel panel-card">
							 <div class="p-v-lg">
							    	<div class="bottom teal p">
							       		{{$metric->metric->metric_name}}
								   	</div>
							</div>
							<a href="#" md-ink-ripple class="md-btn md-raised md-fab pink m-r md-fab-offset pull-right" >
						  			<span class="text-white">
						  				{{number_format($metric->metric->score($project->id, $user_id),1)}}
						  			</span>
						  		</a>
							<div class="p">
							    <h3>{{$metric->metric->metric_name}}</h3>
							    <p>
							        {{$metric->metric->details}}
							   	</p>
							</div>
						</div>
					</div>
				@endforeach
				</div>
			</div>
		</div>
	@endsection