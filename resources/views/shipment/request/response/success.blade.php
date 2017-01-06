@extends('layouts.app')

@section('title', trans('request.response_title'))

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('request.response_title') }}
                    </div>

                    <div class="panel-body">
                        {{ trans('request.responded') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
