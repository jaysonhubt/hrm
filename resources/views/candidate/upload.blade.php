@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Form upload CV của ứng viên </h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div id="dropzone">
                        <form class="dropzone needsclick" id="demo-upload" action="/upload"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="dz-message needsclick">
                                Gửi cv vào đây để upload nào.<br />
                                <span class="note needsclick">Vui lòng không tải file nặng quá bạn nhé.</span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
<style>
    .dropzone {
        background: white;
        border-radius: 5px;
        border: 2px dashed rgb(0, 135, 247);
        border-image: none;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }
</style>

<script type="text/javascript">
    window.onload = function() {
        Dropzone.autoDiscover = false;
        Dropzone.options.dropzone =
            {
                autoProcessQueue: false,
                maxFilesize: 10,
                renameFile: function (file) {
                    var dt = new Date();
                    var time = dt.getTime();
                    return time + file.name;
                },
                acceptedFiles: ".pdf",
                addRemoveLinks: true,
                timeout: 60000,
                success: function (file, response) {
                    console.log(response);
                },
                error: function (file, response) {
                    console.log(response)
                }
            };
    }

</script>
