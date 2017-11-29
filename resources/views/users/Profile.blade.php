@extends('layouts.master')
    @section('content')
        <div class="row row-sm">
  <div class="col-sm-4">
    <div class="panel panel-card">
      <div class="r-t pos-rlt col-sm-12" md-ink-ripple style="background:url({{asset('images/a0.jpg')}}) center center; background-size:cover">
        <div class="p-lg bg-white-overlay text-center r-t">
          <a href class="w-xs inline">
            <img src="{{asset('images/avatar1.jpg')}}" class="img-circle img-responsive">
          </a>
          <div class="m-b m-t-sm h3">
            <span class="">{{$user->name}}</span>
          </div>
        </div>
      </div>
      <div class="list-group no-radius no-border">
        @foreach(App\Entities\Project::all() as $survey)
            <a class="list-group-item">
          <span class="pull-right badge teal">{{number_format($survey->ratting($user->id))}}</span> {{$survey->project_name}}
        </a>
        @endforeach
      </div>
      <div class="p">
        <p>About</p>
        <p>{{ $user->about }}</p>
        <div class="m-v">
          <a class="text-muted">
            <i class="fa ui-icon fa-facebook"></i>
          </a>
          <a class="text-muted">
            <i class="fa ui-icon fa-twitter"></i>
          </a>
          <a class="text-muted">
            <i class="fa ui-icon fa-whatsapp"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-8">
    <div class="panel panel-card">
    @if(auth()->user()->self($user))
      <form action="{{route('user.about', $user->id)}}" method="post">
        {{csrf_field()}}
        <textarea name="about" class="form-control no-border" rows="3" placeholder="Write something about you...">{{$user->about}}</textarea>
      <div class="lt p">
        <button class="btn btn-info pull-right btn-sm p-h font-bold">SAVE</button>
        <ul class="nav nav-pills nav-sm">
          <li><a md-ink-ripple class="rounded img-responsive"><i class="fa fa-camera"></i></a></li>
          <li><a md-ink-ripple class="rounded img-responsive"><i class="fa fa-video-camera"></i></a></li>
        </ul>
      </div>
    </form>
    @endif
    </div>
    <div class="panel panel-card clearfix">
      <div class="p-h b-b b-light">
        <ul class="nav nav-lines nav-tabs nav-justified nav-md b-info">
          <li class="active"><a data-toggle="tab" data-target="#timeline" >User Activity</a></li>
          <li><a data-toggle="tab" data-target="#feedback">Survey Feedback</a></li>
        </ul>
      </div>
      <div class="tab-content p-h-lg m-b-lg">      
          <div id="timeline" class="active tab-pane animated fadeInDown streamline b-l p-v m-l-xs">
              @forelse ($user->log()->orderBy('created_at', 'DESC')->take(10)->get() as $log)
                <div>
                <a class="pull-left w-32 m-l-n m-t-xs m-r">
                  <img src="{{asset('images/avatar1.jpg')}}" class="img-responsive rounded" alt="...">
                </a>
                <div class="clear">
                  <div class="m-b-xs">
                    {{$log->title}}
                    <span class="text-muted block text-xs">
                      {{$log->created_at->diffForHumans()}}
                    </span>
                  </div>
                  <div class="m-b">
                    <div>{{ $log->details }}</div>
                    <div class="m-t-sm">
                      <a href class="text-muted m-xs">{{$log->ip}}</a>
                      <a href class="text-muted m-xs">{{$log->user_agent}}</a>
                    </div>
                  </div>
                </div>
              </div>
            @empty
              
            @endforelse
        </div>
        <div class="tab-pane animated fadeInDown streamline b-l p-v m-l-xs" id="feedback">
            <div style="min-height: 450px;">
                <div id="metrics-graph2" style="height:400px" ></div>
            </div>
            <div style="min-height: 450px;">
                <div id="metrics-graph" style="height:400px" ></div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
<script src="{{asset('js/chart.js')}}"></script>

<script type="text/javascript">
  var options = {
                    chart: {
                        renderTo: '',
                        type: 'column',
                        borderWidth:0
                    },
                    title: {
                        text: '',
                    },
                    xAxis: {
                        categories: []
                    },
                    yAxis: {
                        title: {
                            text: 'Ratting'
                        }
                    },
                    tooltip: {
                        formatter: function() {
                            return this.series.name +' Ratting for ' + this.x+ ' is <b>'+ ChartJS.numberFormat(this.y, 2)+' /35</b>'
                        }
                    },
                    legend: {
                        layout: 'horizontal',
                        borderWidth: 1,
                        shadow: true
                    },
                    credits: {
                        position: {
                            align: 'left',
                            x: 20
                        },
                        href: 'http://github.com/code-zone/survey-app',
                        text: 'Mobile Software Learnabiity Index'
                    },
                    series: []
                };
                options.chart.renderTo = 'metrics-graph'
                options.xAxis.categories = {!!json_encode($data['labels'])!!}
                options.series = {!!json_encode($data['series'])!!}
                chart = new ChartJS.Chart(options);
                options.chart.renderTo = 'metrics-graph2'
                options.xAxis.categories = {!!json_encode($data['labels'])!!}
                options.series = {!!json_encode($data['series2'])!!}
                chart = new ChartJS.Chart(options);
</script>
@endpush