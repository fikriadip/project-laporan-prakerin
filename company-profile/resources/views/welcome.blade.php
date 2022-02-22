@extends('template.master_ruangan')

@section('title_web')
Create Data Ruangan
@endsection

@section('title_content')
<div class="section-header-back">
    <a href="/ruangan" class="btn btn-icon mr-2" title="Back"><i class="fas fa-arrow-left"></i></a>
    Create Data Ruangan
</div>
@endsection

@section('breadcrumb')
<div class="breadcrumb-item active"><a href="/ruangan">Data Ruangan & Meja</a></div>
<div class="breadcrumb-item">Create Ruangan</div>
@endsection

@section('content')
<style>
    .divcustom {
        position: absolute;
        top: 0;
        height: 3%;
        width: 3%;
        background-size: contain;
        background-image: url('Denah/PC-38.svg');
        background-repeat: no-repeat;
    }

    .map-background {
        position: relative;
        background-color: #ffffff;
        border: 2px solid #4070f4;
        height: 63vh;
        overflow: hidden;
    }
</style>

<div class="row justify-content-center mt-5">
    <div class="col-xl-7 col-lg-7 col-md-10 col-12">
        <div class="card shadow">

            <div style="z-index: 80;" class="card-header bg-primary justify-content-center text-white">
                <h5>Denah Ruangan Dan Meja</h5>
            </div>
            <div class="map-background">
                <div id="parentdiv">
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-5 col-lg-5 col-md-10 col-12" style="z-index: 80;">
        <div class="card shadow">
            <div class="card-header bg-primary justify-content-center text-white">
                <h5>Form Ruangan</h5>
            </div>
            <div class="card-body">
                <form id="btn-ss" enctype="multipart/form-data" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="id_cabang" class="form-label h6 font-weight-bold">Cabang Perusahaan</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-address-card m-1"></i>
                                </div>
                            </div>
                            <select class="custom-select form-control input-custom" id="id_cabang" name="id_cabang">
                                <option selected disabled>Pilih Cabang Perusahaan</option>
                                <?php
                                            $get = DB::table('detail_perusahaans')->get();
                                        ?>
                                @foreach ($get as $detail)
                                <option value="{{ $detail->id }}">{{ $detail->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <span class="text-danger error-text id_cabang_error"></span>
                    </div>

                    <div class="mb-3">
                        <label for="ruangans_name" class="form-label h6 font-weight-bold">Nama Lantai Ruangan</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-address-card m-1"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control input-custom" name="ruangans_name" id="ruangans_name"
                                value="{{ old('ruangans_name') }}">
                        </div>
                        <span class="text-danger error-text ruangans_name_error"></span>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_operasi" class="form-label h6 font-weight-bold">Tanggal Operasi
                            Ruangan</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-address-card m-1"></i>
                                </div>
                            </div>
                            <input type="date" class="form-control input-custom" name="tanggal_operasi"
                                id="tanggal_operasi" value="{{ old('tanggal_operasi') }}">
                        </div>
                        <span class="text-danger error-text tanggal_operasi_error"></span>
                    </div>
                    <span class="btn btn-primary btn-circle m-2" id="btnid"> <i class="fas fa-plus"></i></span>
                    <span class="btn btn-danger btn-circle m-2" id="removeMarks"><i class="fas fa-trash"></i></span>
                    <select id="height">
                        <option value="3%">0.3</option>
                        <option value="5%">0.5</option>
                        <option value="10%">1</option>
                        <option value="15%">1.5</option>
                        <option value="20%">2</option>
                        <option value="25%">2.5</option>
                        <option value="30%">3</option>
                        <option value="35%">3.5</option>
                    </select>
                    <div class="row">
                        <div class="col-6">
                            <button id="submit" class="btn-save text-white btn-block font-weight-bold mt-3"
                                style="font-size: 18px; height:50px; outline:none;">SIMPAN</button>
                        </div>
                        <div class="col-6">
                            <input type="reset" onClick="refreshPage()"
                                class="btn-reset text-white btn-block font-weight-bold mt-3"
                                style="font-size: 18px; height:50px;" value="BATAL">
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('script')

<script>
    function refreshPage() {
        window.location.reload();
    }

    var tmpdata = 1;
    var tmpCoordinate = [];
    // var tmpCoordinate2 = [];

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(function () {
                $('#btn-ss').on('submit', function (e) {
                    e.preventDefault();
                    // var form = this;
                    var ruangans_name = $("input[name=ruangans_name]").val();
                    var tanggal_operasi = $("input[name=tanggal_operasi]").val();
                    var id_cabang = $("select[name=id_cabang]").val();
                    var mejas_list = tmpCoordinate;
                    var url = '{{ url('
                    addruangan ') }}';
                    $('#submit').html('Sedang Mengirim...');

                    if (ruangans_name.length == "") {

                        swal({
                            type: 'warning',
                            title: 'Oops...',
                            text: 'Nama Lengkap Wajib Diisi !'
                        });

                    } else if (tanggal_operasi.length == "") {

                        swal({
                            type: 'warning',
                            title: 'Oops...',
                            text: 'Username Wajib Diisi !'
                        });

                    } else if (id_cabang.length == "") {

                        swal({
                            type: 'warning',
                            title: 'Oops...',
                            text: 'Password Wajib Diisi !'
                        });

                    } else {
                        $.ajax({
                            url: url,
                            method: 'POST',
                            data: {
                                mejas_list: mejas_list,
                                ruangans_name: ruangans_name,
                                tanggal_operasi: tanggal_operasi,
                                id_cabang: id_cabang
                            },
                            // processData: false,
                            // dataType: 'json',
                            // contentType: false,

                            success: function (data) {
                                swal({
                                    icon: 'success',
                                    title: data.status,
                                    text: data.message,
                                    timer: 1200
                                });
                                $('#submit').html('Simpan');
                            }
                        });
                    }
                });

                $(document).ready(function () {
                    $("#height").change(function () {
                        var selectedcolor = $('#height').val();
                        $(".divcustom").css({
                            "height": selectedcolor
                        });
                        $(".divcustom").css({
                            "width": selectedcolor
                        });
                    });
                });

                var sampleData =
                    '';

                $('#btnid').click(function () {
                    var idbaru = document.getElementById('div' + tmpdata);

                    if (idbaru == null) {
                        var size = $('#height').val();
                        var structure = $(
                            '<div class="divcustom" style="height: ' + size + '; width: ' + size +
                            ';" id="div' +
                            tmpdata + '">' + tmpdata + '</div>'
                        );
                        $('#parentdiv').append(structure);
                        tmpdata++;
                        refreshTmpArr();
                    } else {

                        var structure = $(
                            '<div class="divcustom" id="div' + tmpdata + '">coba' + tmpdata + '</div>'
                        );
                        $('#' + tmpdata).after(structure);
                        tmpdata++;
                        refreshTmpArr();
                    }

                });

                $('#removeMarks').click(function () {
                    try {
                        var lastEl = tmpCoordinate[tmpCoordinate.length - 1];
                        const myArray = lastEl.split('d="');
                        const final = myArray[1].split('"');
                        // alert(final[0]);
                        $('#' + final[0]).remove();
                        tmpdata--;
                        refreshTmpArr();
                    } catch (error) {
                        console.log('dasong');
                    }
                });


                // let tmpSampleData = sampleData.split(',');
                // tmpCoordinate2.splice(0, tmpCoordinate2.length);
                // for (let div of tmpSampleData) {
                //     div.onmousedown = onMouseDown;
                //     if (tmpCoordinate2.includes(div.outerHTML) === false) {
                //         tmpCoordinate2.push(div.outerHTML);
                //     }

                //     if (tmpdata == 1) {
                //         $('#parentdiv').append($(div));
                //     } else {
                //         $('#parentdiv').append($(div));
                //     }
                //     tmpdata++;
                //     refreshTmpArr();
                // }

                document.onmousemove = onMouseMove;
                document.onmouseup = onMouseUp;
                var heightRatio = 1.5;
                var the_moving_div = '';
                var the_last_mouse_position = {
                    x: 0,
                    y: 0
                };

                function refreshTmpArr() {
                    divs = document.getElementsByClassName("divcustom");

                    tmpCoordinate.splice(0, tmpCoordinate.length);
                    for (let div of divs) {
                        div.onmousedown = onMouseDown;
                        if (tmpCoordinate.includes(div.outerHTML) === false) {
                            tmpCoordinate.push(div.outerHTML);
                        }
                    }

                    document.onmousemove = onMouseMove;
                    document.onmouseup = onMouseUp;
                    var heightRatio = 1.5;

                    var the_moving_div = '';
                    var the_last_mouse_position = {
                        x: 0,
                        y: 0
                    };
                }

                // function loadData() {
                //     let tmpSampleData = sampleData.split(',');
                //     tmpCoordinate2.splice(0, tmpCoordinate2.length);
                //     for (let div of tmpSampleData) {
                //         div.onmousedown = onMouseDown;
                //         if (tmpCoordinate2.includes(div.outerHTML) === false) {
                //             tmpCoordinate2.push(div.outerHTML);
                //         }
                //     }

                //     document.onmousemove = onMouseMove;
                //     document.onmouseup = onMouseUp;
                //     var heightRatio = 1.5;
                //     var the_moving_div = '';
                //     var the_last_mouse_position = {
                //         x: 0,
                //         y: 0
                //     };
                // }

                function onMouseDown(e) {
                    e.preventDefault();
                    the_moving_div = e.target.id; // remember which div has been selected 
                    the_last_mouse_position.x = e.clientX; // remember where the mouse was when it was clicked
                    the_last_mouse_position.y = e.clientY;
                    e.target.style.border = "2px solid blue"; // highlight the border of the div

                    var divs = document.getElementsByTagName("div");
                    e.target.style.zIndex = divs.length; // put this div  on top
                    var i = 1;
                    for (div of divs)
                        if (div.id != the_moving_div); // put all other divs behind the selected one
                }

                function onMouseMove(e) {
                    e.preventDefault();
                    if (the_moving_div == "") return;
                    var d = document.getElementById(the_moving_div);
                    d.style.left = d.offsetLeft + e.clientX - the_last_mouse_position.x +
                        "px"; // move the div by however much the mouse moved
                    d.style.top = d.offsetTop + e.clientY - the_last_mouse_position.y + "px";
                    the_last_mouse_position.x = e.clientX; // remember where the mouse is now
                    the_last_mouse_position.y = e.clientY;
                }

                function onMouseUp(e) {
                    e.preventDefault();
                    if (the_moving_div == "") return;
                    document.getElementById(the_moving_div).style.border = "none"; // hide the border again
                    the_moving_div = "";
                    refreshTmpArr();
                }
</script>
@endpush

@endsection