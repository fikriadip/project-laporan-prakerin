@extends('template.master_admin')

@section('title_web')
Detail Data Details Landing Page - Bimbel Primago
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
        <a href="#">Detail Data Details</a>
    </li>
</ul>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title font-weight-bold">Detail Data Details
                    <a href="{{route('data.details')}}" class="btn btn-primary float-right text-white"><i
                            class="fas fa-hand-point-left mr-2"></i> KEMBALI</a>
                </h4>
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-xl-4 col-lg-5 col-md-12 col-sm-12 col-12">
            <img src="{{ "data:image/" . $showDetails->imageType . ";base64," . $showDetails->image }}" class="card-img shadow-sm" alt="Details Image">
                    </div>
                    <div class="col-lg-1 mb-4"></div>
                    <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-12">
                        <h4 class="card-title card-text mb-2"><strong>Judul :</strong> {{$showDetails->judul}}</h4>
                        <h4 class="card-title card-text mb-2"><strong>Subjudul :</strong> {{$showDetails->subjudul}}</h4>
                        <h4 class="card-title card-text mb-2"><strong>Penjelasan 1 :</strong> {{$showDetails->penjelasan1}}</h4>
                        <h4 class="card-title card-text mb-2"><strong>Penjelasan 2 :</strong> {{$showDetails->penjelasan2}}</h4>
                        <h4 class="card-title card-text mb-2"><strong>Penjelasan 3 :</strong> {{$showDetails->penjelasan3}}</h4>
                        <h4 class="card-title card-text mb-2"><strong>Penjelasan 4 :</strong> {{$showDetails->penjelasan4}}</h4>
                        <h4 class="card-title card-text mb-2"><strong>Paragraf :</strong> {{$showDetails->paragraf}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
