@extends('adminlte::page')

@section('title', 'HRM | Tạo Lịch Phỏng Vấn')

@section('content_header')
    <h1 class="m-0 text-dark">Tạo Lịch Phỏng Vấn</h1>
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tạo Lịch Phỏng Vấn</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form role="form" method="POST" action="{{ route('schedules.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="candidate_id">Tên Ứng Viên</label>
                    <select name="candidate_id" id="" class="form-control select2bs4" style="width: 100%;">
                        <option value="">Tên Ứng Viên</option>
                        @foreach($candidates as $candidate)
                            <option value="{{ $candidate->id }}">{{ $candidate->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('candidate_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="user_id">Nguời Phỏng Vấn</label>
                    <select name="user_id" id="" class="form-control select2bs4" style="width: 100%;">
                        <option value="">Nguời Phỏng Vấn</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('user_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label>Thời Gian Bắt Đầu</label>
                    <div class="input-group date timepicker" id="reservationdatetime" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime"/>
                        <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                @error('user_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label>Thời Gian Kết Thúc</label>
                    <div class="input-group date timepicker" id="reservationdatetime" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime"/>
                        <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                @error('user_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="names">Link Meeting</label>
                    <input type="text" class="form-control" id="names" name="names" placeholder="Link Meeting">
                </div>
                @error('names')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tạo</button>
            </div>
        </form>
    </div>
@stop

@section('js')
    <script type="text/javascript">
        $('.timepicker').datetimepicker({ icons: { time: 'far fa-clock' } });
    </script>
@stop
