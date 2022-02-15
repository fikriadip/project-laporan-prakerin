@extends('template.master_admin')

@section('title_web')
Data Details Landing Page - Bimbel Primago
@endsection

@section('title_content')
Details
@endsection

@section('breadcrumbs')
<ul class="breadcrumbs">
    <li class="nav-home">
        <a href="{{ route('admin.dashboard') }}">
            <i class="flaticon-home"></i>
        </a>
    </li>
    <li class="separator">
        <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item">
        <a href="#">Data Details</a>
    </li>
    <li class="separator">
        <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item">
        <a href="#">Kelola Data Details</a>
    </li>
</ul>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-weight-bold">DataTable Home
                    <button type="button" data-toggle="modal" data-target="#ModalDetails"
                        class="btn btn-primary float-right text-white"><i class="fas fa-book mr-2"></i> TAMBAH DATA
                        DETAILS</button>
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tableDetails" class="display table table-striped table-bordered table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Judul</th>
                                <th>Subjudul</th>
                                <th>Penjelasan 1</th>
                                <th>Penjelasan 2</th>
                                <th>Penjelasan 3</th>
                                <th>Penjelasan 4</th>
                                <th>Paragraf</th>
                                <th>Image</th>
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
<div class="modal fade" id="ModalDetails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-primary font-weight-bold" id="exampleModalLabel">Tambah Data Details</h4>
                <button type="reset" class="close text-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 id="message" class="text-danger font-weight-bold"></h5>
                <form action="{{ route('add.details') }}" method="POST" id="add-details" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="judul">Masukkan Judul Details</label>
                        <input type="text" class="form-control" id="judul" name="judul">
                        <span class="text-danger error-text judul_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="subjudul">Masukkan Subjudul Details</label>
                        <input type="text" class="form-control" id="subjudul" name="subjudul">
                        <span class="text-danger error-text subjudul_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="penjelasan1">Masukkan Penjelasan Pertama</label>
                        <input type="text" class="form-control" id="penjelasan1" name="penjelasan1">
                        <span class="text-danger error-text penjelasan1_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="penjelasan2">Masukkan Penjelasan Kedua</label>
                        <input type="text" class="form-control" id="penjelasan2" name="penjelasan2">
                        <span class="text-danger error-text penjelasan2_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="penjelasan3">Masukkan Penjelasan Ketiga</label>
                        <input type="text" class="form-control" id="penjelasan3" name="penjelasan3">
                        <span class="text-danger error-text penjelasan3_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="penjelasan4">Masukkan Penjelasan Keempat</label>
                        <input type="text" class="form-control" id="penjelasan4" name="penjelasan4">
                        <span class="text-danger error-text penjelasan4_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="paragraf">Masukkan Paragraf</label>
                        <input type="text" class="form-control" id="paragraf" name="paragraf">
                        <span class="text-danger error-text paragraf_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="image">Masukkan Foto</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image" lang="es"
                                onchange="previewFile(this)">
                            <label class="custom-file-label" for="image">Pilih Foto</label>
                            <span class="text-danger error-text image_error"></span>
                        </div>
                        <img id="previewImg" style="max-width: 190px;" class="mt-3 shadow-sm">
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger" data-dismiss="modal"
                            id="btn_close">BATALKAN</button>
                        <button type="submit" id="saveBtn" class="btn btn-primary">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- @include('admin.home.edit') --}}

