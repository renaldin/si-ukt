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
                    <form action="@if($form === 'Tambah') pengajuan-penangguhan-ukt @elseif($form === 'Edit') edit-pengajuan-penangguhan-ukt/{{$detail->id_penangguhan_ukt}} @endif" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label" for="nama_mahasiswa">Nama Mahasiswa</label>
                            <input type="text" class="form-control @error('nama_mahasiswa') is-invalid @enderror" id="nama_mahasiswa" name="nama_mahasiswa" value="{{ $user->nama_mahasiswa }}" readonly placeholder="Masukkan Nama Lengkap ">
                            @error('nama_mahasiswa')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="nim">NIM</label>
                            <input type="number" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" value="{{ $user->nim }}" readonly placeholder="Masukkan NIM ">
                            @error('nim')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="program_studi">Program Studi</label>
                            <input type="text" class="form-control @error('program_studi') is-invalid @enderror" id="program_studi" name="program_studi" value="{{ $user->prodi }}" readonly placeholder="Masukkan Program Studi ">
                            @error('program_studi')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="nomor_telepon">No. HP</label>
                            <input type="number" class="form-control @error('nomor_telepon') is-invalid @enderror" id="nomor_telepon" name="nomor_telepon" value="{{ $user->nomor_telepon }}" readonly placeholder="Masukkan No. HP ">
                            @error('nomor_telepon')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label class="form-label"><strong>Orang Tua/Wali dari Mahasiswa Politeknik Negeri Subang:</strong></label>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="nama_orang_tua">Nama Orang Tua/Wali <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nama_orang_tua') is-invalid @enderror" id="nama_orang_tua" name="nama_orang_tua" value="@if($form === 'Tambah'){{ old('nama_orang_tua') }}@elseif($form === 'Edit'){{$detail->nama_orang_tua}}@endif" autofocus placeholder="Masukkan Nama Orang Tua/Wali">
                            @error('nama_orang_tua')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="alamat_orang_tua">Alamat <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('alamat_orang_tua') is-invalid @enderror" id="alamat_orang_tua" name="alamat_orang_tua" value="@if($form === 'Tambah'){{ old('alamat_orang_tua') }}@elseif($form === 'Edit'){{$detail->alamat_orang_tua}}@endif" placeholder="Masukkan Alamat">
                            @error('alamat_orang_tua')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="nomor_telepon_orang_tua">No. HP <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('nomor_telepon_orang_tua') is-invalid @enderror" id="nomor_telepon_orang_tua" name="nomor_telepon_orang_tua" value="@if($form === 'Tambah'){{ old('nomor_telepon_orang_tua') }}@elseif($form === 'Edit'){{$detail->nomor_telepon_orang_tua}}@endif" placeholder="Masukkan No. HP">
                            @error('nomor_telepon_orang_tua')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label class="form-label"><strong>Data Tambahan:</strong></label>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="nominal_ukt">Nominal UKT</label>
                            <input type="text" class="form-control @error('nominal_ukt') is-invalid @enderror" id="nominal_ukt" name="nominal_ukt" value="{{ $user->nominal }}" readonly placeholder="Masukkan Nominal UKT ">
                            @error('nominal_ukt')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="denda">Nominal Denda (5% dari Nominal UKT)</label>
                            <input type="text" class="form-control @error('denda') is-invalid @enderror" id="denda" name="denda" value="{{ $user->nominal * 5 / 100 }}" readonly placeholder="Masukkan Nominal Denda ">
                            @error('denda')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="semester">Semester <span class="text-danger">*</span></label>
                            <select name="semester" id="semester" class="selectpicker form-control @error('semester') is-invalid @enderror" data-style="py-0">
                                @if ($form === 'Tambah')
                                    <option>-- Pilih --</option>
                                @elseif($form === 'Edit')
                                    <option value="{{$detail->semester}}">{{$detail->semester}}</option>
                                @endif
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                            @error('semester')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="alasan">Alasan Penangguhan UKT <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('alasan') is-invalid @enderror" id="alasan" name="alasan" value="@if($form === 'Tambah'){{ old('alasan') }}@elseif($form === 'Edit'){{$detail->alasan}}@endif" placeholder="Masukkan Alasan Penangguhan UKT ">
                            @error('alasan')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="angsuran_pertama">Angsuran Pertama (Rp) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('angsuran_pertama') is-invalid @enderror" id="angsuran_pertama" name="angsuran_pertama" value="@if($form === 'Tambah') {{ old('angsuran_pertama') }} @elseif($form === 'Edit') {{$detail->angsuran_pertama}} @endif" placeholder="Masukkan Angsuran Pertama ">
                            @error('angsuran_pertama')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="tanggal_angsuran_pertama">Tanggal Angsuran Pertama <span class="text-danger">*</span></label>
                            <input type="date" class="form-control @error('tanggal_angsuran_pertama') is-invalid @enderror" id="tanggal_angsuran_pertama" name="tanggal_angsuran_pertama" value="@if($form === 'Tambah') {{ old('tanggal_angsuran_pertama') }} @elseif($form === 'Edit') {{$detail->tanggal_angsuran_pertama}} @endif" placeholder="Masukkan Tanggal Angsuran Pertama ">
                            @error('tanggal_angsuran_pertama')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="angsuran_kedua">Angsuran Kedua (Rp) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('angsuran_kedua') is-invalid @enderror" id="angsuran_kedua" name="angsuran_kedua" value="@if($form === 'Tambah') {{ old('angsuran_kedua') }} @elseif($form === 'Edit') {{$detail->angsuran_kedua}} @endif" placeholder="Masukkan Angsuran Kedua ">
                            @error('angsuran_kedua')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="tanggal_angsuran_kedua">Tanggal Angsuran Kedua <span class="text-danger">*</span></label>
                            <input type="date" class="form-control @error('tanggal_angsuran_kedua') is-invalid @enderror" id="tanggal_angsuran_kedua" name="tanggal_angsuran_kedua" value="@if($form === 'Tambah') {{ old('tanggal_angsuran_kedua') }} @elseif($form === 'Edit') {{$detail->tanggal_angsuran_kedua}} @endif" placeholder="Masukkan Tanggal Angsuran Kedua ">
                            @error('tanggal_angsuran_kedua')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <a href="/riwayat-penangguhan-ukt" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection