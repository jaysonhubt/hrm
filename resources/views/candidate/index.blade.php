@extends('adminlte::page')

@section('title', 'HRM | Danh sách ứng viên')

@section('content_header')
    <h1 class="m-0 text-dark">Danh sách ứng viên</h1>
@stop

@section('plugins.Datatables', true)

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Danh sách ứng viên</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="candidates" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Thông tin chung</th>
                    <th>Dob</th>
                    <th>Tệp CV</th>
                    <th>Kinh nghiệm</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($candidates as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                            <b>Tên ứng viên:</b> {{ $item->name }} <br>
                            <b>Email:</b> {{ $item->email }} <br>
                            <b>Số điện thoại:</b> {{ $item->phone_number }} <br>
                            <b>Địa chỉ:</b> {{ $item->address }}
                        </td>
                        <td>{{ $item->dob }}</td>
                        <td>
                            <a href="{{ asset($item->cv_url) }}">{{ $item->cv_url }}</a>
                        </td>
                        <td>{!! $item->experience !!}</td>
                        <td>
                            {{-- <a href="{{ route('requirements.show', $item->id) }}"
                               data-toggle="tooltip"
                               title="{{ trans('Chi tiết') }}"
                               class="btn btn-primary btn-sm">
                                <i class="fa fa-fw fa-search-plus"></i>
                            </a> --}}
                            <a href="{{ route('candidates.edit', $item->id) }}"
                               data-toggle="tooltip"
                               title="{{ trans('Chỉnh sửa') }}"
                               class="btn btn-warning btn-sm">
                                <i class="fa fa-fw fa-edit"></i>
                            </a>
                            <form method="post"
                                  action="{{ route('candidates.destroy', $item->id) }}"
                                  style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="button" data-toggle="tooltip"
                                        onclick="confirmSubmit(this.form, 'Xóa ứng viên {{ $item->name }}')"
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
            $("#candidates").DataTable({
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
