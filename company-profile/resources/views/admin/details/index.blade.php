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
        <a href="#">
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
                        class="btn btn-primary float-right text-white"><i class="fas fa-plus mr-2"></i> TAMBAH DATA
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
        <div class="row">
            <div class="col-12">
                <div class="card" style="border: none; box-shadow: 0 1px 41px rgba(0, 0, 0, 12%); border-radius: 16px;">
                    <div class="text-center mb-2">
                        <h3 class="font-weight-bold mt-5">TAMBAH DATA DETAILS
                        </h3>
                    </div>
                    <div class="card-body mt-2">
                        <div class="modal-content">
                            <form action="{{ route('add.details') }}" method="POST" id="add-details" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="judul" class="form-label h6 font-weight-bold">Masukkan Judul
                                        Details</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-heading ml-1"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control input-custom" id="judul" name="judul">
                                    </div>
                                    <span class="text-danger error-text judul_error"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="subjudul" class="form-label h6 font-weight-bold">Masukkan Subjudul
                                        Details</label>
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
                                    <label for="penjelasan1" class="form-label h6 font-weight-bold">Masukkan Penjelasan 1
                                        Details</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-sticky-note ml-1"></i>
                                            </div>
                                        </div>
                                        <input type="text" id="penjelasan1" class="form-control input-custom"
                                            name="penjelasan1" />
                                    </div>
                                    <span class="text-danger error-text penjelasan1_error"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="penjelasan2" class="form-label h6 font-weight-bold">Masukkan Penjelasan 2
                                        Details</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-sticky-note ml-1"></i>
                                            </div>
                                        </div>
                                        <input type="text" id="penjelasan2" class="form-control input-custom"
                                            name="penjelasan2" />
                                    </div>
                                    <span class="text-danger error-text penjelasan2_error"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="penjelasan3" class="form-label h6 font-weight-bold">Masukkan Penjelasan 3
                                        Details</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-sticky-note ml-1"></i>
                                            </div>
                                        </div>
                                        <input type="text" id="penjelasan3" class="form-control input-custom"
                                            name="penjelasan3" />
                                    </div>
                                    <span class="text-danger error-text penjelasan3_error"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="penjelasan4" class="form-label h6 font-weight-bold">Masukkan Penjelasan 4
                                        Details</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-sticky-note ml-1"></i>
                                            </div>
                                        </div>
                                        <input type="text" id="penjelasan4" class="form-control input-custom"
                                            name="penjelasan4" />
                                    </div>
                                    <span class="text-danger error-text penjelasan4_error"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="paragraf" class="form-label h6 font-weight-bold">Masukkan Paragraf
                                        Details</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-paragraph ml-1"></i>
                                            </div>
                                        </div>
                                        <input type="text" id="paragraf" class="form-control input-custom"
                                            name="paragraf" />
                                    </div>
                                    <span class="text-danger error-text paragraf_error"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label h6 font-weight-bold">Masukkan Foto</label>
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
<div class="modal fade editDetails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="row">
            <div class="col-12">
                <div class="card" style="border: none; box-shadow: 0 1px 41px rgba(0, 0, 0, 12%); border-radius: 16px;">
                    <div class="text-center mb-2">
                        <h3 class="font-weight-bold mt-5">EDIT MANAGEMENT DETAILS
                        </h3>
                    </div>
                    <div class="card-body mt-2">
                        <div class="modal-content">
                            <form action="{{ route('update.details') }}" method="POST" id="update-details" enctype="multipart/form-data">
                                @csrf
                        <input type="hidden" name="details_id">
                                <div class="mb-3">
                                    <label for="judul" class="form-label h6 font-weight-bold">Edit Judul
                                        Details</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-heading ml-1"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control input-custom" id="judul" name="judul">
                                    </div>
                                    <span class="text-danger error-text judul_error"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="subjudul" class="form-label h6 font-weight-bold">Edit Subjudul
                                        Details</label>
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
                                    <label for="penjelasan1" class="form-label h6 font-weight-bold">Edit Penjelasan 1
                                        Details</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                                                                <i class="fas fa-sticky-note ml-1"></i>

                                            </div>
                                        </div>
                                        <input type="text" id="penjelasan1" class="form-control input-custom"
                                            name="penjelasan1" />
                                    </div>
                                    <span class="text-danger error-text penjelasan1_error"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="penjelasan2" class="form-label h6 font-weight-bold">Edit Penjelasan 2
                                        Details</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                                                                <i class="fas fa-sticky-note ml-1"></i>

                                            </div>
                                        </div>
                                        <input type="text" id="penjelasan2" class="form-control input-custom"
                                            name="penjelasan2" />
                                    </div>
                                    <span class="text-danger error-text penjelasan2_error"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="penjelasan3" class="form-label h6 font-weight-bold">Edit Penjelasan 3
                                        Details</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                                                                <i class="fas fa-sticky-note ml-1"></i>

                                            </div>
                                        </div>
                                        <input type="text" id="penjelasan3" class="form-control input-custom"
                                            name="penjelasan3" />
                                    </div>
                                    <span class="text-danger error-text penjelasan3_error"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="penjelasan4" class="form-label h6 font-weight-bold">Edit Penjelasan 4
                                        Details</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                                                                <i class="fas fa-sticky-note ml-1"></i>

                                            </div>
                                        </div>
                                        <input type="text" id="penjelasan4" class="form-control input-custom"
                                            name="penjelasan4" />
                                    </div>
                                    <span class="text-danger error-text penjelasan4_error"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="paragraf" class="form-label h6 font-weight-bold">Edit Paragraf
                                        Details</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-paragraph ml-1"></i>
                                            </div>
                                        </div>
                                        <input type="text" id="paragraf" class="form-control input-custom"
                                            name="paragraf" />
                                    </div>
                                    <span class="text-danger error-text paragraf_error"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label h6 font-weight-bold">Edit Foto - Kosongkan Bila Sama</label>
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
                        $('#saveBtn').html('SIMPAN');
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
            text: "Anda Akan Menghapus Data Details",
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