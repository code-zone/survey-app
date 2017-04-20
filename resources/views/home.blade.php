@extends('layouts.master')

@section('content')
	<div class="card">
		<div class="card-heading">
			<span class="card-title">Metrics Graphs</span>
		</div>
		<div class="card-body">
			<div id="graph" style="min-height: 450px;">
				<div id="metrics-graph" style="height:400px" ></div>
			</div>
		</div>
	</div>
@endsection
@push('scripts')
<script src="{{asset('js/chart.js')}}"></script>

<script type="text/javascript">
  var options = {
                    chart: {
                        renderTo: 'metrics-graph',
                        type: 'spline',
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
                        return 'Ratting for ' + this.x + ' is <b>'+ this.y+'</b>'
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
                                Highcharts.numberFormat(this.y, 0);
                                },
                                x: 10,
                                style: {
                                fontWeight: 'bold'
                                }
                            }

                        }
                    },
                    legend: {
                        layout: 'vertical',
                        borderWidth: 1,
                        shadow: true
                    },
                    series: []
                };
                options.xAxis.categories = {!!json_encode($data['labels'])!!}
                options.series = {!!json_encode($data['series'])!!}
                chart = new ChartJS.Chart(options);
</script>
@endpush
