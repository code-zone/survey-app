@extends('layouts.master')

@section('content')
	<div class="card">
		<div class="card-heading">
			<span class="card-title"></span>
		</div>
		<div class="card-body">
            <form class="form-inline">
                <div class="col-sm-8">
                    <div class="form-group {{ $errors->has('age') ? ' has-error' : '' }}">
                                        <label class="sr-only" for="password">Age</label>
                                        <select name="age" class="select2">
                                            <optgroup label="Age Ranges">
                                                <option value="">All Ages</option>
                                                <option {{request('age') == 10 ? 'selected': ''}} value="10">Below 20 Years</option>
                                                <option {{request('age') == 20 ? 'selected': ''}} value="20">21 to 40 Years</option>
                                                <option {{request('age') == 40 ? 'selected': ''}} value="40">41 to 60 Years</option>
                                                <option {{request('age') == 60 ? 'selected': ''}} value="60">60+ Years</option>   
                                            </optgroup>
                                        </select>
                                         {!! $errors->first('age', '<span class="help-block">:message</span>') !!}
                                    </div>
                </div>
                <div class="col-sm4">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </form>
            @if(!request('age'))
			<div style="min-height: 450px;">
				<div id="metrics-graph3" style="height:400px" ></div>
			</div>
            @endif
            <hr>
            <div style="min-height: 450px;">

                <div id="metrics-graph" style="height:400px" ></div>
			</div>
            <div style="min-height: 450px;">
                <div id="metrics-graph2" style="height:400px" ></div>
			</div>
            
		</div>
	</div>
    <div class"row">
    @foreach($data['rates']['name'] as $key => $survey)
     <div class="col-md-4">
        <div class="panel no-border panel-primary">
            <div class="panel-heading">
                <span class="font-bold">{{$survey}}</span>
                @php
                   $per = $data['rates']['data'][$key];
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
@endsection
@push('scripts')
<script src="{{asset('js/chart.js')}}"></script>

<script type="text/javascript">
var myTheme = {}
myTheme.colors = ["#3345a8", "#3fa343", "#078bf4", "#ecb100", "#f92718"]
myTheme.chart = {
                    backgroundColor: '#fff'
                };
myTheme.title = {
                    style: {
                        fontSize: '20px',
                        fontFamily: '"Georgia", "Verdana", sans-serif',
                        fontWeight: 'bold',
                        color: '#000000'
                    }
}
  var options = {
                    chart: {
                        renderTo: '',
                        type: 'column',
                        options3d:{}
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
                options.title.text = 'Overall Learnabilty based on Software\'s Metrics'
                options.chart.renderTo = 'metrics-graph'
                options.xAxis.categories = {!!json_encode($data['labels'])!!}
                options.series = {!!json_encode($data['series'])!!}
                chart = new ChartJS.Chart(options);
                ChartJS.setOptions(myTheme)
                @if(! request('age'))
                tooltip = {
                        formatter: function() {
                            return this.x+' Ratting for ' + this.series.name + ' is <b>'+ ChartJS.numberFormat(this.y, 2)+' %</b>'
                        }
                    }
                options.title.text = 'Distribution based on Age groups'
                options.tooltip = tooltip
                options.chart.renderTo = 'metrics-graph3'
                options.chart.type = 'bar'
                options.xAxis.categories = {!!json_encode($data['agelabels'])!!}
                options.series = {!!json_encode($data['series3'])!!}
                @endif
                chart = new ChartJS.Chart(options);

                tooltip = {
                        formatter: function() {
                            return 'Ratting for ' + this.point.name + ' is <b>'+ ChartJS.numberFormat(this.y, 2)+' %</b>'
                        }
                    }
                options.tooltip = tooltip
                options.chart.renderTo = 'metrics-graph2'
                options.series = {!! json_encode($data['series2']) !!}
                options.legend.enabled = false
                options.title.text = 'Mobile Social Software Learnability Index Evaluation'
                chart = new ChartJS.Chart(options);
</script>
        <script>
           $('.select2').select2()
        </script>
    @endpush
