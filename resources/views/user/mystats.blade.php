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
                    dataPoints: [
                        { label: "Boys", y: {{ $numOfBoys }}  },
                        { label: "Girls", y: {{ $numOfGirls }}  }
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
                    dataPoints: [
                            @foreach($coursePopularity as $course)
                        {
                            label: '{{ $course['name'] }}', y: {{ $course['students'] }}
                        },
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
                    dataPoints: [
                            @foreach($year as $course)
                        {
                            label: '{{ $course['year'] }}', y: {{ $course['number'] }}
                        },
                        @endforeach

                    ]
                }
            ]
        } );
        chart3.render();
    };



</script>
{{--
<script type="text/javascript">

    window.onload = function () {
        var chart2 = new CanvasJS.Chart( "course-popularity", {
            title: {
                text: "Course popularity"
            },
            data: [
                {
                    type: "pie",
                    dataPoints: [
                            @foreach($coursePopularity as $course)
                        {
                            label: '{{ $course['name'] }}', y: {{ $course['students'] }}
                        },
                        @endforeach

                    ]
                }
            ]
        } );
        chart2.render();
    };
</script>
--}}
