
@extends('layouts.master')

@section('seo')
@stop

@section('content-wrapper')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-9 box-section-wrapper">
                <div class="row justify-content-center">
                    <div class="col-sm-8 pt-5">
                        <h1 class="">List of Questions</h1>
                        <div class="list-group my-5">
                            @foreach($questions as $key=> $question)
                                <a class="list-group-item list-group-item-action" href="/users/statistic/{{$question['id']}}" target="_blank"><b>{{ $key + 1 }}.</b>{{$question['question']}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="text-center">
                </div>
            </div>
        </div>
    </div>

@stop
