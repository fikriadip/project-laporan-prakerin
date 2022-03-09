@extends('template.master_admin')

@section('title_web')
Data Faq Landing Page - Bimbel Primago
@endsection

@section('title_content')
Faq
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
        <a href="#">Data Faq</a>
    </li>
    <li class="separator">
        <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item">
        <a href="#">Kelola Data Faq</a>
    </li>
</ul>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-weight-bold">DataTable Faq
                    <button type="button" data-toggle="modal" data-target="#ModalFaq"
                        class="btn btn-primary float-right text-white"><i class="fas fa-plus mr-2"></i> TAMBAH DATA FAQ</button>
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tableFaq" class="display table table-striped table-bordered table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Pertanyaan</th>
                                <th>Jawaban</th>
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
<div class="modal fade" id="ModalFaq" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="row">
            <div class="col-12">
                <div class="card" style="border: none; box-shadow: 0 1px 41px rgba(0, 0, 0, 12%); border-radius: 16px;">
                    <div class="text-center mb-2">
                        <h3 class="font-weight-bold mt-5">TAMBAH DATA FAQ
                        </h3>
                    </div>
                    <div class="card-body mt-2">
                        <div class="modal-content">
                            <form action="{{ route('add.faq') }}" method="POST" id="add-faq">
                                @csrf
                                <div class="mb-3">
                                    <label for="pertanyaan" class="form-label h6 font-weight-bold">Masukkan Pertanyaan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-question-circle ml-1"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control input-custom" id="pertanyaan" name="pertanyaan">
                                    </div>
                                    <span class="text-danger error-text pertanyaan_error"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="jawaban" class="form-label h6 font-weight-bold">Masukkan Jawaban</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-comments ml-1"></i>
                                            </div>
                                        </div>
                                        <input type="text" id="jawaban" class="form-control input-custom"
                                            name="jawaban" />
                                    </div>
                                    <span class="text-danger error-text jawaban_error"></span>
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
<div class="modal fade editFaq" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="row">
            <div class="col-12">
                <div class="card" style="border: none; box-shadow: 0 1px 41px rgba(0, 0, 0, 12%); border-radius: 16px;">
                    <div class="text-center mb-2">
                        <h3 class="font-weight-bold mt-5">EDIT MANAGEMENT FAQ
                        </h3>
                    </div>
                    <div class="card-body mt-2">
                        <div class="modal-content">
                            <form action="{{ route('update.faq') }}" method="POST" id="update-faq">
                                @csrf
                                <input type="hidden" name="faq_id">
                                <div class="mb-3">
                                    <label for="pertanyaan" class="form-label h6 font-weight-bold">Edit Pertanyaan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-question-circle ml-1"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control input-custom" id="pertanyaan" name="pertanyaan">
                                    </div>
                                    <span class="text-danger error-text pertanyaan_error"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="jawaban" class="form-label h6 font-weight-bold">Edit Jawaban</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-comments ml-1"></i>
                                            </div>
                                        </div>
                                        <input type="text" id="jawaban" class="form-control input-custom"
                                            name="jawaban" />
                                    </div>
                                    <span class="text-danger error-text jawaban_error"></span>
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
        var table = $('#tableFaq').DataTable({
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
                url: "{{ route('data.faq.ajax') }}",
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
                    data: 'pertanyaan',
                    name: 'pertanyaan'
                },
                {
                    data: 'jawaban',
                    name: 'jawaban'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ],
        });
    });


    $(function () {
        $('#add-faq').on('submit', function (e) {
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
                        $('#tableFaq').DataTable().ajax.reload(null, false);
                        $('#ModalFaq').modal('hide');
                        $('#saveBtn').html('Simpan');
                    }
                }
            });
        });
    });

    $(document).on('click', '#editFaqBtn', function () {
        var faq_id = $(this).data('id');
        $('.editFaq').find('form')[0].reset();
        $('.editFaq').find('span.error-text').text('');
        $.post('{{ route("get.faq.edit") }}', {
            faq_id: faq_id
        }, function (data) {
            $('.editFaq').find('input[name="faq_id"]').val(data.details.id);
            $('.editFaq').find('input[name="pertanyaan"]').val(data.details
                .pertanyaan);
            $('.editFaq').find('input[name="jawaban"]').val(data.details
                .jawaban);
            $('.editFaq').modal('show');
        }, 'json');
    });

    $('#update-faq').on('submit', function (e) {
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
                    $('#tableFaq').DataTable().ajax.reload(null, false);
                    $('.editFaq').modal('hide');
                    $('.editFaq').find('form')[0].reset();
                }
            }
        });
    });

    $(document).on('click', '#deleteFaqBtn', function () {
        var faq_id = $(this).data('id');
        var url = '{{ route("delete.faq") }}';

        Swal.fire({
            title: "Yakin Ingin Menghapus?",
            text: "Anda Akan Menghapus Data Pricing",
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
                    faq_id: faq_id
                }, function (data) {
                    if (data.code == 1) {
                        $('#tableFaq').DataTable().ajax.reload(null,
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