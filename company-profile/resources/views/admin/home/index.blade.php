@extends('template.master_admin')

@section('title_web')
Data Home Landing Page - Bimbel Primago
@endsection

@section('title_content')
Home
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
        <a href="#">Data Home</a>
    </li>
    <li class="separator">
        <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item">
        <a href="#">Kelola Data Home</a>
    </li>
</ul>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-weight-bold">DataTable Home
                    <button type="button" data-toggle="modal" data-target="#ModalHome"
                        class="btn btn-primary float-right text-white"><i class="fas fa-book mr-2"></i> TAMBAH DATA
                        HOME</button>
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tableHome" class="display table table-striped table-bordered table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Judul</th>
                                <th>Subjudul</th>
                                <th>Deskripsi</th>
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
<div class="modal fade" id="ModalHome" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-primary font-weight-bold" id="exampleModalLabel">Tambah Data Home</h4>
                <button type="reset" class="close text-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 id="message" class="text-danger font-weight-bold"></h5>
                <form action="{{ route('add.home') }}" method="POST" id="add-home" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="judul">Masukkan Judul Home</label>
                        <input type="text" class="form-control" id="judul" name="judul">
                        <span class="text-danger error-text judul_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="subjudul">Masukkan Subjudul Home</label>
                        <input type="text" class="form-control" id="subjudul" name="subjudul">
                        <span class="text-danger error-text subjudul_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Masukkan Deskripsi Home</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                        <span class="text-danger error-text deskripsi_error"></span>
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
<div class="modal fade editHome" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form action="{{ route('update.home') }}" method="POST" id="update-home" enctype="multipart/form-data">
@csrf
<div class="form-group">
    <input type="hidden" name="home_id">
    <label for="judul">Edit Judul Home</label>
    <input type="text" class="form-control" id="judul" name="judul">
    <span class="text-danger error-text judul_error"></span>
</div>
<div class="form-group">
    <label for="subjudul">Edit Subjudul Home</label>
    <input type="text" class="form-control" id="subjudul" name="subjudul">
    <span class="text-danger error-text subjudul_error"></span>
</div>
<div class="form-group">
    <label for="deskripsi">Edit Deskripsi Home</label>
    <input type="text" class="form-control" id="deskripsi" name="deskripsi">
    <span class="text-danger error-text deskripsi_error"></span>
</div>
<div class="form-group">
    <label for="image">Edit Foto - Kosongkan Bila Sama</label>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="image" name="image" lang="es" onchange="previewFile(this)">
        <label class="custom-file-label" for="image">Pilih Foto</label>
        <span class="text-danger error-text image_error"></span>
    </div>
    <img id="previewImg" style="max-width: 190px;" class="mt-3 shadow-sm">
</div>
<div class="modal-footer">
    <button type="reset" class="btn btn-danger" data-dismiss="modal" id="btn_close">BATALKAN</button>
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
        var table = $('#tableHome').DataTable({
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
                url: "{{ route('data.home.ajax') }}",
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
                    data: 'deskripsi',
                    name: 'deskripsi'
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
        $('#add-home').on('submit', function (e) {
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
                        $('#tableHome').DataTable().ajax.reload(null, false);
                        $('#ModalHome').modal('hide');
                        $('#saveBtn').html('Simpan');
                    }
                }
            });
        });
    });

    $(document).on('click', '#editHomeBtn', function () {
        var home_id = $(this).data('id');
        $('.editHome').find('form')[0].reset();
        $('.editHome').find('span.error-text').text('');
        $.post('{{ route("get.home.edit") }}', {
            home_id: home_id
        }, function (data) {
            $('.editHome').find('input[name="home_id"]').val(data.details.id);
            $('.editHome').find('input[name="judul"]').val(data.details
                .judul);
            $('.editHome').find('input[name="subjudul"]').val(data.details
                .subjudul);
            $('.editHome').find('input[name="deskripsi"]').val(data.details
                .deskripsi);
            $('.editHome').modal('show');
        }, 'json');
    });

    $('#update-home').on('submit', function (e) {
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
                    $('#tableHome').DataTable().ajax.reload(null, false);
                    $('.editHome').modal('hide');
                    $('.editHome').find('form')[0].reset();
                }
            }
        });
    });

    $(document).on('click', '#deleteHomeBtn', function () {
        var home_id = $(this).data('id');
        var url = '{{ route("delete.home") }}';

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
                    home_id: home_id
                }, function (data) {
                    if (data.code == 1) {
                        $('#tableHome').DataTable().ajax.reload(null,
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