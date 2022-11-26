
@extends('layouts.master')

@section('seo')
@stop

@section('content-wrapper')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-6 box-section-wrapper">
                <div class="box-section">
                    <div class="box-section__head heading">
                        <h3>Sign In</h3>
                    </div>
                    <Login></Login>
                </div>
                <div class="text-center">
                    <p>New to Survey?</p>
                    <a href="/users/register" class="btn btn-outline-primary">Create an account</a>
                </div>
            </div>
        </div>
    </div>

@stop
