@extends('template.master_admin')

@section('title_web')
Data Pricing Landing Page - Bimbel Primago
@endsection

@section('title_content')
Pricing
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
        <a href="#">Data Pricing</a>
    </li>
    <li class="separator">
        <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item">
        <a href="#">Kelola Data Pricing</a>
    </li>
</ul>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-weight-bold">DataTable Pricing
                    <button type="button" data-toggle="modal" data-target="#ModalPricing"
                        class="btn btn-primary float-right text-white"><i class="fas fa-book mr-2"></i> TAMBAH DATA
                        PRICING</button>
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tablePricing" class="display table table-striped table-bordered table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Judul</th>
                                <th>Harga</th>
                                <th>Deskripsi</th>
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
<div class="modal fade" id="ModalPricing" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-primary font-weight-bold" id="exampleModalLabel">Tambah Data Pricing</h4>
                <button type="reset" class="close text-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 id="message" class="text-danger font-weight-bold"></h5>
                <form action="{{ route('add.pricing') }}" method="POST" id="add-pricing">
                    @csrf
                    <div class="form-group">
                        <label for="judul">Masukkan Judul Pricing</label>
                        <input type="text" class="form-control" id="judul" name="judul">
                        <span class="text-danger error-text judul_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="harga">Masukkan Kalkulasi Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga">
                        <span class="text-danger error-text harga_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Masukkan Deskripsi Pricing</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                        <span class="text-danger error-text deskripsi_error"></span>
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
<div class="modal fade editPricing" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-primary font-weight-bold" id="exampleModalLabel">Edit Management About</h4>
                <button type="reset" class="close text-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 id="message" class="text-danger font-weight-bold"></h5>
                <form action="{{ route('update.pricing') }}" method="POST" id="update-pricing">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="pricing_id">
                        <label for="judul">Edit Judul Pricing</label>
                        <input type="text" class="form-control" id="judul" name="judul">
                        <span class="text-danger error-text judul_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="harga">Edit Harga Pricing</label>
                        <input type="text" class="form-control" id="harga" name="harga">
                        <span class="text-danger error-text harga_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Edit Deskripsi Pricing</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                        <span class="text-danger error-text deskripsi_error"></span>
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
        var table = $('#tablePricing').DataTable({
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
                url: "{{ route('data.pricing.ajax') }}",
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
                    data: 'harga',
                    name: 'harga'
                },
                {
                    data: 'deskripsi',
                    name: 'deskripsi'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ],
        });
    });


    $(function () {
        $('#add-pricing').on('submit', function (e) {
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
                        $('#tablePricing').DataTable().ajax.reload(null, false);
                        $('#ModalPricing').modal('hide');
                        $('#saveBtn').html('Simpan');
                    }
                }
            });
        });
    });

    $(document).on('click', '#editPricingBtn', function () {
        var pricing_id = $(this).data('id');
        $('.editPricing').find('form')[0].reset();
        $('.editPricing').find('span.error-text').text('');
        $.post('{{ route("get.pricing.edit") }}', {
            pricing_id: pricing_id
        }, function (data) {
            $('.editPricing').find('input[name="pricing_id"]').val(data.details.id);
            $('.editPricing').find('input[name="judul"]').val(data.details
                .judul);
            $('.editPricing').find('input[name="harga"]').val(data.details
                .harga);
            $('.editPricing').find('input[name="deskripsi"]').val(data.details
                .deskripsi);
            $('.editPricing').modal('show');
        }, 'json');
    });

    $('#update-pricing').on('submit', function (e) {
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
                    $('#tablePricing').DataTable().ajax.reload(null, false);
                    $('.editPricing').modal('hide');
                    $('.editPricing').find('form')[0].reset();
                }
            }
        });
    });

    $(document).on('click', '#deletePricingBtn', function () {
        var pricing_id = $(this).data('id');
        var url = '{{ route("delete.pricing") }}';

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
                    pricing_id: pricing_id
                }, function (data) {
                    if (data.code == 1) {
                        $('#tablePricing').DataTable().ajax.reload(null,
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