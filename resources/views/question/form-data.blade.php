@extends('adminlte::page')

@if(isset($question))
@section('title', 'HRM | Cập Nhật Câu Hỏi')
@else 
@section('title', 'HRM | Tạo Câu Hỏi')
@endif

@section('content_header')
    <h1 class="m-0 text-dark">{{ isset($question) ? 'Cập nhật' : 'Tạo' }} câu hỏi</h1>
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ isset($question) ? 'Cập nhật' : 'Tạo' }} câu hỏi</h3>
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
        @if(!isset($question))
        <form role="form" method="POST" action="{{ route('questions.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="question-input">Câu hỏi</label>
                    <textarea class="form-control" id="question-input" name="question" placeholder="" required>{{ old('question') }}</textarea>
                </div>
                @error('question-input')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="answer-input">Tham khảo</label>
                    <textarea class="form-control" id="answer-input" name="answer" placeholder="" required>{{ old('answer') }}</textarea>
                </div>
                @error('answer-input')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="language-input">Ngôn ngữ lập trình</label>
                    <select name="language" id="language-input" class="form-control select2bs4" style="width: 100%;">
                        <option></option>
                        @foreach (Config::get('codelangs') as $lang => $language).
                            <option value="{{ $language }}">{{ $language }}</option>
                        @endforeach
                    </select>
                </div>
                @error('language-input')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tạo</button>
            </div>
        </form>
        @else
        <form role="form" method="POST" action="{{ route('questions.update', $question->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="question-input">Câu hỏi</label>
                    <textarea class="form-control" id="question-input" name="question" placeholder="" required>{{ $question->question }}</textarea>
                </div>
                @error('question-input')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="answer-input">Tham khảo</label>
                    <textarea class="form-control" id="answer-input" name="answer" placeholder="" required>{{ $question->answer }}</textarea>
                </div>
                @error('answer-input')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="language-input">Ngôn ngữ lập trình</label>
                    <select name="language" id="language-input" class="form-control select2bs4" style="width: 100%;">
                        <option></option>
                        @foreach (Config::get('codelangs') as $lang => $language).
                            <option value="{{ $language }}" {{ $question->language === $language ? 'selected' : '' }}>{{ $language }}</option>
                        @endforeach
                    </select>
                </div>
                @error('language-input')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">{{ isset($question) ? 'Cập nhật' : 'Tạo' }}</button>
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
