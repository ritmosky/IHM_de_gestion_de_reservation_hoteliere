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
              	<div id="graphReservation" style="height: 300px; width: 500px;" ></div>
              </div>
        </div>
        <div>
        @if (!is_null($dataArrive))
            <center><h2> Arrive </h2></center>
            <table class="table table-striped table-hover">
              <thead>
                  <tr class="table-active">
                      @foreach ($columns as $column)
                          <th>{{ $column['title'] }}</th>
                      @endforeach
                        <th> {{trans("general.check_in_update")}}</th>
                  </tr>
              </thead>

              <tbody>
              @foreach ($dataArrive as $data)
                  <tr>
                      @foreach ($columns as $column)
                          <td>{!! $column['value']($data) !!}</td>
                      @endforeach
                  </tr>
                  {!! Form::open(['url' => route($routeName.'.checkIn', $data->id), 'class' => 'form-horizontal']) !!}
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">@lang('general.check_in')</button>
                    </div>
                  {!! Form::close() !!}
              @endforeach
              </tbody>
            </table>
          @endif
          @if (!is_null($dataDepart))
          <center><h2> Depart </h2></center>
            <table class="table table-striped table-hover">
              <thead>
                  <tr class="table-active">
                      @foreach ($columns as $column)
                          <th>{{ $column['title'] }}</th>
                      @endforeach
                          <th> {{trans("general.check_out_update")}}</th>
                  </tr>
              </thead>

              <tbody>
              @foreach ($dataDepart as $data)
                  <tr>
                      @foreach ($columns as $column)
                          <td>{!! $column['value']($data) !!}</td>
                      @endforeach
                      <td>
                      {!! Form::open(['url' => route($routeName.'.checkIn', $data->id), 'class' => 'form-horizontal']) !!}
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">@lang('general.check_out')</button>
                        </div>
                      {!! Form::close() !!}
                      </td>
                  </tr>
              @endforeach
              </tbody>
            </table>
          @endif
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
              @foreach ($dataReservationPrevision as $data) // On parcourt les catégories
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
