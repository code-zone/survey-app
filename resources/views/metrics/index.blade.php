@extends('layouts.master')
	@section('content')
		<div class="card">
			<div class="card-heading">
				<span class="card-title"></span>
			</div>
			<div class="card-body">
				<div class="row">
					<a href="{{ route('metrics.create') }}" class="btn btn-primary pull-right">
						<i class="icon mdi-content-add i-20"></i>
						Create Metric
					</a>
				</div>
				<br>
				<table class="table table-striped" ui-jp="dataTable">
					<thead>
						<th>#</th>
						<th>Metric</th>
						<th>Details</th>
						<th>Metric Score</th>
						<th>Options</th>
					</thead>
					<tbody>
						@foreach($metrics as $key => $metric)
						<tr>
							<td>{{++$key}}</td>
							<td>{{$metric->metric_name}}</td>
							<td>{{$metric->details}}</td>
							<td>{{$metric->score_index}}</td>
							<td>
								<span class="dropdown">
						          <a md-ink-ripple="" data-toggle="dropdown" class=" waves-effect" aria-expanded="false">
						            <i class="mdi-navigation-more-vert i-24"></i>
						          </a>
						          <ul class="dropdown-menu dropdown-menu-scale pull-right pull-up text-color">
						            <li>
						                <a md-ink-ripple="" data-target="#modal" data-toggle="modal" onclick="$('#metric-form').prop('action','{{ route('constraints.create', $metric->id) }}')" class=" waves-effect ajaxModal">
						                    <i class="icon mdi-action-favorite-outline i-20"></i>
						                	<span>Add Constraint</span>
						              	</a>
						            </li>
						            <li>
						                <a md-ink-ripple="" data-target="#score-modal" data-toggle="modal" onclick="$('#metric-score').prop('action','{{ route('score.create', $metric->id) }}')" class=" waves-effect ajaxModal">
						                    <i class="icon mdi-action-grade i-20"></i>
						                    <span>Add Rate Value</span>
						                </a>
						            </li>
						            <li>
						                <a md-ink-ripple="" href="{{ route('metric.edit', $metric->id) }}" class=" waves-effect">
						                	<i class="icon mdi-content-create i-20"></i>
						                	<span>Edit</span>
						                </a>
						            </li>
						             <li>
						                <a md-ink-ripple="" href="{{ route('edit.constraints', $metric->id) }}" class=" waves-effect">
						                	<i class="icon mdi-action-question-answer i-20"></i>
						                	<span>&nbsp; Edit Constraints</span>
						                </a>
						            </li>
						          </ul>
						        </span>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		 <div class="modal fade" id="modal" data-backdrop="false">
                          <div id="ajax-modal" class="modal-dialog">
                <div class="modal-content">
                    <div class="panel panel-default">
                    	<div class="panel-heading">
                        <span class="card-title">Add Metric Constaint</span>
                        </div>
                    </div>
                    <div class="modal-body panel-body">
                       <form id="metric-form" action="" method="post">
                       	{!!csrf_field()!!}
							<div class="md-form-group {{$errors->has('constraint_name') ? 'has-error' : ''}}">
					          <input class="md-input" name="constraint_name" value="{{old('constraint_name')}}">
					          <label>Constraint Name</label>
					          {!!$errors->first('constraint_name', '<span class="help-block">:message</span>')!!}
					        </div>
					        <div class="md-form-group">
					        	<a data-dismiss="modal" class="btn btn-danger">Close</a>
		          				<button class="btn btn-primary pull-right">
		          				<i class="icon mdi-content-add i-20"></i>
		          				&nbsp; Create
		          				</button>
		        			</div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
         <div class="modal fade" id="score-modal" data-backdrop="false">
                          <div id="ajax-modal" class="modal-dialog">
                <div class="modal-content">
                    <div class="panel panel-default">
                    	<div class="panel-heading">
                        <span class="card-title">Add Metric Score</span>
                        </div>
                    </div>
                    <div class="modal-body panel-body">
                       <form id="metric-score" action="" method="post">
                       	{!!csrf_field()!!}
							<div class="md-form-group {{$errors->has('comment') ? 'has-error' : ''}}">
					          <input class="md-input" name="comment" value="{{old('comment')}}">
					          <label>Score Title</label>
					          {!!$errors->first('comment', '<span class="help-block">:message</span>')!!}
					        </div>
					        <div class="md-form-group {{$errors->has('score') ? 'has-error' : ''}}">
					          <input class="md-input" name="score" value="{{old('score')}}">
					          <label>Score</label>
					          {!!$errors->first('score', '<span class="help-block">:message</span>')!!}
					        </div>
					        <div class="md-form-group">
					        	<a data-dismiss="modal" class="btn btn-danger">Close</a>
		          				<button class="btn btn-primary pull-right">
		          				<i class="icon mdi-content-add i-20"></i>
		          				&nbsp; Create
		          				</button>
		        			</div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
	@endsection