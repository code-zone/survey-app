@extends('layouts.master')

@section('content')
	<div class="card">
		<div class="card-heading">
			<span class="card-title">Metrics Graphs</span>
		</div>
		<div class="card-body">
			<div style="min-height: 450px;">
				<div id="metrics-graph" style="height:400px" ></div>
			</div>
            <hr>
            {{-- <div style="min-height: 450px;">

                <div id="metrics-graph2" style="height:400px" ></div>
			</div> --}}
            
		</div>
	</div>
    <div class"col-sm-12" style="min-height:550px !important;" >
    <div class="card">
        <div class="card-heading">
            <span class="card-title">Mobile Social Software Learnability Index Evaluation</span>
        </div>
        <div class="card-body row">
        @foreach($data['rates']['name'] as $key => $survey)
        <div class="col-md-4">
            <div class="panel no-border panel-primary">
                <div class="panel-heading">
                    <span class="font-bold">{{$survey}}</span>
                    @php
                    $per = $data['rates']['data'][$key] / 57.572 * 100;
                    $rate = ratting($per);
                    @endphp
                </div>
                <div class="panel-body">
                    <center>
                        <div ui-jp="easyPieChart" ui-options="{
                                percent: {{$per}},
                                lineWidth: 3,
                                trackColor: '#f1f2f3',
                                barColor: '{{$rate['bg']}}',
                                scaleColor: '#f1f2f3',
                                size: 160,
                                lineCap: 'butt'
                            }">
                            <div>
                                {{number_format($per)}}%
                            </div>
                        </div>
                    </center>
                    <div class="text-center">
                    <span class="text-{{$rate['color']}}"><strong>{{$rate['rate']}}</strong></span> 
                    </div>
                </div>
            </div>
        </div>
        @endforeach
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
                            return this.x+' Ratting for ' + this.series.name + ' is <b>'+ ChartJS.numberFormat(this.y, 2)+'</b>'
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
                //options.series = {!! json_encode($data['series2']) !!}
                //options.legend.enabled = false
               // options.title.text = 'Mobile Social Software Learnability Index Evaluation'
               // chart = new ChartJS.Chart(options);
</script>
@endpush
