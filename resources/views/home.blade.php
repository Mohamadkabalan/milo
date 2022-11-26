@extends('layouts.master')

@section('seo')
@stop

@section('content-wrapper')
    <div class="sidebar__wrapper">
        @if($applied_before)
            <h3>You have already submited the survey</h3>
        @else
            <Survey :questions="{{ $questions }}"></Survey>
        @endif

    </div>

@stop