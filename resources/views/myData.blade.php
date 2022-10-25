@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                <img src="https://quickchart.io/chart?bkg=white&c={type:%27bar%27,data:{labels:[2012,2013,2024,2015,2016],datasets:[{label:%27Users%27,data:[120,60,50,180,120]}]}}" alt="">

                    {{ __('Logueado') }}
                </div>
            </div>
        </div>
    </div>
   
</div>

@endsection
