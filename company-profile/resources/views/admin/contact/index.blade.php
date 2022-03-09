@extends('template.master_admin')

@section('title_web')
Data Contact Landing Page - Bimbel Primago
@endsection

@section('title_content')
Contact
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
        <a href="#">Data Contact</a>
    </li>
    <li class="separator">
        <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item">
        <a href="#">Kelola Data Contact</a>
    </li>
</ul>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-weight-bold">DataTable Contact
                    <button type="button" data-toggle="modal" data-target="#ModalContact"
                        class="btn btn-primary float-right text-white"><i class="fas fa-plus mr-2"></i> TAMBAH DATA
                        CONTACT</button>
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tableContact" class="display table table-striped table-bordered table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Deskripsi Lokasi</th>
                                <th>Alamat Email</th>
                                <th>No Telepon</th>
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
<div class="modal fade" id="ModalContact" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="row">
            <div class="col-12">
                <div class="card" style="border: none; box-shadow: 0 1px 41px rgba(0, 0, 0, 12%); border-radius: 16px;">
                    <div class="text-center mb-2">
                        <h3 class="font-weight-bold mt-5">TAMBAH DATA CONTACT
                        </h3>
                    </div>
                    <div class="card-body mt-2">
                        <div class="modal-content">
                            <form action="{{ route('add.contact') }}" method="POST" id="add-contact" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="deskripsi_lokasi" class="form-label h6 font-weight-bold">Masukkan Deskripsi Lokasi</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-comment-alt ml-1"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control input-custom" id="deskripsi_lokasi" name="deskripsi_lokasi">
                                    </div>
                                    <span class="text-danger error-text deskripsi_lokasi_error"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat_email" class="form-label h6 font-weight-bold">Masukkan Alamat Email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-envelope ml-1"></i>
                                            </div>
                                        </div>
                                        <input type="email" id="alamat_email" class="form-control input-custom"
                                            name="alamat_email" />
                                    </div>
                                    <span class="text-danger error-text alamat_email_error"></span>
                                </div>

                                <div class="mb-3">
                                    <label for="no_telepon" class="form-label h6 font-weight-bold">Masukkan No Telepon</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-phone ml-1"></i>
                                            </div>
                                        </div>
                                        <input type="number" id="no_telepon" class="form-control input-custom"
                                            name="no_telepon" />
                                    </div>
                                    <span class="text-danger error-text no_telepon_error"></span>
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
<div class="modal fade editContact" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="row">
            <div class="col-12">
                <div class="card" style="border: none; box-shadow: 0 1px 41px rgba(0, 0, 0, 12%); border-radius: 16px;">
                    <div class="text-center mb-2">
                        <h3 class="font-weight-bold mt-5">EDIT MANAGEMENT CONTACT
                        </h3>
                    </div>
                    <div class="card-body mt-2">
                        <div class="modal-content">
                            <form action="{{ route('update.contact') }}" method="POST" id="update-contact" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="contact_id">
                                <div class="mb-3">
                                    <label for="deskripsi_lokasi" class="form-label h6 font-weight-bold">Masukkan Deskripsi Lokasi</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-comment-alt ml-1"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control input-custom" id="deskripsi_lokasi" name="deskripsi_lokasi">
                                    </div>
                                    <span class="text-danger error-text deskripsi_lokasi_error"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat_email" class="form-label h6 font-weight-bold">Masukkan Alamat Email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-envelope ml-1"></i>
                                            </div>
                                        </div>
                                        <input type="email" id="alamat_email" class="form-control input-custom"
                                            name="alamat_email" />
                                    </div>
                                    <span class="text-danger error-text alamat_email_error"></span>
                                </div>

                                <div class="mb-3">
                                    <label for="no_telepon" class="form-label h6 font-weight-bold">Masukkan No Telepon</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-phone ml-1"></i>
                                            </div>
                                        </div>
                                        <input type="number" id="no_telepon" class="form-control input-custom"
                                            name="no_telepon" />
                                    </div>
                                    <span class="text-danger error-text no_telepon_error"></span>
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

@push('script')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $(document).ready(function () {
        var table = $('#tableContact').DataTable({
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
                url: "{{ route('data.contact.ajax') }}",
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
                    data: 'deskripsi_lokasi',
                    name: 'deskripsi_lokasi'
                },
                {
                    data: 'alamat_email',
                    name: 'alamat_email'
                },
                {
                    data: 'no_telepon',
                    name: 'no_telepon'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ],
        });
    });


    $(function () {
        $('#add-contact').on('submit', function (e) {
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
                        $('#tableContact').DataTable().ajax.reload(null, false);
                        $('#ModalContact').modal('hide');
                        $('#saveBtn').html('Simpan');
                    }
                }
            });
        });
    });

    $(document).on('click', '#editContactBtn', function () {
        var contact_id = $(this).data('id');
        $('.editContact').find('form')[0].reset();
        $('.editContact').find('span.error-text').text('');
        $.post('{{ route("get.contact.edit") }}', {
            contact_id: contact_id
        }, function (data) {
            $('.editContact').find('input[name="contact_id"]').val(data.details.id);
            $('.editContact').find('input[name="deskripsi_lokasi"]').val(data.details
                .deskripsi_lokasi);
            $('.editContact').find('input[name="alamat_email"]').val(data.details
                .alamat_email);
            $('.editContact').find('input[name="no_telepon"]').val(data.details
                .no_telepon);
            $('.editContact').modal('show');
        }, 'json');
    });

    $('#update-contact').on('submit', function (e) {
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
                    $('#tableContact').DataTable().ajax.reload(null, false);
                    $('.editContact').modal('hide');
                    $('.editContact').find('form')[0].reset();
                }
            }
        });
    });

    $(document).on('click', '#deleteContactBtn', function () {
        var contact_id = $(this).data('id');
        var url = '{{ route("delete.contact") }}';

        Swal.fire({
            title: "Yakin Ingin Menghapus?",
            text: "Anda Akan Menghapus Data Contact",
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
                    contact_id: contact_id
                }, function (data) {
                    if (data.code == 1) {
                        $('#tableContact').DataTable().ajax.reload(null,
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