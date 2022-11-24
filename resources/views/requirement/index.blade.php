@extends('adminlte::page')

@section('title', 'HRM | Yêu Cầu Tuyển Dụng')

@section('content_header')
    <h1 class="m-0 text-dark">Yêu cầu tuyển dụng</h1>
@stop

@section('plugins.Datatables', true)

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Yêu cầu tuyển dụng</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="requirements" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Vị trí</th>
                    <th>Mô tả</th>
                    <th>Số lượng</th>
                    <th>Tệp JD</th>
                    <th>Bắt đầu</th>
                    <th>Kết thúc</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($requirements as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->position }}</td>
                        <td>{!! $item->description !!}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>
                            <a href="{{ asset($item->jd_url) }}">
                                {{ $item->jd_url }}
                            </a>
                        </td>
                        <td>{{ $item->start_time }}</td>
                        <td>{{ $item->end_time }}</td>
                        <td>
                            {{-- <a href="{{ route('requirements.show', $item->id) }}"
                               data-toggle="tooltip"
                               title="{{ trans('Chi tiết') }}"
                               class="btn btn-primary btn-sm">
                                <i class="fa fa-fw fa-search-plus"></i>
                            </a> --}}
                            <a href="{{ route('requirements.edit', $item->id) }}"
                               data-toggle="tooltip"
                               title="{{ trans('Chỉnh sửa') }}"
                               class="btn btn-warning btn-sm">
                                <i class="fa fa-fw fa-edit"></i>
                            </a>
                            <form method="post"
                                  action="{{ route('requirements.destroy', $item->id) }}"
                                  style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="button" data-toggle="tooltip"
                                        onclick="confirmSubmit(this.form, 'Xóa yêu cầu {{ $item->name }}')"
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
            $("#requirements").DataTable({
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
