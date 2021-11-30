@extends('layouts.app')

@section('content')
<div class ="container">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card">
                <center><h1> @lang('navigation.hello') {{ Auth::user()->name }} </h1></center>
                <div class="container">
              	<!-- L'élément "#mon-chart" où placer le chart -->
              	<div id="graphReservation" style="height: 900px; width: 500px;" ></div>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data =  google.visualization.arrayToDataTable([
              ['Date', 'Chambres reservées'],
              @foreach ($dataset as $data) // On parcourt les catégories
              [ "{{ $data[0] }}", {{ $data[1] }} ], // Proportion des produits de la catégorie
              @endforeach
            ]);

    var options = {

      width: 450,
      height: 250,
      legend: { position: 'bottom' }
    };
    console.log(data);

    var chart = new google.visualization.LineChart(document.getElementById('graphReservation'));

    chart.draw(data, options);
  }
</script>

@endsection
