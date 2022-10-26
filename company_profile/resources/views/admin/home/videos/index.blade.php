@extends('partial.master_admin')

@section('title_web')
Data Video Landing Page - PT Primago
@endsection

@section('dashboard')
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold"><i class="icon-control-play mr-2"></i> Video Landing Page</h2>
                <br>
            </div>
        </div>
    </div>
</div>

<div class="page-inner mt--5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title font-weight-bold">Data Video
                        <button type="button" data-toggle="modal" data-target="#ModalVideo"
                            class="btn btn-primary float-right btn-round text-white"><i class="fas fa-plus mr-2"></i>
                            TAMBAH DATA
                            VIDEO</button>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tableVideo" class="display table table-striped table-hover bg-light">
                            <thead>
                                <tr class="text-center text-primary">
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Link Video</th>
                                    <th>Foto</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="ModalVideo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="row">
                <div class="col-12">
                    <div class="card"
                        style="border: none; box-shadow: 0 1px 41px rgba(0, 0, 0, 12%); border-radius: 16px;">
                        <div class="text-center mb-2">
                            <h3 class="font-weight-bold mt-5">TAMBAH DATA VIDEO
                            </h3>
                        </div>
                        <div class="card-body mt-2">
                            <div class="modal-content">
                                <form action="{{ route('add.video') }}" method="POST" id="add-video"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="title" class="form-label h6 font-weight-bold">Masukkan Title
                                            Video</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-pen-square ml-1"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control input-custom" id="title"
                                                name="title">
                                        </div>
                                        <span class="text-danger error-text title_error"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="link_video" class="form-label h6 font-weight-bold">Masukkan Link
                                            Video</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-link ml-1"></i>
                                                </div>
                                            </div>
                                            <input type="text" id="link_video" class="form-control input-custom"
                                                name="link_video" />
                                        </div>
                                        <span class="text-danger error-text link_video_error"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="photo" class="form-label h6 font-weight-bold">Masukkan Thumbnail
                                            Video</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-image ml-1"></i>
                                                </div>
                                            </div>
                                            <input type="file" id="photo" class="form-control input-custom"
                                                name="photo" />
                                        </div>
                                        <span class="text-danger error-text photo_error"></span>
                                    </div>
                                    <center>
                                        <img id="previewImg" style="max-width: 270px;"
                                            class="img-fluid img-thumbnail shadow-sm">
                                    </center>

                                    <center>
                                        <button type="reset" id="btn-reset"
                                            class="btn btn-sm btn-reset text-white btn-block font-weight-bold mb-3 mt-4"
                                            style="font-size: 18px">BATALKAN</button>

                                        <button type="submit"
                                            class="btn btn-sm btn-save text-white btn-block font-weight-bold mb-3 mt-4"
                                            style="font-size: 18px" id="saveBtn">SIMPAN</button>
                                    </center>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade editVideo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="row">
                <div class="col-12">
                    <div class="card"
                        style="border: none; box-shadow: 0 1px 41px rgba(0, 0, 0, 12%); border-radius: 16px;">
                        <div class="text-center mb-2">
                            <h3 class="font-weight-bold mt-5">EDIT DATA VIDEO
                            </h3>
                        </div>
                        <div class="card-body mt-2">
                            <div class="modal-content">
                                <form action="{{ route('update.video') }}" method="POST" id="update-video"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="video_id">
                                    <div class="mb-3">
                                        <label for="title" class="form-label h6 font-weight-bold">Edit Title
                                            Video</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-pen-square ml-1"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control input-custom" id="title"
                                                name="title">
                                        </div>
                                        <span class="text-danger error-text title_error"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="link_video" class="form-label h6 font-weight-bold">Edit Link Video
                                            Hero</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-link ml-1"></i>
                                                </div>
                                            </div>
                                            <input type="text" id="link_video" class="form-control input-custom"
                                                name="link_video" />
                                        </div>
                                        <span class="text-danger error-text link_video_error"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="photo" class="form-label h6 font-weight-bold">Edit Thumbnail Video -
                                            Kosongkan
                                            Bila
                                            Sama</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-image ml-1"></i>
                                                </div>
                                            </div>
                                            <input type="file" id="photo" class="form-control input-custom"
                                                name="photo" />
                                        </div>
                                        <span class="text-danger error-text photo_error"></span>
                                    </div>

                                    <center>
                                        <button type="button"
                                            class="btn btn-sm btn-reset text-white btn-block font-weight-bold mb-3 mt-4"
                                            data-dismiss="modal" aria-label="Close"
                                            style="font-size: 18px">BATALKAN</button>

                                        <button type="submit"
                                            class="btn btn-sm btn-save text-white btn-block font-weight-bold mb-3 mt-4"
                                            style="font-size: 18px" id="saveBtn">SIMPAN</button>
                                    </center>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
    $(document).on('click', '#btn-reset', function () {
        $('#ModalVideo').modal('hide')
        $('#previewImg').remove();
        $('.error-text').hide();
    });

    $(document).on('click', '.btn-save', function () {
        $('.error-text').show();
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $(document).ready(function () {
        var table = $('#tableVideo').DataTable({
            destroy: true,
            searching: true,
            processing: true,
            serverSide: true,
            "responsive": true,
            "autoWidth": false,
            ajax: {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('data.video.ajax') }}",
                type: "get",
                data: function (data) {
                    data = '';
                    return data
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'link_video',
                    name: 'link_video'
                },
                {
                    data: 'photo',
                    name: 'photo'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ],
        });
    });


    $(function () {
        $('#add-video').on('submit', function (e) {
            e.preventDefault();
            var form = this;
            $('#saveBtn').html('Sedang Mengirim...');
            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                data: new FormData(form),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function () {
                    $(form).find('span.error-text').text('');
                },
                success: function (data) {
                    if (data.code == 0) {
                        $.each(data.error, function (prefix, val) {
                            $(form).find('span.' + prefix + '_error').text(val[0]);
                        });

                        $('#saveBtn').html('SIMPAN');
                    } else {
                        $(form)[0].reset();
                        Swal.fire({
                            icon: 'success',
                            title: data.status,
                            text: data.message,
                            timer: 1200
                        });
                        $('#tableVideo').DataTable().ajax.reload(null, false);
                        $('#ModalVideo').modal('hide');
                        $('#previewImg').remove();
                        $('#saveBtn').html('SIMPAN');
                    }
                }
            });
        });
    });

    $(document).on('click', '#editVideoBtn', function () {
        var video_id = $(this).data('id');
        $('.editVideo').find('form')[0].reset();
        $('.editVideo').find('span.error-text').text('');
        $.post('{{ route("get.video.edit") }}', {
            video_id: video_id
        }, function (data) {
            $('.editVideo').find('input[name="video_id"]').val(data.details.id);
            $('.editVideo').find('input[name="title"]').val(data.details
                .title);
            $('.editVideo').find('input[name="link_video"]').val(data.details
                .link_video);
            $('.editVideo').modal('show');
        }, 'json');
    });

    $('#update-video').on('submit', function (e) {
        e.preventDefault();
        var form = this;
        $.ajax({
            url: $(form).attr('action'),
            method: $(form).attr('method'),
            data: new FormData(form),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function () {
                $(form).find('span.error-text').text('');
            },
            success: function (data) {
                if (data.code == 0) {
                    $.each(data.error, function (prefix, val) {
                        $(form).find('span.' + prefix + '_error').text(val[
                            0]);
                    });

                    Swal.fire({
                        icon: 'error',
                        title: data.status,
                        text: data.message,
                        timer: 2200
                    });

                } else {
                    Swal.fire({
                        icon: 'success',
                        title: data.status,
                        text: data.message,
                        timer: 1200
                    });
                    $('#tableVideo').DataTable().ajax.reload(null, false);
                    $('.editVideo').modal('hide');
                    $('.editVideo').find('form')[0].reset();
                }
            }
        });
    });

    $(document).on('click', '#deleteVideoBtn', function () {
        var video_id = $(this).data('id');
        var url = '{{ route("delete.video") }}';

        Swal.fire({
            title: "Yakin Ingin Menghapus?",
            text: "Anda Akan Menghapus Data Video",
            icon: "warning",
            showCancelButton: true,
            showCloseButton: true,
            confirmButtonText: 'OK',
            cancelButtonText: 'BATAL',
            confirmButtonColor: '#ffa426',
            cancelButtonColor: '#d33',
        }).then(function (result) {
            if (result.value) {
                $.post(url, {
                    video_id: video_id
                }, function (data) {
                    if (data.code == 1) {
                        $('#tableVideo').DataTable().ajax.reload(null,
                            false);
                        Swal.fire({
                            icon: 'success',
                            title: data.status,
                            text: data.message,
                            timer: 1200
                        });
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: data.status,
                            text: data.message,
                            timer: 1200
                        });
                    }
                }, 'json');
            }
        });

    });
</script>
@endpush
@endsection