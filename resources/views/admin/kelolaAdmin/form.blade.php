@extends('layout.main')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">{{$subTitle}}</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="new-user-info">
                    <form action="@if($form === 'Tambah') /tambah-admin @elseif($form === 'Edit') /edit-admin/{{$detail->id_admin}} @endif" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label" for="nama_admin">Nama Lengkap</label>
                            <input type="text" class="form-control @error('nama_admin') is-invalid @enderror" id="nama_admin" name="nama_admin" value="@if($form === 'Tambah'){{ old('nama_admin') }}@elseif($form === 'Edit' || $form === 'Detail'){{$detail->nama_admin}}@endif" @if($form === 'Detail') disabled @endif autofocus placeholder="Masukkan Nama Lengkap ">
                            @error('nama_admin')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="@if($form === 'Tambah'){{ old('email') }}@elseif($form === 'Edit' || $form === 'Detail'){{$detail->email}}@endif" @if($form === 'Detail') disabled @endif placeholder="Masukkan Email ">
                            @error('email')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" @if($form === 'Detail') disabled @endif placeholder="Masukkan Password ">
                            @error('password')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="foto">Foto</label>
                            <input type="file" class="form-control @error('foto_user') is-invalid @enderror" id="preview_image" name="foto_user" @if($form === 'Detail') disabled @endif>
                            @error('foto_user')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="foto_user"></label>
                            <div class="profile-img-edit position-relative">
                                <img src="@if($form === 'Tambah') {{ asset('foto_user/default1.jpg') }} @elseif($form === 'Edit' || $form === 'Detail') {{ asset('foto_user/'.$detail->foto_user) }} @endif" alt="profile-pic" id="load_image" class="theme-color-default-img profile-pic rounded avatar-100">
                            </div>
                        </div>
                    </div>
                        @if ($form === 'Detail')
                            <a href="/daftar-admin" class="btn btn-primary">Daftar Admin</a>
                            @else
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection