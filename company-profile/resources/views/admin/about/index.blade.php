@extends('template.master_admin')

@section('title_web')
Data About Landing Page - Bimbel Primago
@endsection

@section('title_content')
About
@endsection

@section('breadcrumbs')
<ul class="breadcrumbs">
    <li class="nav-home">
        <a href="{{ route('admin.dashboard') }}">
            <i class="flaticon-home"></i>
        </a>
    </li>
    <li class="separator">
        <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item">
        <a href="#">Data About</a>
    </li>
    <li class="separator">
        <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item">
        <a href="#">Kelola Data About</a>
    </li>
</ul>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-weight-bold">DataTable About
                    <button type="button" data-toggle="modal" data-target="#ModalAbout"
                        class="btn btn-primary float-right text-white"><i class="fas fa-book mr-2"></i> TAMBAH DATA
                        ABOUT</button>
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tableAbout" class="display table table-striped table-bordered table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Judul</th>
                                <th>Subjudul</th>
                                <th>Link Youtube</th>
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
<div class="modal fade" id="ModalAbout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-primary font-weight-bold" id="exampleModalLabel">Tambah Data About</h4>
                <button type="reset" class="close text-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 id="message" class="text-danger font-weight-bold"></h5>
                <form action="{{ route('add.about') }}" method="POST" id="add-about">
                    @csrf
                    <div class="form-group">
                        <label for="judul">Masukkan Judul About</label>
                        <input type="text" class="form-control" id="judul" name="judul">
                        <span class="text-danger error-text judul_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="subjudul">Masukkan Subjudul About</label>
                        <input type="text" class="form-control" id="subjudul" name="subjudul">
                        <span class="text-danger error-text subjudul_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="link_youtube">Masukkan Link Youtube About</label>
                        <input type="text" class="form-control" id="link_youtube" name="link_youtube">
                        <span class="text-danger error-text link_youtube_error"></span>
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
<div class="modal fade editAbout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form action="{{ route('update.about') }}" method="POST" id="update-about">
@csrf
<div class="form-group">
    <input type="hidden" name="about_id">
    <label for="judul">Edit Judul About</label>
    <input type="text" class="form-control" id="judul" name="judul">
    <span class="text-danger error-text judul_error"></span>
</div>
<div class="form-group">
    <label for="subjudul">Edit Subjudul About</label>
    <input type="text" class="form-control" id="subjudul" name="subjudul">
    <span class="text-danger error-text subjudul_error"></span>
</div>
<div class="form-group">
    <label for="link_youtube">Edit Link Youtube About</label>
    <input type="text" class="form-control" id="link_youtube" name="link_youtube">
    <span class="text-danger error-text link_youtube_error"></span>
</div>
<div class="modal-footer">
    <button type="reset" class="btn btn-danger" data-dismiss="modal" id="btn_close">BATALKAN</button>
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
        var table = $('#tableAbout').DataTable({
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
                url: "{{ route('data.about.ajax') }}",
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
                    data: 'link_youtube',
                    name: 'link_youtube'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ],
        });
    });


    $(function () {
        $('#add-about').on('submit', function (e) {
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
                        $('#tableAbout').DataTable().ajax.reload(null, false);
                        $('#ModalAbout').modal('hide');
                        $('#saveBtn').html('Simpan');
                    }
                }
            });
        });
    });

    $(document).on('click', '#editAboutBtn', function () {
        var about_id = $(this).data('id');
        $('.editAbout').find('form')[0].reset();
        $('.editAbout').find('span.error-text').text('');
        $.post('{{ route("get.about.edit") }}', {
            about_id: about_id
        }, function (data) {
            $('.editAbout').find('input[name="about_id"]').val(data.details.id);
            $('.editAbout').find('input[name="judul"]').val(data.details
                .judul);
            $('.editAbout').find('input[name="subjudul"]').val(data.details
                .subjudul);
            $('.editAbout').find('input[name="link_youtube"]').val(data.details
                .link_youtube);
            $('.editAbout').modal('show');
        }, 'json');
    });

    $('#update-about').on('submit', function (e) {
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
                    $('#tableAbout').DataTable().ajax.reload(null, false);
                    $('.editAbout').modal('hide');
                    $('.editAbout').find('form')[0].reset();
                }
            }
        });
    });

    $(document).on('click', '#deleteAboutBtn', function () {
        var about_id = $(this).data('id');
        var url = '{{ route("delete.about") }}';

        Swal.fire({
            title: "Yakin Ingin Menghapus?",
            text: "Anda Akan Menghapus Data About",
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
                    about_id: about_id
                }, function (data) {
                    if (data.code == 1) {
                        $('#tableAbout').DataTable().ajax.reload(null,
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