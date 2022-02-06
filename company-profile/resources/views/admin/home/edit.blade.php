<!-- Edit Modal -->
<div class="modal fade editHome" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-primary font-weight-bold" id="exampleModalLabel">Edit Management Home</h4>
                <button type="reset" class="close text-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 id="message" class="text-danger font-weight-bold"></h5>
                <form action="{{ route('update.home') }}" method="POST" id="update-home" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                     <input type="hidden" name="home_id">
                        <label for="judul">Masukkan Judul Home</label>
                        <input type="text" class="form-control" id="judul" name="judul">
                        <span class="text-danger error-text judul_error"></span>
                        {{-- @error('judul')
                            <div class="alert alert-danger font-weight-bold alert-dismissible fade show" role="alert">
                                
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @enderror --}}
                    </div>
                    <div class="form-group">
                        <label for="subjudul">Masukkan Subjudul Home</label>
                        <input type="text" class="form-control" id="subjudul" name="subjudul">
                        <span class="text-danger error-text subjudul_error"></span>
                        {{-- @error('subjudul')
                            <div class="alert alert-danger font-weight-bold alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @enderror --}}
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Masukkan Deskripsi Home</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                        <span class="text-danger error-text deskripsi_error"></span>
                        {{-- @error('deskripsi')
                            <div class="alert alert-danger font-weight-bold alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @enderror --}}
                    </div>
                    <div class="form-group">
                        <label for="image">Masukkan Foto/Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image" lang="es"
                                onchange="previewFile(this)">
                            <label class="custom-file-label" for="image">Pilih image</label>
                        </div>
                        <span class="text-danger error-text image_error"></span>
                        <img id="previewImg" style="max-width: 180px; margin-top: 20px;">
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger" data-dismiss="modal"
                            id="btn_close">Batalkan</button>
                        <button type="submit" id="saveBtn" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>