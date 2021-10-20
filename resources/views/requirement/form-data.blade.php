@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Requirement Form</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">@if(isset($requirement)) Requirement Form Edit! @else Requirement Create From! @endif</p>
                </div>
            </div>
        </div>
    </div>
@stop
