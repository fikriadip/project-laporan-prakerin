@extends('partial.master_admin')

@section('title_web')
Data Home Landing Page - Bimbel Primago
@endsection

@section('dashboard')
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold"><i class="icon-home mr-2"></i> Home Landing Page</h2>
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
                    <h4 class="card-title font-weight-bold">Data Home
                        <button type="button" data-toggle="modal" data-target="#ModalHome"
                            class="btn btn-primary float-right btn-round text-white"><i class="fas fa-plus mr-2"></i>
                            TAMBAH DATA
                            HOME</button>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tableHome" class="display table table-striped table-hover bg-light">
                            <thead>
                                <tr class="text-center text-primary">
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
            <div class="row">
                <div class="col-12">
                    <div class="card"
                        style="border: none; box-shadow: 0 1px 41px rgba(0, 0, 0, 12%); border-radius: 16px;">
                        <div class="text-center mb-2">
                            <h3 class="font-weight-bold mt-5">TAMBAH DATA HOME
                            </h3>
                        </div>
                        <div class="card-body mt-2">
                            <div class="modal-content">
                                <form action="{{ route('add.home') }}" method="POST" id="add-home"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="judul" class="form-label h6 font-weight-bold">Masukkan Judul
                                            Home</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-heading ml-1"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control input-custom" id="judul"
                                                name="judul">
                                        </div>
                                        <span class="text-danger error-text judul_error"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="subjudul" class="form-label h6 font-weight-bold">Masukkan Subjudul
                                            Home</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-comment-alt ml-1"></i>
                                                </div>
                                            </div>
                                            <input type="text" id="subjudul" class="form-control input-custom"
                                                name="subjudul" />
                                        </div>
                                        <span class="text-danger error-text subjudul_error"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label h6 font-weight-bold">Masukkan Deskripsi
                                            Home</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-paragraph ml-1"></i>
                                                </div>
                                            </div>
                                            <input type="text" id="deskripsi" class="form-control input-custom"
                                                name="deskripsi" />
                                        </div>
                                        <span class="text-danger error-text deskripsi_error"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="foto" class="form-label h6 font-weight-bold">Masukkan Foto</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-image ml-1"></i>
                                                </div>
                                            </div>
                                            <input type="file" id="image" class="form-control input-custom" name="image"
                                                onchange="previewFile(this)" />
                                        </div>
                                        <span class="text-danger error-text image_error"></span>
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
    <div class="modal fade editHome" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="row">
                <div class="col-12">
                    <div class="card"
                        style="border: none; box-shadow: 0 1px 41px rgba(0, 0, 0, 12%); border-radius: 16px;">
                        <div class="text-center mb-2">
                            <h3 class="font-weight-bold mt-5">EDIT DATA HOME
                            </h3>
                        </div>
                        <div class="card-body mt-2">
                            <div class="modal-content">
                                <form action="{{ route('update.home') }}" method="POST" id="update-home"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="home_id">
                                    <div class="mb-3">
                                        <label for="judul" class="form-label h6 font-weight-bold">Edit Judul
                                            Home</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-heading ml-1"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control input-custom" id="judul"
                                                name="judul">
                                        </div>
                                        <span class="text-danger error-text judul_error"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="subjudul" class="form-label h6 font-weight-bold">Edit Subjudul
                                            Home</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-comment-alt ml-1"></i>
                                                </div>
                                            </div>
                                            <input type="text" id="subjudul" class="form-control input-custom"
                                                name="subjudul" />
                                        </div>
                                        <span class="text-danger error-text subjudul_error"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label h6 font-weight-bold">Edit Deskripsi
                                            Home</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-paragraph ml-1"></i>
                                                </div>
                                            </div>
                                            <input type="text" id="deskripsi" class="form-control input-custom"
                                                name="deskripsi" />
                                        </div>
                                        <span class="text-danger error-text deskripsi_error"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label h6 font-weight-bold">Edit Foto - Kosongkan
                                            Bila
                                            Sama</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-image ml-1"></i>
                                                </div>
                                            </div>
                                            <input type="file" id="image" class="form-control input-custom"
                                                name="image" />
                                        </div>
                                        <span class="text-danger error-text image_error"></span>
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
                        $('#saveBtn').html('SIMPAN');
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