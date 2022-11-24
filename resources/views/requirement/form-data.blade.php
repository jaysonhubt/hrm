@extends('adminlte::page')

@if(isset($requirement))
@section('title', 'HRM | Cập nhật cầu tuyển dụng')
@else 
@section('title', 'HRM | Tạo yêu cầu tuyển dụng')
@endif

@section('content_header')
    <h1 class="m-0 text-dark">{{ isset($requirement) ? 'Cập nhật' : 'Tạo' }} yêu cầu tuyển dụng</h1>
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ isset($requirement) ? 'Cập nhật' : 'Tạo' }} yêu cầu tuyển dụng</h3>
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
        @if(!isset($requirement))
        <form role="form" method="POST" action="{{ route('requirements.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-6 col-12">
                        <label for="position-input">Vị trí</label>
                        <input type="text" class="form-control" id="position-input" name="position" placeholder="" value="{{ old('position') }}" />
                    </div>
                    <div class="form-group col-sm-6 col-12">
                        <label for="quantity-input">Số lượng</label>
                        <input type="number" min="1" class="form-control" id="quantity-input" name="quantity" placeholder="" value="{{ old('quantity') }}" />
                    </div>
                </div>
                </div>
                @error('quantity-input')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @error('position-input')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group col-sm-12 col-12">
                    <label for="desc-input">Mô tả</label>
                    <textarea class="form-control" id="desc-input" name="description" placeholder="">{{ old('description') }}</textarea>
                </div>
                @error('desc-input')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group col-sm-12 col-12">
                    <label for="jd-input">JD</label>
                    <input type="file" class="form-control" id="jd-input" name="jd" placeholder=""/>
                </div>
                @error('jd-input')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group col-sm-12 col-12">
                    <label for="start-time-input">Thời Gian Bắt Đầu</label>
                    <div class="input-group date timepicker" id="start-time-input" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" name="start_time" data-target="#start-time-input" value="{{ old('start_time') }}"/>
                        <div class="input-group-append" data-target="#start-time-input" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                @error('start-time-input')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group col-sm-12 col-12">
                    <label for="end-time-input">Thời Gian Kết Thúc</label>
                    <div class="input-group date timepicker" id="end-time-input" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" name="end_time" data-target="#end-time-input" value="{{ old('end_time') }}"/>
                        <div class="input-group-append" data-target="#end-time-input" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                @error('end-time-input')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tạo</button>
            </div>
        </form>
        @else
        <form role="form" method="POST" action="{{ route('requirements.update', $requirement->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-6 col-12">
                        <label for="position-input">Vị trí</label>
                        <input type="text" class="form-control" id="position-input" name="position" placeholder="" value="{{ $requirement->position }}" />
                    </div>
                    <div class="form-group col-sm-6 col-12">
                        <label for="quantity-input">Số lượng</label>
                        <input type="number" min="1" class="form-control" id="quantity-input" name="quantity" placeholder="" value="{{ $requirement->quantity }}" />
                    </div>
                </div>
                </div>
                @error('quantity-input')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @error('position-input')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group  col-sm-12 col-12">
                    <label for="desc-input">Mô tả</label>
                    <textarea class="form-control" id="desc-input" name="description" placeholder="">{!! $requirement->description !!}</textarea>
                </div>
                @error('desc-input')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    @if($requirement->jd_url)
                        <div class="row">
                            <div class="col-sm-6 col-12">
                                <label for="jd-input">JD</label>
                                <input type="file" class="form-control" id="jd-input" name="jd" placeholder=""/>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="d-flex flex-column w-100 h-100">
                                    <label for="jd-link">Link JD</label>
                                    <a href="{{ asset($requirement->jd_url) }}" class="mt-2" id="jd-link">{{ $requirement->jd_url }}</a>
                                </div>
                            </div>
                        </div>
                    @else
                        <label for="jd-input">JD</label>
                        <input type="file" class="form-control" id="jd-input" name="jd" placeholder=""/>
                    @endif
                </div>
                @error('jd-input')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group  col-sm-12 col-12">
                    <label for="start-time-input">Thời Gian Bắt Đầu</label>
                    <div class="input-group date timepicker" id="start-time-input" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#start-time-input" name="start_time" value="{{ $requirement->start_time }}"/>
                        <div class="input-group-append" data-target="#start-time-input" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                @error('start-time-input')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group col-sm-12 col-12">
                    <label for="end-time-input">Thời Gian Kết Thúc</label>
                    <div class="input-group date timepicker" id="end-time-input" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#end-time-input" name="end_time" value="{{ $requirement->end_time }}"/>
                        <div class="input-group-append" data-target="#end-time-input" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                @error('end-time-input')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </form>
        @endif
    </div>
@stop

@section('js')
    <script type="text/javascript">
        $('.timepicker').datetimepicker({ icons: { time: 'far fa-clock' } });
    </script>
@stop
