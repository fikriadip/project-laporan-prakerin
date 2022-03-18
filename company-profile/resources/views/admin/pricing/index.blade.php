@extends('partial.master_admin')

@section('title_web')
Data Pricing Landing Page - Bimbel Primago
@endsection

@section('dashboard')
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold"><i class="icon-wallet mr-2"></i> Pricing Landing Page</h2>
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
                    <h4 class="card-title font-weight-bold">Data Pricing
                        <button type="button" data-toggle="modal" data-target="#ModalPricing"
                            class="btn btn-primary float-right btn-round text-white"><i class="fas fa-plus mr-2"></i>
                            TAMBAH DATA
                            PRICING</button>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tablePricing" class="display table table-striped table-hover bg-light">
                            <thead>
                                <tr class="text-center text-primary">
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
            <div class="row">
                <div class="col-12">
                    <div class="card"
                        style="border: none; box-shadow: 0 1px 41px rgba(0, 0, 0, 12%); border-radius: 16px;">
                        <div class="text-center mb-2">
                            <h3 class="font-weight-bold mt-5">TAMBAH DATA PRICING
                            </h3>
                        </div>
                        <div class="card-body mt-2">
                            <div class="modal-content">
                                <form action="{{ route('add.pricing') }}" method="POST" id="add-pricing">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="judul" class="form-label h6 font-weight-bold">Masukkan Judul
                                            Pricing</label>
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
                                        <label for="harga" class="form-label h6 font-weight-bold">Masukkan Kalkulasi
                                            Harga</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-money-check ml-1"></i>
                                                </div>
                                            </div>
                                            <input type="text" id="harga" class="form-control input-custom"
                                                name="harga" />
                                        </div>
                                        <span class="text-danger error-text harga_error"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label h6 font-weight-bold">Masukkan Deskripsi
                                            Pricing</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-comment-alt ml-1"></i>
                                                </div>
                                            </div>
                                            <input type="text" id="deskripsi" class="form-control input-custom"
                                                name="deskripsi" />
                                        </div>
                                        <span class="text-danger error-text deskripsi_error"></span>
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
    <div class="modal fade editPricing" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="row">
                <div class="col-12">
                    <div class="card"
                        style="border: none; box-shadow: 0 1px 41px rgba(0, 0, 0, 12%); border-radius: 16px;">
                        <div class="text-center mb-2">
                            <h3 class="font-weight-bold mt-5">EDIT MANAGEMENT PRICING
                            </h3>
                        </div>
                        <div class="card-body mt-2">
                            <div class="modal-content">
                                <form action="{{ route('update.pricing') }}" method="POST" id="update-pricing">
                                    @csrf
                                    <input type="hidden" name="pricing_id">
                                    <div class="mb-3">
                                        <label for="judul" class="form-label h6 font-weight-bold">Edit Judul
                                            Pricing</label>
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
                                        <label for="harga" class="form-label h6 font-weight-bold">Edit Harga</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-money-check ml-1"></i>
                                                </div>
                                            </div>
                                            <input type="text" id="harga" class="form-control input-custom"
                                                name="harga" />
                                        </div>
                                        <span class="text-danger error-text harga_error"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label h6 font-weight-bold">Edit Deskripsi
                                            Pricing</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-comment-alt ml-1"></i>
                                                </div>
                                            </div>
                                            <input type="text" id="deskripsi" class="form-control input-custom"
                                                name="deskripsi" />
                                        </div>
                                        <span class="text-danger error-text deskripsi_error"></span>
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
                            $(form).find('span.' + prefix + '_error').text(val[
                                0]);
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