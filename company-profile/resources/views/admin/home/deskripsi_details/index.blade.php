@extends('partial.master_admin')

@section('title_web')
Data Deskripsi Landing Page - PT Primago
@endsection

@section('dashboard')
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold"><i class="icon-pencil mr-2"></i> Deskripsi Landing Page</h2>
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
                    <h4 class="card-title font-weight-bold">Data Deskripsi
                        <button type="button" data-toggle="modal" data-target="#ModalDeskripsi"
                            class="btn btn-primary float-right btn-round text-white"><i class="fas fa-plus mr-2"></i>
                            TAMBAH DATA
                            DESKRIPSI</button>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tableDeskripsi" class="display table table-striped table-hover bg-light">
                            <thead>
                                <tr class="text-center text-primary">
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Content</th>
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
    <div class="modal fade" id="ModalDeskripsi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="row">
                <div class="col-12">
                    <div class="card"
                        style="border: none; box-shadow: 0 1px 41px rgba(0, 0, 0, 12%); border-radius: 16px;">
                        <div class="text-center mb-2">
                            <h3 class="font-weight-bold mt-5">TAMBAH DATA DESKRIPSI
                            </h3>
                        </div>
                        <div class="card-body mt-2">
                            <div class="modal-content">
                                <form action="{{ route('add.deskdetail') }}" method="POST" id="add-deskripsi">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="title" class="form-label h6 font-weight-bold">Masukkan Title
                                            Deskripsi</label>
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
                                        <label for="content" class="form-label h6 font-weight-bold">Masukkan Content
                                            Deskripsi</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-sticky-note ml-1"></i>
                                                </div>
                                            </div>
                                            <input type="text" id="content" class="form-control input-custom"
                                                name="content" />
                                        </div>
                                        <span class="text-danger error-text content_error"></span>
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
    <div class="modal fade editDeskripsi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="row">
                <div class="col-12">
                    <div class="card"
                        style="border: none; box-shadow: 0 1px 41px rgba(0, 0, 0, 12%); border-radius: 16px;">
                        <div class="text-center mb-2">
                            <h3 class="font-weight-bold mt-5">EDIT DATA DESKRIPSI
                            </h3>
                        </div>
                        <div class="card-body mt-2">
                            <div class="modal-content">
                                <form action="{{ route('update.deskdetail') }}" method="POST" id="update-deskripsi">
                                    @csrf
                                    <input type="hidden" name="deskripsi_id">
                                    <div class="mb-3">
                                        <label for="title" class="form-label h6 font-weight-bold">Edit Title
                                            Deskripsi</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-pen-square ml-1"></i>
                                                </div>
                                            </div>
                                            <input type="text" id="title" class="form-control input-custom"
                                                name="title" />
                                        </div>
                                        <span class="text-danger error-text title_error"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="content" class="form-label h6 font-weight-bold">Edit Content
                                            Deskripsi</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-sticky-note ml-1"></i>
                                                </div>
                                            </div>
                                            <input type="text" id="content" class="form-control input-custom"
                                                name="content" />
                                        </div>
                                        <span class="text-danger error-text content_error"></span>
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
        $('#ModalDeskripsi').modal('hide')
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
        var table = $('#tableDeskripsi').DataTable({
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
                url: "{{ route('data.deskdetail.ajax') }}",
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
                    data: 'content',
                    name: 'content'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ],
        });
    });


    $(function () {
        $('#add-deskripsi').on('submit', function (e) {
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
                        $('#tableDeskripsi').DataTable().ajax.reload(null, false);
                        $('#ModalDeskripsi').modal('hide');
                        $('#saveBtn').html('SIMPAN');
                    }
                }
            });
        });
    });

    $(document).on('click', '#editDeskDetailBtn', function () {
        var deskripsi_id = $(this).data('id');
        $('.editDeskripsi').find('form')[0].reset();
        $('.editDeskripsi').find('span.error-text').text('');
        $.post('{{ route("get.deskdetail.edit") }}', {
            deskripsi_id: deskripsi_id
        }, function (data) {
            $('.editDeskripsi').find('input[name="deskripsi_id"]').val(data.details.id);
            $('.editDeskripsi').find('input[name="title"]').val(data.details
                .title);
            $('.editDeskripsi').find('input[name="content"]').val(data.details
                .content);
            $('.editDeskripsi').modal('show');
        }, 'json');
    });

    $('#update-deskripsi').on('submit', function (e) {
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
                    $('#tableDeskripsi').DataTable().ajax.reload(null, false);
                    $('.editDeskripsi').modal('hide');
                    $('.editDeskripsi').find('form')[0].reset();
                }
            }
        });
    });

    $(document).on('click', '#deleteDeskDetailBtn', function () {
        var deskripsi_id = $(this).data('id');
        var url = '{{ route("delete.deskdetail") }}';

        Swal.fire({
            title: "Yakin Ingin Menghapus?",
            text: "Anda Akan Menghapus Data Deskripsi",
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
                    deskripsi_id: deskripsi_id
                }, function (data) {
                    if (data.code == 1) {
                        $('#tableDeskripsi').DataTable().ajax.reload(null,
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