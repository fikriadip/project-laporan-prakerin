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
                        <label for="judul">Edit Judul Home</label>
                        <input type="text" class="form-control" id="judul" name="judul">
                        <span class="text-danger error-text judul_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="subjudul">Edit Subjudul Home</label>
                        <input type="text" class="form-control" id="subjudul" name="subjudul">
                        <span class="text-danger error-text subjudul_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Edit Deskripsi Home</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                        <span class="text-danger error-text deskripsi_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="image">Edit Foto - Kosongkan Bila Sama</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image" lang="es"
                                onchange="previewFile(this)">
                            <label class="custom-file-label" for="image">Pilih Foto</label>
                        </div>
                        <span class="text-danger error-text image_error"></span>
                        <img id="previewImg" style="max-width: 180px; margin-top: 20px;">
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