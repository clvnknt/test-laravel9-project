@extends('layouts.app')

@section('header_content')
<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

    // Load the Visualization API and the corechart package.
    google.charts.load('current', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);

    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Organization Type');
        data.addColumn('number', 'Size');
        data.addRows([
            @foreach($data as $item)
            ["{{ $item->type }}", {{ $item->type_size }}],
            @endforeach
        ]);

        // Set chart options
        var options = {'title':'Types of Organization',
                        'width':400,
                        'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('org_types_pie'));
        chart.draw(data, options);
    }
</script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">WELCOME</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <h1>Organization Types Pie Chart</h1>
                    <div id="org_types_pie"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer_content')
<hr />
<h6>Angeles University Foundation 2022</h6>
@endsection