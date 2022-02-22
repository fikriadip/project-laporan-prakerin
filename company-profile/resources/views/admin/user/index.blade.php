@extends('template.master_admin')

@section('title_web')
Data User Landing Page - Bimbel Primago
@endsection

@section('title_content')
User Admin
@endsection

@section('breadcrumbs')
<ul class="breadcrumbs">
    <li class="nav-home">
        <a href="#">
            <i class="flaticon-home"></i>
        </a>
    </li>
    <li class="separator">
        <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item">
        <a href="#">Data User</a>
    </li>
    <li class="separator">
        <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item">
        <a href="#">Kelola Data User</a>
    </li>
</ul>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-weight-bold">DataTable User
                    <button type="button" data-toggle="modal" data-target="#ModalUser"
                        class="btn btn-primary float-right text-white"><i class="fas fa-book mr-2"></i> TAMBAH DATA
                        ADMIN</button>
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tableUser" class="display table table-striped table-bordered table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama Admin</th>
                                <th>Email</th>
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
<div class="modal fade" id="ModalUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form action="{{ route('add.user') }}" method="POST" id="add-admin" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Masukkan Nama Admin</label>
                        <input type="text" class="form-control" id="name" name="name">
                        <span class="text-danger error-text name_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Masukkan Alamat Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                        <span class="text-danger error-text email_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Masukkan Password Akun</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <span class="text-danger error-text password_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Masukkan Konfirmasi Password Akun</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                        <span class="text-danger error-text confirm_password_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="foto">Masukkan Foto</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto" name="foto" lang="es"
                                onchange="previewFile(this)">
                            <label class="custom-file-label" for="foto">Pilih Foto</label>
                            <span class="text-danger error-text foto_error"></span>
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
<div class="modal fade editUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form action="{{ route('update.user') }}" method="POST" id="update-user" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="user_id">
                        <label for="name">Edit Nama Admin</label>
                        <input type="text" class="form-control" id="name" name="name">
                        <span class="text-danger error-text name_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Edit Alamat Email Admin</label>
                        <input type="email" class="form-control" id="email" name="email">
                        <span class="text-danger error-text email_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="foto">Edit Foto - Kosongkan Bila Sama</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto" name="foto" lang="es"
                                onchange="previewFile(this)">
                            <label class="custom-file-label" for="foto">Pilih Foto</label>
                            <span class="text-danger error-text foto_error"></span>
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
        var table = $('#tableUser').DataTable({
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
                url: "{{ route('data.user.ajax') }}",
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
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'foto',
                    name: 'foto'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ],
        });
    });


    $(function () {
        $('#add-admin').on('submit', function (e) {
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
                        $('#tableUser').DataTable().ajax.reload(null, false);
                        $('#ModalAdmin').modal('hide');
                        $('#saveBtn').html('Simpan');
                    }
                }
            });
        });
    });

    $(document).on('click', '#editUserBtn', function () {
        var user_id = $(this).data('id');
        $('.editUser').find('form')[0].reset();
        $('.editUser').find('span.error-text').text('');
        $.post('{{ route("get.user.edit") }}', {
            user_id: user_id
        }, function (data) {
            $('.editUser').find('input[name="user_id"]').val(data.details.id);
            $('.editUser').find('input[name="name"]').val(data.details
                .name);
            $('.editUser').find('input[name="email"]').val(data.details
                .email);
            $('.editUser').modal('show');
        }, 'json');
    });

    $('#update-user').on('submit', function (e) {
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
                    $('#tableUser').DataTable().ajax.reload(null, false);
                    $('.editUser').modal('hide');
                    $('.editUser').find('form')[0].reset();
                }
            }
        });
    });

    $(document).on('click', '#deleteUserBtn', function () {
        var user_id = $(this).data('id');
        var url = '{{ route("delete.user") }}';

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
                    user_id: user_id
                }, function (data) {
                    if (data.code == 1) {
                        $('#tableUser').DataTable().ajax.reload(null,
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