@extends('layouts.master')
	@section('content')
		<div class="card">
			<div class="card-heading">
				<span class="card-title">{{$metric->metric_name}} Assessment</span>
			</div>
			<div class="card-body">
				@if(session()->has('message'))
					<div class="alert alert-success">
						<p>
							{{session()->pull('message')}}
						</p>
					</div>
				@endif
				<div class="row table-responsive">
				<form method="post" action="{{ route('metric.constraints.save', $metric->id) }}">
				{{csrf_field()}}
				<input type="hidden" name="project_id" value="{{$project->id}}">
				<table class="table table-striped">
					<thead>
						<th></th>
						@foreach($scores as $score)
						<th>{{$score->comment}}</th>
						@endforeach
					</thead> 
					<tbody>
						@foreach($metric->constraints as $constraint)
						<tr>
							<td>{{$constraint->constraint_name}}</td>
							@foreach($scores as $score)
							<td>
								<label class="md-switch">
						            <input type="radio" value="{{$score->score}}" name='constraints[{{$constraint->id}}]'" required="" {{$ratings->where('constraint_id', $constraint->id)->where('rating', $score->score)->count() ==1 ? 'checked' : '' }}>
						            <i class="pink"></i>
						         </label>
							</td>
							@endforeach
						</tr>
						@endforeach
						<tr>
							<td colspan="{{count($scores)+1}}">
								<button type="submit" class="btn pink pull-right">Submit Results</button>
							</td>
						</tr>
					</tbody>
					</table>
					</form>
				</div>
			</div>
		</div>
	@endsection