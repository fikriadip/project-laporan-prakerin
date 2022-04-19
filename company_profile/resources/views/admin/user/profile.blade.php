@extends('partial.master_admin')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-with-nav">
            <div class="card-header">
                <div class="row row-nav-line">
                    <ul class="nav nav-tabs nav-line nav-color-secondary w-100 pl-3" role="tablist">
                        <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Sunting Profile</a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-selected="false">Change Password</a> </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name" value="Hizrian">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Name" value="hello@example.com">
                        </div>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Address</label>
                            <input type="file" class="form-control" value="st Merdeka Putih, Jakarta Indonesia" name="address" placeholder="Address">
                        </div>
                    </div>
                </div>
                
                <div class="text-right mt-3 mb-3">
                    <button class="btn btn-round btn-danger mr-2" type="reset"><i class="fas fa-undo has-icon mr-2 text-white"></i>BATAL</button>
                    <button class="btn btn-round mr-2" type="submit" style="background-color: #1572e8; color: #fff;"><i class="fas fa-save has-icon mr-2 text-white"></i>SIMPAN</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-profile">
            <div class="card-header" style="background-image: url('../assets/img/blogpost.jpg')">
                <div class="profile-picture">
                    <div class="avatar avatar-xl">
                        <img src="{{asset('images/avatar_default.png')}}" alt="Foto Admin" class="avatar-img rounded-circle">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="user-profile text-center">
                    <div class="name">Hizrian, 19</div>
                    <div class="job">Frontend Developer</div>
                    <div class="desc">A man who hates loneliness</div>
                    <div class="view-profile">
                        <a href="#" class="btn btn-secondary btn-block">View Full Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection