
@extends('layouts.master')

@section('seo')
@stop

@section('content-wrapper')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-9 box-section-wrapper">
                <div class="row justify-content-center">
                    <question :data="{{$question}}"></question>
                </div>
            </div>
        </div>
    </div>
@endsection

