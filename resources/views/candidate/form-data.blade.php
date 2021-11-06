@extends('adminlte::page')

@if(isset($candidate))
@section('title', 'HRM | Cập nhật thông tin ứng viên')
@else 
@section('title', 'HRM | Thêm thông tin ứng viên')
@endif

@section('content_header')
    <h1 class="m-0 text-dark">{{ isset($candidate) ? 'Cập nhật' : 'Thêm' }} thông tin ứng viên</h1>
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ isset($candidate) ? 'Cập nhật' : 'Thêm' }} thông tin ứng viên</h3>
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
        @if(!isset($candidate))
        <form role="form" method="POST" action="{{ route('candidates.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name-input">Tên ứng viên</label>
                    <input type="text" class="form-control" id="name-input" name="name" placeholder="" value="{{ old('name') }}" required/>
                </div>
                @error('name-input')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="email-input">Email</label>
                    <input type="text" class="form-control" id="email-input" name="email" placeholder="" value="{{ old('email') }}" required/>
                </div>
                @error('email-input')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="phone-input">Số điện thoại</label>
                    <input type="text" class="form-control" id="phone-input" name="phone_number" placeholder="" value="{{ old('phone_number') }}" required/>
                </div>
                @error('phone-input')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="address-input">Địa chỉ</label>
                    <input type="text" class="form-control" id="address-input" name="address" placeholder="" value="{{ old('address') }}" />
                </div>
                @error('address-input')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="dob-input">DOB</label>
                    <div class="input-group date timepicker" id="dob-input" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#dob-input" name="dob" placeholder="" value="{{ old('dob') }}" required/>
                        <div class="input-group-append" data-target="#dob-input" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                @error('dob-input')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="experience-input">Kinh nghiệm</label>
                    <textarea class="form-control" id="experience-input" name="experience" placeholder="">{{ old('experience') }}</textarea>
                </div>
                @error('experience-input')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="cv-input">CV</label>
                    <input type="file" class="form-control" id="cv-input" name="cv" placeholder=""/>
                </div>
                @error('cv-input')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
        </form>
        @else
        <form role="form" method="POST" action="{{ route('candidates.update', $candidate->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="name-input">Tên ứng viên</label>
                    <input type="text" class="form-control" id="name-input" name="name" placeholder="" value="{{ $candidate->name }}" required/>
                </div>
                @error('name-input')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="email-input">Email</label>
                    <input type="text" class="form-control" id="email-input" name="email" placeholder="" value="{{ $candidate->email }}" required/>
                </div>
                @error('email-input')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="phone-input">Số điện thoại</label>
                    <input type="text" class="form-control" id="phone-input" name="phone_number" placeholder="" value="{{ $candidate->phone_number }}" required/>
                </div>
                @error('phone-input')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="address-input">Địa chỉ</label>
                    <input type="text" class="form-control" id="address-input" name="address" placeholder="" value="{{ $candidate->address }}" />
                </div>
                @error('address-input')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="dob-input">DOB</label>
                    <div class="input-group date timepicker" id="dob-input" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#dob-input" name="dob" placeholder="" value="{{ $candidate->dob }}" required/>
                        <div class="input-group-append" data-target="#dob-input" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                @error('dob-input')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="experience-input">Kinh nghiệm</label>
                    <textarea class="form-control" id="experience-input" name="experience" placeholder="">{!! $candidate->experience !!}</textarea>
                </div>
                @error('experience-input')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    @if($candidate->cv_url)
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <label for="cv-input">CV</label>
                            <input type="file" class="form-control" id="cv-input" name="cv" placeholder=""/>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="d-flex flex-column w-100 h-100">
                                <label for="cv-link">Link CV</label>
                                <a href="{{ asset($candidate->cv_url) }}" class="mt-2" id="cv-link">{{ $candidate->cv_url }}</a>
                            </div>
                        </div>
                    </div>
                    @else
                    <label for="cv-input">CV</label>
                    <input type="file" class="form-control" id="cv-input" name="cv" placeholder=""/>
                    @endif
                </div>
                @error('cv-input')
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
