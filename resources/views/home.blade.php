@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    <h2>Calificacion del día</h2>
                    <img width="700" src="https://quickchart.io/chart?c=%7B%0A%20%20type%3A%20%27radialGauge%27%2C%0A%20%20data%3A%20%7B%0A%20%20%20%20datasets%3A%20%5B%7B%0A%20%20%20%20%20%20data%3A%20%5B{{$cali}}%5D%2C%0A%20%20%20%20%20%20backgroundColor%3A%20getGradientFillHelper(%27horizontal%27%2C%20%5B%27red%27%2C%20%27blue%27%5D)%2C%0A%20%20%20%20%7D%5D%0A%20%20%7D%2C%0A%20%20options%3A%20%7B%0A%20%20%20%20%2F%2F%20See%20https%3A%2F%2Fgithub.com%2Fpandameister%2Fchartjs-chart-radial-gauge%23options%0A%20%20%20%20domain%3A%20%5B0%2C%20100%5D%2C%0A%20%20%20%20trackColor%3A%20%27%23f0f8ff%27%2C%20%0A%20%20%20%20centerPercentage%3A%2090%2C%0A%20%20%20%20centerArea%3A%20%7B%0A%20%20%20%20%20%20text%3A%20(val)%20%3D%3E%20val%20%2B%20%27%25%27%2C%0A%20%20%20%20%7D%2C%0A%20%20%7D%0A%7D" alt="">
                    <h2>¿Tuviste un buen día?</h2>
                    <img width="700" src="https://quickchart.io/chart?bkg=white&c={type:%27bar%27,data:{labels:['Si','No'],datasets:[{label:%27¿Tuviste un buen dia?%27,data:{{$buenDia}}}]}}" alt="">
                    <h2>¿Te sientes Feliz con lo que lograste el día de Hoy?</h2>
                    <img  width="700" src="https://quickchart.io/chart?c={type:'pie',data:{labels:['Si','No'], datasets:[{data:{{$feliz}}}]}}">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
