@extends('adminlte::page')

@section('title', 'HRM | Danh Sách Bộ Câu Hỏi')

@section('content_header')
    <h1 class="m-0 text-dark">Bộ câu hỏi</h1>
@stop

@section('plugins.Datatables', true)

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Danh sách bộ câu hỏi</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="questions" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Câu hỏi</th>
                    <th>Đáp án</th>
                    <th>Ngôn ngữ</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($questions as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->question }}</td>
                        <td>{{ $item->answer }}</td>
                        <td>{{ $item->language ?? 'Không' }}</td>
                        <td>
                            {{-- <a href="{{ route('questions.show', $item->id) }}"
                               data-toggle="tooltip"
                               title="{{ trans('Chi tiết') }}"
                               class="btn btn-primary btn-sm">
                                <i class="fa fa-fw fa-search-plus"></i>
                            </a> --}}
                            <a href="{{ route('questions.edit', $item->id) }}"
                               data-toggle="tooltip"
                               title="{{ trans('Chỉnh sửa') }}"
                               class="btn btn-warning btn-sm">
                                <i class="fa fa-fw fa-edit"></i>
                            </a>
                            <form method="post"
                                  action="{{ route('questions.destroy', $item->id) }}"
                                  style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="button" data-toggle="tooltip"
                                        onclick="confirmSubmit(this.form, 'Xóa câu hỏi {{ $item->question }}')"
                                        title="{{ trans('Xóa') }}">
                                    <i class="fa fa-fw fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@stop

@section('js')
    <script>
        $(function () {
            $("#questions").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
        function confirmSubmit(form, title) {
            Swal.fire({
                title: title,
                text: "",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'OK',
                cancelButtonText: 'Hủy',
            }).then((result) => {
                if (result.value) {
                    form.submit();
                }
            })
        }
    </script>
@endsection
