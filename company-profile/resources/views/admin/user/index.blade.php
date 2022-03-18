@extends('partial.master_admin')

@section('title_web')
Data User Landing Page - Bimbel Primago
@endsection

@section('dashboard')
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold"><i class="icon-user mr-2"></i> User Admin</h2>
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
                    <h4 class="card-title font-weight-bold">Data Admin
                        <button type="button" data-toggle="modal" data-target="#ModalUser"
                            class="btn btn-primary float-right btn-round text-white"><i
                                class="fas fa-user-plus mr-2"></i> TAMBAH DATA
                            ADMIN</button>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tableUser" class="display table table-striped table-hover bg-light">
                            <thead>
                                <tr class="text-center text-primary">
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
            <div class="row">
                <div class="col-12">
                    <div class="card"
                        style="border: none; box-shadow: 0 1px 41px rgba(0, 0, 0, 12%); border-radius: 16px;">
                        <div class="text-center mb-2">
                            <h3 class="font-weight-bold mt-5">TAMBAH ADMIN BARU
                            </h3>
                        </div>
                        <div class="card-body mt-2">
                            <div class="modal-content">

                                <form action="{{ route('add.user') }}" method="POST" id="add-admin"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label h6 font-weight-bold">Masukkan Nama
                                            Admin</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-id-card-alt ml-1"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control input-custom" id="name" name="name">
                                        </div>
                                        <span class="text-danger error-text name_error"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label h6 font-weight-bold">Masukkan Email
                                            Admin</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-envelope ml-1"></i>
                                                </div>
                                            </div>
                                            <input type="email" id="email" class="form-control input-custom"
                                                name="email" />
                                        </div>
                                        <span class="text-danger error-text email_error"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label h6 font-weight-bold">Masukkan
                                            Password</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-lock ml-1"></i>
                                                </div>
                                            </div>
                                            <input type="password" id="password" class="form-control input-custom"
                                                name="password" />
                                        </div>
                                        <span class="text-danger error-text password_error"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirm_password" class="form-label h6 font-weight-bold">Masukkan
                                            Konfirmasi
                                            Password</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-lock ml-1"></i>
                                                </div>
                                            </div>
                                            <input type="password" id="confirm_password"
                                                class="form-control input-custom" name="confirm_password" />

                                        </div>
                                        <span class="text-danger error-text confirm_password_error"></span>
                                    </div>

                                    <div class="mb-3">
                                        <label for="foto" class="form-label h6 font-weight-bold">Pilih Foto - Dapat Di
                                            Kosongkan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-image ml-1"></i>
                                                </div>
                                            </div>
                                            <input type="file" id="foto" class="form-control input-custom" name="foto"
                                                onchange="previewFile(this)" />
                                        </div>
                                        <span class="text-danger error-text foto_error"></span>
                                        <img id="previewImg" style="max-width: 190px;" class="mt-3 shadow-sm">
                                    </div>

                                    <center>
                                        <button type="reset"
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
    <div class="modal fade editUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="row">
                <div class="col-12">
                    <div class="card"
                        style="border: none; box-shadow: 0 1px 41px rgba(0, 0, 0, 12%); border-radius: 16px;">
                        <div class="text-center mb-2">
                            <h3 class="font-weight-bold mt-5">EDIT DATA ADMIN
                            </h3>
                        </div>
                        <div class="card-body mt-2">
                            <div class="modal-content">

                                <form action="{{ route('update.user') }}" method="POST" id="update-user"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="user_id">

                                    <div class="mb-3">
                                        <label for="name" class="form-label h6 font-weight-bold">Edit Nama Admin</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-id-card-alt ml-1"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control input-custom" id="name" name="name">
                                        </div>
                                        <span class="text-danger error-text name_error"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label h6 font-weight-bold">Edit Email
                                            Admin</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-envelope ml-1"></i>
                                                </div>
                                            </div>
                                            <input type="email" id="email" class="form-control input-custom"
                                                name="email" />
                                        </div>
                                        <span class="text-danger error-text email_error"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="foto" class="form-label h6 font-weight-bold">Edit Foto - Kosongkan
                                            Bila Sama</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-image ml-1"></i>
                                                </div>
                                            </div>
                                            <input type="file" id="foto" class="form-control input-custom"
                                                name="foto" />
                                        </div>
                                        <span class="text-danger error-text foto_error"></span>
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
                        $('#saveBtn').html('SIMPAN');
                    } else {
                        $(form)[0].reset();
                        Swal.fire({
                            icon: 'success',
                            title: data.status,
                            text: data.message,
                            timer: 1200
                        });
                        $('#tableUser').DataTable().ajax.reload(null, false);
                        $('#ModalUser').modal('hide');
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
            text: "Anda Akan Menghapus Data Admin",
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