<!-- Edit Modal -->
<div class="modal fade editDetails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-primary font-weight-bold" id="exampleModalLabel">Edit Management Home</h4>
                <button type="reset" class="close text-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 id="message" class="text-danger font-weight-bold"></h5>
                <form action="{{ route('update.details') }}" method="POST" id="update-details" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="details_id">
                        <label for="judul">Edit Judul Details</label>
                        <input type="text" class="form-control" id="judul" name="judul">
                        <span class="text-danger error-text judul_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="subjudul">Edit Subjudul Details</label>
                        <input type="text" class="form-control" id="subjudul" name="subjudul">
                        <span class="text-danger error-text subjudul_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="penjelasan1">Edit Penjelasan Pertama</label>
                        <input type="text" class="form-control" id="penjelasan1" name="penjelasan1">
                        <span class="text-danger error-text penjelasan1_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="penjelasan2">Edit Penjelasan Kedua</label>
                        <input type="text" class="form-control" id="penjelasan2" name="penjelasan2">
                        <span class="text-danger error-text penjelasan2_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="penjelasan3">Edit Penjelasan Ketiga</label>
                        <input type="text" class="form-control" id="penjelasan3" name="penjelasan3">
                        <span class="text-danger error-text penjelasan3_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="penjelasan4">Edit Penjelasan Keempat</label>
                        <input type="text" class="form-control" id="penjelasan4" name="penjelasan4">
                        <span class="text-danger error-text penjelasan4_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="paragraf">Edit Paragraf</label>
                        <input type="text" class="form-control" id="paragraf" name="paragraf">
                        <span class="text-danger error-text paragraf_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="image">Edit Foto - Kosongkan Bila Sama</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image" lang="es"
                                onchange="previewFile(this)">
                            <label class="custom-file-label" for="image">Pilih Foto</label>
                            <span class="text-danger error-text image_error"></span>
                        </div>
                        <img id="previewImg" style="max-width: 190px;" class="mt-3 shadow-sm">
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger" data-dismiss="modal"
                            id="btn_close">BATALKAN</button>
                        <button type="submit" id="saveBtn" class="btn btn-primary">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $(document).ready(function () {
        var table = $('#tableDetails').DataTable({
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
                url: "{{ route('data.details.ajax') }}",
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
                    data: 'judul',
                    name: 'judul'
                },
                {
                    data: 'subjudul',
                    name: 'subjudul'
                },
                {
                    data: 'penjelasan1',
                    name: 'penjelasan1'
                },
                {
                    data: 'penjelasan2',
                    name: 'penjelasan2'
                },
                {
                    data: 'penjelasan3',
                    name: 'penjelasan3'
                },
                {
                    data: 'penjelasan4',
                    name: 'penjelasan4'
                },
                {
                    data: 'paragraf',
                    name: 'paragraf'
                },
                {
                    data: 'image',
                    name: 'image'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ],
        });
    });


    $(function () {
        $('#add-details').on('submit', function (e) {
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
                        $('#saveBtn').html('Simpan');
                    } else {
                        $(form)[0].reset();
                        Swal.fire({
                            icon: 'success',
                            title: data.status,
                            text: data.message,
                            timer: 1200
                        });
                        $('#tableDetails').DataTable().ajax.reload(null, false);
                        $('#ModalDetails').modal('hide');
                        $('#saveBtn').html('Simpan');
                    }
                }
            });
        });
    });

    $(document).on('click', '#editDetailsBtn', function () {
        var details_id = $(this).data('id');
        $('.editDetails').find('form')[0].reset();
        $('.editDetails').find('span.error-text').text('');
        $.post('{{ route("get.details.edit") }}', {
            details_id: details_id
        }, function (data) {
            $('.editDetails').find('input[name="details_id"]').val(data.details.id);
            $('.editDetails').find('input[name="judul"]').val(data.details
                .judul);
            $('.editDetails').find('input[name="subjudul"]').val(data.details
                .subjudul);
            $('.editDetails').find('input[name="penjelasan1"]').val(data.details
                .penjelasan1);
            $('.editDetails').find('input[name="penjelasan2"]').val(data.details
                .penjelasan2);
            $('.editDetails').find('input[name="penjelasan3"]').val(data.details
                .penjelasan3);
            $('.editDetails').find('input[name="penjelasan4"]').val(data.details
                .penjelasan4);
            $('.editDetails').find('input[name="paragraf"]').val(data.details
                .paragraf);
            $('.editDetails').modal('show');
        }, 'json');
    });

    $('#update-details').on('submit', function (e) {
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
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: data.status,
                        text: data.message,
                        timer: 1200
                    });
                    $('#tableDetails').DataTable().ajax.reload(null, false);
                    $('.editDetails').modal('hide');
                    $('.editDetails').find('form')[0].reset();
                }
            }
        });
    });

    $(document).on('click', '#deleteDetailsBtn', function () {
        var details_id = $(this).data('id');
        var url = '{{ route("delete.details") }}';

        Swal.fire({
            title: "Yakin Ingin Menghapus?",
            text: "Anda Akan Menghapus Data Home",
            icon: "warning",
            showCancelButton: true,
            showCloseButton: true,
            confirmButtonText: 'OK',
            cancelButtonText: 'BATAL',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
        }).then(function (result) {
            if (result.value) {
                $.post(url, {
                    details_id: details_id
                }, function (data) {
                    if (data.code == 1) {
                        $('#tableDetails').DataTable().ajax.reload(null,
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