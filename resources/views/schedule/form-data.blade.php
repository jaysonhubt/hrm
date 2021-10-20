@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Schedules</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">@if(isset($schedule)) Schedule Form Edit! @else Schedule Form Create! @endif</p>
                </div>
            </div>
        </div>
    </div>
@stop
