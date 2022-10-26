@extends('partial.master_admin')

@section('title_web')
Data Contact Landing Page - PT Primago
@endsection

@section('dashboard')
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold"><i class="icon-phone mr-2"></i> Contact Landing Page</h2>
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
                    <h4 class="card-title font-weight-bold">Data Contact
                        <button type="button" data-toggle="modal" data-target="#ModalContact"
                            class="btn btn-primary float-right btn-round text-white"><i class="fas fa-plus mr-2"></i>
                            TAMBAH DATA
                            CONTACT</button>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tableContact" class="display table table-striped table-hover bg-light">
                            <thead>
                                <tr class="text-center text-primary">
                                    <th>No</th>
                                    <th>Nomor Telepon</th>
                                    <th>Alamat Email</th>
                                    <th>Deskripsi Lokasi</th>
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
                    <div class="card"
                        style="border: none; box-shadow: 0 1px 41px rgba(0, 0, 0, 12%); border-radius: 16px;">
                        <div class="text-center mb-2">
                            <h3 class="font-weight-bold mt-5">TAMBAH DATA CONTACT
                            </h3>
                        </div>
                        <div class="card-body mt-2">
                            <div class="modal-content">
                                <form action="{{ route('add.contact') }}" method="POST" id="add-contact">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="number_phone" class="form-label h6 font-weight-bold">Masukkan Nomor
                                            Telepon</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone ml-1"></i>
                                                </div>
                                            </div>
                                            <input type="number" class="form-control input-custom" id="number_phone"
                                                name="number_phone">
                                        </div>
                                        <span class="text-danger error-text number_phone_error"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label h6 font-weight-bold">Masukkan Alamat
                                            Email</label>
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
                                        <label for="location" class="form-label h6 font-weight-bold">Masukkan
                                            Lokasi/Alamat</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-map-marked-alt ml-1"></i>
                                                </div>
                                            </div>
                                            <input type="location" id="location" class="form-control input-custom"
                                                name="location" />
                                        </div>
                                        <span class="text-danger error-text location_error"></span>
                                    </div>

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
    <div class="modal fade editContact" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="row">
                <div class="col-12">
                    <div class="card"
                        style="border: none; box-shadow: 0 1px 41px rgba(0, 0, 0, 12%); border-radius: 16px;">
                        <div class="text-center mb-2">
                            <h3 class="font-weight-bold mt-5">EDIT DATA CONTACT
                            </h3>
                        </div>
                        <div class="card-body mt-2">
                            <div class="modal-content">
                                <form action="{{ route('update.contact') }}" method="POST" id="update-contact">
                                    @csrf
                                    <input type="hidden" name="contact_id">
                                    <div class="mb-3">
                                        <label for="number_phone" class="form-label h6 font-weight-bold">Edit Nomor
                                            Telepon</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone ml-1"></i>
                                                </div>
                                            </div>
                                            <input type="number" class="form-control input-custom" id="number_phone"
                                                name="number_phone">
                                        </div>
                                        <span class="text-danger error-text number_phone_error"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label h6 font-weight-bold">Edit Alamat
                                            Email</label>
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
                                        <label for="location" class="form-label h6 font-weight-bold">Edit
                                            Lokasi/Alamat</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-map-marked-alt ml-1"></i>
                                                </div>
                                            </div>
                                            <input type="location" id="location" class="form-control input-custom"
                                                name="location" />
                                        </div>
                                        <span class="text-danger error-text location_error"></span>
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
        $('#ModalContact').modal('hide');
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
                    data: 'number_phone',
                    name: 'number_phone'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'location',
                    name: 'location'
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
                        $('#saveBtn').html('SIMPAN');
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
            $('.editContact').find('input[name="number_phone"]').val(data.details
                .number_phone);
            $('.editContact').find('input[name="email"]').val(data.details
                .email);
            $('.editContact').find('input[name="location"]').val(data.details
                .location);
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
            confirmButtonColor: '#ffa426',
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