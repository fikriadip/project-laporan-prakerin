@extends('template.master_admin')

@section('title_web')
Data Teams Landing Page - Bimbel Primago
@endsection

@section('title_content')
Teams
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
        <a href="#">Data Teams</a>
    </li>
    <li class="separator">
        <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item">
        <a href="#">Kelola Data Teams</a>
    </li>
</ul>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-weight-bold">DataTable Teams
                    <button type="button" data-toggle="modal" data-target="#ModalTeam"
                        class="btn btn-primary float-right text-white"><i class="fas fa-book mr-2"></i> TAMBAH DATA
                        TEAMS</button>
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tableTeam" class="display table table-striped table-bordered table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Foto Teams</th>
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
<div class="modal fade" id="ModalTeam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-primary font-weight-bold" id="exampleModalLabel">Tambah Data Teams</h4>
                <button type="reset" class="close text-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 id="message" class="text-danger font-weight-bold"></h5>
                <form action="{{ route('add.team') }}" method="POST" id="add-team" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Masukkan Nama Teams</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                        <span class="text-danger error-text nama_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Masukkan Jabatan Teams</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan">
                        <span class="text-danger error-text jabatan_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="foto">Masukkan Foto Teams</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto" name="foto" lang="es"
                                onchange="previewFile(this)">
                            <label class="custom-file-label" for="foto">Pilih Foto</label>
                            <span class="text-danger error-text foto_error"></span>
                        </div>
                        <img id="previewImg" style="max-width: 190px;" class="mt-3 shadow-sm">
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
<div class="modal fade editTeam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-primary font-weight-bold" id="exampleModalLabel">Edit Management Teams</h4>
                <button type="reset" class="close text-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 id="message" class="text-danger font-weight-bold"></h5>
                <form action="{{ route('update.team') }}" method="POST" id="update-team" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="team_id">
                        <label for="nama">Edit Nama Teams</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                        <span class="text-danger error-text nama_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Edit Jabatan Teams</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan">
                        <span class="text-danger error-text jabatan_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="foto">Edit Foto Teams</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto" name="foto" lang="es"
                                onchange="previewFile(this)">
                            <label class="custom-file-label" for="foto">Pilih Foto</label>
                            <span class="text-danger error-text foto_error"></span>
                        </div>
                        <img id="previewImg" style="max-width: 190px;" class="mt-3 shadow-sm">
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
        var table = $('#tableTeam').DataTable({
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
                url: "{{ route('data.team.ajax') }}",
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
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'jabatan',
                    name: 'jabatan'
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
        $('#add-team').on('submit', function (e) {
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
                        $('#tableTeam').DataTable().ajax.reload(null, false);
                        $('#ModalTeam').modal('hide');
                        $('#saveBtn').html('Simpan');
                    }
                }
            });
        });
    });

    $(document).on('click', '#editTeamBtn', function () {
        var team_id = $(this).data('id');
        $('.editTeam').find('form')[0].reset();
        $('.editTeam').find('span.error-text').text('');
        $.post('{{ route("get.team.edit") }}', {
            team_id: team_id
        }, function (data) {
            $('.editTeam').find('input[name="team_id"]').val(data.details.id);
            $('.editTeam').find('input[name="nama"]').val(data.details
                .nama);
            $('.editTeam').find('input[name="jabatan"]').val(data.details
                .jabatan);
            $('.editTeam').modal('show');
        }, 'json');
    });

    $('#update-team').on('submit', function (e) {
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
                    $('#tableTeam').DataTable().ajax.reload(null, false);
                    $('.editTeam').modal('hide');
                    $('.editTeam').find('form')[0].reset();
                }
            }
        });
    });

    $(document).on('click', '#deleteTeamBtn', function () {
        var team_id = $(this).data('id');
        var url = '{{ route("delete.team") }}';

        Swal.fire({
            title: "Yakin Ingin Menghapus?",
            text: "Anda Akan Menghapus Data Teams",
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
                    team_id: team_id
                }, function (data) {
                    if (data.code == 1) {
                        $('#tableTeam').DataTable().ajax.reload(null,
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