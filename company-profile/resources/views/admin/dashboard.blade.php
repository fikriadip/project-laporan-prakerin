@extends('template.master_admin')

@section('title_web')
Admin Dashboard - Bimbel Primago
@endsection

@section('dashboard')
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Dashboard Laporan Masyarakat Tahun {{Carbon\Carbon::now()->format('Y')}}</h2>
                <br>
            </div>
        </div>
    </div>
</div>

<div class="page-inner mt--5">

    <div class="row">
        <div class="col-sm-6 col-md-4">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                <i class="flaticon-file"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Total Pengaduan {{Carbon\Carbon::now()->format('Y')}}</p>
                                <h4 class="card-title">4 Laporan</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-info bubble-shadow-small">
                                <i class="flaticon-profile"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Jumlah Petugas</p>
                                <h4 class="card-title">3 Orang</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-danger bubble-shadow-small">
                                <i class="flaticon-users"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Jumlah Masyarakat</p>
                                <h4 class="card-title">2 Orang</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card card-dark bg-primary-gradient">
                <div class="card-body pb-0">
                    <h2 class="mb-2">Laporan Di Proses</h2>
                    <p>Bulan {{Carbon\Carbon::now()->format('F')}} <br> <span class="count_duration">1</span></p>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-dark bg-success-gradient">
                    <div class="card-body pb-0">
                        <h2 class="mb-2">Laporan Di Tanggapi</h2>
                        <p>Bulan {{Carbon\Carbon::now()->format('F')}} <br> <span class="count_duration">2</span></p>
                       
                    </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-dark bg-danger-gradient">
                <div class="card-body pb-0">
                    <h2 class="mb-2">Laporan Di Tolak</h2>
                    <p>Bulan {{Carbon\Carbon::now()->format('F')}} <br> <span class="count_duration">2</span></p>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <div class="card-head-row justify-content-center">
                        <div class="card-title">STATISTIK LAPORAN PENGADUAN</div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-container" style="min-height: 375px">
                        <canvas id="pengaduan_pertahun"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @push('script')

    <script>
        $('.count_duration').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 3700,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});
</script>
    @endpush
    @endsection