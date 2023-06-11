@extends('layout.main')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            @if ($user->id_kelompok_ukt !== null )
            <div class="card-header d-flex justify-content-between mb-4">
                <div class="header-title text-center">
                    <h4 class="card-title ">Anda tidak bisa mengakses form penentuan UKT, karena Anda sudah memiliki kelompok UKT.</h4>
                </div>
            </div>
            @else
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">{{$subTitle}}</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="new-user-info">
                    <form action="@if($form === 'Tambah') /penentuan-ukt @elseif($form === 'Edit') /edit-penentuan-ukt/{{$detail->id_penentuan_ukt}} @endif" method="POST" enctype="multipart/form-data">
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
                        <div class="form-group col-md-12 mt-4">
                            <label class="form-label"><strong>Data Penentaun UKT:</strong></label>
                        </div>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($kriteria as $row)
                        {{-- @php
                            dd($row->bobot);
                        @endphp --}}
                        <div class="form-group col-md-6">
                            <label class="form-label" for="nilai_target{{$no}}">{{ $row->nama_kriteria }} <span class="text-danger">*</span></label>
                            <input type="hidden" name="id_kriteria{{$no}}" value="{{$row->id_kriteria}}">
                            <input type="hidden" name="bobot{{$no}}" value="{{$row->bobot}}">
                            <input type="hidden" name="ideal{{$no}}" value="{{$row->ideal}}">
                            <select name="nilai_target{{$no}}" id="nilai_target{{$no}}" class="selectpicker form-control" data-style="py-0" required>
                                <option>-- Pilih --</option>
                                @foreach ($nilaiKriteria as $item)
                                    @if ($item->id_kriteria == $row->id_kriteria)
                                        <option value="{{$item->ukt}}">{{$item->nilai_kriteria}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('nilai_target{{$no}}')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        @php
                        $no = $no+1;
                        @endphp
                        @endforeach

                        @if ($setting->form_penentuan_slip_gaji == 1 || $setting->form_penentuan_struk_listrik == 1 || $setting->form_penentuan_struk_air == 1 || $setting->form_penentuan_kk == 1)
                        <div class="form-group col-md-12 mt-4">
                            <label class="form-label"><strong>Data Berkas Pendukung <span class="text-danger">* Harus diisi sesuai dengan data yang dimiliki</span></strong></label>
                        </div>
                        @endif
                        @if ($setting->form_penentuan_slip_gaji == 1)
                            <div class="form-group col-md-6">
                                <label class="form-label" for="slip_gaji">Slip Gaji Orang Tua (Opsional) <span class="text-danger">* PDF</span></label>
                                <input type="file" class="form-control @error('slip_gaji') is-invalid @enderror" id="slip_gaji" name="slip_gaji" placeholder="Masukkan Foto Rumah" required>
                                @error('slip_gaji')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        @endif
                        @if ($setting->form_penentuan_struk_listrik == 1)
                            <div class="form-group col-md-6">
                                <label class="form-label" for="struk_llistrik">Rekening Listrik (Maksimal 3 bulan terakhir) <span class="text-danger">* PDF</span></label>
                                <input type="file" class="form-control @error('struk_llistrik') is-invalid @enderror" id="struk_llistrik" name="struk_llistrik" placeholder="Masukkan Foto Rumah" required>
                                @error('struk_llistrik')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        @endif
                        @if ($setting->form_penentuan_struk_air == 1)
                            <div class="form-group col-md-6">
                                <label class="form-label" for="struk_air">Rekening Air (Maksimal 3 bulan terakhir) <span class="text-danger">* PDF</span></label>
                                <input type="file" class="form-control @error('struk_air') is-invalid @enderror" id="struk_air" name="struk_air" placeholder="Masukkan Foto Rumah" required>
                                @error('struk_air')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        @endif
                        @if ($setting->form_penentuan_kk == 1)
                            <div class="form-group col-md-6">
                                <label class="form-label" for="kk">Kartu Keluarga <span class="text-danger">* PDF</span></label>
                                <input type="file" class="form-control @error('kk') is-invalid @enderror" id="kk" name="kk" placeholder="Masukkan Foto Rumah" required>
                                @error('kk')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        @endif
                    </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                        @if ($form == 'Edit')
                            <a href="/informasi-pengajuan-penurunan-ukt/{{$detail->id_penurunan_ukt}}"" class="btn btn-secondary">Kembali</a>
                        @endif
                    </form>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection