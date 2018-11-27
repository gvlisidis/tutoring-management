@extends('layouts.app')

@section('content')
    <div class="container-fluid>">
        <div class="row">
            <div class="col-xs-12 col-md-4">
                <div id="gender"></div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div id="course-popularity" class="pull-left"></div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div id="per-class" class="pull-left"></div>
            </div>
        </div>
    </div>
@endsection
<script type="text/javascript">
    window.onload = function () {
        var chart1 = new CanvasJS.Chart( "gender", {
            title: {
                text: "Gender"
            },
            data: [
                {
                    type: "pie",
                    indexLabelPlacement: "inside",
                    toolTipContent: "<b>{label}</b>: {y} <b>({percentage}%)</b>",
                    indexLabel: "{label} ({y}%)",
                    indexLabelFontSize: 21,
                    dataPoints: [
                        @if($numOfBoys)
                        {
                            label: "Boys", y: {{ $numOfBoys }}  },
                        @endif
                        @if($numOfGirls)
                        {
                            label: "Girls", y: {{ $numOfGirls }}  }
                        @endif
                    ]
                }
            ]
        } );

        chart1.render();

        var chart2 = new CanvasJS.Chart( "course-popularity", {
            title: {
                text: "Course popularity"
            },
            data: [
                {
                    type: "pie",
                    indexLabelPlacement: "inside",
                    toolTipContent: "{y} - #percent %",
                    indexLabel: "{label} ({y}%)",
                    indexLabelFontSize: 11,
                    dataPoints: [

                            @foreach($coursePopularity as $course)
                            @if($course['students'])
                        {
                            label: '{{ $course['name'] }}', y: {{ $course['students'] }}
                        },
                        @endif
                        @endforeach
                    ]
                }
            ]
        } );
        chart2.render();

        var chart3 = new CanvasJS.Chart( "per-class", {
            title: {
                text: "Class popularity"
            },
            data: [
                {
                    type: "pie",
                    indexLabelPlacement: "inside",
                    toolTipContent: "{y} - #percent %",
                    indexLabel: "{label} ({y}%)",
                    indexLabelFontSize: 22,
                    dataPoints: [
                            @foreach($year as $course)
                            @if($course['number'])
                        {
                            label: '{{ $course['year'] }}', y: {{ $course['number'] }}
                        },
                        @endif
                        @endforeach

                    ]
                }
            ]
        } );
        chart3.render();
    };
</script>
