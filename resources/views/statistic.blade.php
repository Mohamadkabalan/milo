
@extends('layouts.master')

@section('seo')
@stop

@section('content-wrapper')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-6 box-section-wrapper">
                <div class="box-section">
                    <div class="box-section__head heading">
                        <h3>Statistics</h3>
                    </div>
                    <Statistic question="{{$question}}" :answers="{{$answers}}" :counters="{{ $counters  }}" ></Statistic>
                </div>
                <div class="text-center">
                </div>
            </div>
        </div>
    </div>

@stop
