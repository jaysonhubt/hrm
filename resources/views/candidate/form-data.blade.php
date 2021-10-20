@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Candidate Form</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">@if(isset($candidate)) Candidate Form Edit! @else Candidate Create From! @endif</p>
                </div>
            </div>
        </div>
    </div>
@stop
