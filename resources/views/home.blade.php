@extends('layouts.master')

@section('content')
	<div class="card">
		<div class="card-heading">
			<span class="card-title">Metrics Graphs</span>
		</div>
		<div class="card-body">
			<div id="graph" style="min-height: 450px;">
				<div id="metrics-graph" style="height:400px" ></div>
                <div id="metrics-graph2" style="height:400px" ></div>
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
                        text: 'Mobile Social Software Learnability Index Evaluation',
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
                    plotOptions: {
                            column: {
                                depth: 25,
                                colorByPoint: true,
                                dataLabels: {
                                enabled: true,
                                rotation: -90,
                                y: 25,
                                color: '#268d69',
                                formatter: function() {
                                return
                                ChartJS.numberFormat(this.y, 0);
                                },
                                x: 10,
                                style: {
                                fontWeight: 'bold'
                                }
                            }

                        }
                    },
                    legend: {
                        layout: 'horizontal',
                        borderWidth: 1,
                        shadow: true
                    },
                    series: []
                };
                options.chart.renderTo = 'metrics-graph'
                options.xAxis.categories = {!!json_encode($data['labels'])!!}
                options.series = {!!json_encode($data['series'])!!}
                chart = new ChartJS.Chart(options);
                options.chart.renderTo = 'metrics-graph2'
                options.series = {!!json_encode($data['series2'])!!}
                chart = new ChartJS.Chart(options);
</script>
@endpush
