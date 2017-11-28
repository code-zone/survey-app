@extends('layouts.master')
	@section('content')
		<div class="card">
			<div class="card-heading">
				<span class="card-title">Metric Constraints</span>
			</div>
			<div class="card-body">
				<div class="row table-responsive">
				<table class="table table-striped">
					<thead>
						<th>Constraint</th>
						<th></th>
					</thead> 
					<tbody>
						@foreach($metric->constraints as $constraint)
						<tr>
							<form method="post" action="{{ route('update.constraints', $constraint->id) }}">
						{{csrf_field()}}
							<td>
							<input type="text" value="{{$constraint->constraint_name}}" name="constraint_name" class="form-control">
							</td>
							<td>
								<button type="submit" class="btn pink pull-right text-white">Edit</button>
							</td>
						</form>
						</tr>
						@endforeach
					</tbody>
					</table>
					</form>
				</div>
			</div>
		</div>
	@endsection