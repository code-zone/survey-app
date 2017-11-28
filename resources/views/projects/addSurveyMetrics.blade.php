@extends('layouts.master')
	@section('content')		
		<div class="panel panel-default">
			<div class="panel-heading">
				<span class="card-title">Select metrics for {{$project->project_name}}</span>
			</div>
			<div class="panel-body">
				<table class="table table-striped table-bordered">
					<thead>
						<th>#</th>
						<th>Metric</th>
						<th>Details</th>
						<th>Metric Score</th>
						<th>Options</th>
					</thead>
					<tbody>
						<form action="{{ route('project.metrics.save', $project->id) }}" method="post">
						{{csrf_field()}}
						@foreach($metrics as $key => $metric)
						<tr>
							<td>{{++$key}}</td>
							<td>{{$metric->metric_name}}</td>
							<td>{{$metric->details}}</td>
							<td>{{$metric->score_index}}</td>
							<td>
								<label class="md-switch">
						            <input type="checkbox" name='metrics[]'{{$project->metrics->where('metric_id', $metric->id)->count() ==1 ? 'checked' : ''}} value="{{$metric->id}}">
						            <i class="green"></i>
						         </label>
							</td>
						</tr>
						@endforeach
						<tr>
							<td colspan="5">
								<button class="btn btn-primary pull-right">
									Add Metrics
								</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	@endsection