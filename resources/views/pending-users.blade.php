@extends('layouts.master')

@section('seo')
@stop

@section('content-wrapper')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-9 col-lg-9 box-section-wrapper">
        <div class="row justify-content-center">
          <div class="col-sm-8 pt-5">
            <h3 class="">List of Registered Users that Didn't Submit The Survey</h3>
            <div class="list-group my-5">
              @foreach($pendingUsers as $key=> $user)
                <a class="list-group-item list-group-item-action" href="javascript:;"><b>{{ $key + 1 }}.</b>{{$user['name']}}</a>
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