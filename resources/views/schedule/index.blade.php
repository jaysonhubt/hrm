@extends('adminlte::page')

@section('title', 'HRM | Danh Sách Lịch Phỏng Vấn')

@section('content_header')
    <h1 class="m-0 text-dark">Lịch Phỏng Vấn</h1>
@stop

@section('plugins.Datatables', true)

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Danh Sách Lịch Phỏng Vấn</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="schedules" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Ứng Viên</th>
                    <th>Nguời Phỏng Vấn</th>
                    <th>Ngày Bắt Đầu</th>
                    <th>Ngày Kết Thúc</th>
                    <th>Loại</th>
                    <th>Link Meeting</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($result as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                            <a href="{{ route('candidates.show', $item->id) }}">
                                {{ $item->candidate->name }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('users.show', $item->id) }}">
                                {{ $item->user->name }}
                            </a>
                        </td>
                        <td>{{ $item->start_time }}</td>
                        <td>{{ $item->end_time }}</td>
                        <td>{{ $item->type }}</td>
                        <td>{{ $item->link_meeting }}</td>
                        <td>
                            <a href="{{ route('schedules.show', $item->id) }}"
                               data-toggle="tooltip"
                               title="{{ trans('Chi tiết') }}"
                               class="btn btn-primary btn-sm">
                                <i class="fa fa-fw fa-search-plus"></i>
                            </a>
                            <a href="{{ route('schedules.edit', $item->id) }}"
                               data-toggle="tooltip"
                               title="{{ trans('Chỉnh sửa') }}"
                               class="btn btn-warning btn-sm">
                                <i class="fa fa-fw fa-edit"></i>
                            </a>
                            <form method="post"
                                  action="{{ route('schedules.destroy', $item->id) }}"
                                  style="display: inline">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger btn-sm" type="button" data-toggle="tooltip"
                                        onclick="confirmSubmit(this.form, 'Xóa category {{ $item->name }}')"
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
            $("#schedules").DataTable({
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
