@extends('layout.main')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">{{$subTitle}}</h4>
                </div>
                <div class="header-title">
                    <a href="" class="btn btn-primary">Cetak Semua</a>
                </div>
            </div>
            <div class="card-body px-4" style="margin-bottom: -50px;">
                @if (session('success'))
                    <div class="col-lg-12">
                        <div class="alert bg-primary text-white alert-dismissible">
                            <span>
                                <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M11.9846 21.606C11.9846 21.606 19.6566 19.283 19.6566 12.879C19.6566 6.474 19.9346 5.974 19.3196 5.358C18.7036 4.742 12.9906 2.75 11.9846 2.75C10.9786 2.75 5.26557 4.742 4.65057 5.358C4.03457 5.974 4.31257 6.474 4.31257 12.879C4.31257 19.283 11.9846 21.606 11.9846 21.606Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M9.38574 11.8746L11.2777 13.7696L15.1757 9.86963" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>                            
                                {{ session('success') }}
                            </span>
                        </div>
                    </div>
                @endif
                @if (session('fail'))
                    <div class="col-lg-12">
                        <div class="alert bg-danger text-white alert-dismissible">
                            <span>
                                <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9852 21.606C11.9852 21.606 19.6572 19.283 19.6572 12.879C19.6572 6.474 19.9352 5.974 19.3192 5.358C18.7042 4.742 12.9912 2.75 11.9852 2.75C10.9792 2.75 5.26616 4.742 4.65016 5.358C4.03516 5.974 4.31316 6.474 4.31316 12.879C4.31316 19.283 11.9852 21.606 11.9852 21.606Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M13.864 13.8249L10.106 10.0669" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M10.106 13.8249L13.864 10.0669" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                {{ session('fail') }}
                            </span>
                        </div>
                    </div>
                @endif
            </div>
            <div class="card-body px-0">
                <div class="table-responsive">
                <table id="user-list-table" class="table table-striped" role="grid" data-toggle="data-table">
                    <thead>
                        <tr class="ligth">
                            <th>No</th>
                            <th>Nama Mahasiswa</th>
                            <th>Nama Orang Tua</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Status</th>
                            <th style="min-width: 100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;?>
                        @foreach ($dataPenangguhanUKT as $item)
                        @if ($item->status_penangguhan !== 'Belum Dikirim')
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->nama_mahasiswa}}</td>
                            <td>{{$item->nama_orang_tua}}</td>
                            <td>{{$item->tanggal_pengajuan}}</td>
                            <td>{{$item->status_penangguhan}}</td>
                            <td>
                                <div class="flex align-items-center list-user-action">
                                    <a href="" class="btn btn-sm btn-icon btn-primary" data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#detail{{$item->id_penangguhan_ukt}}" data-placement="top" title="Cetak" data-original-title="Cetak">
                                        <span class="btn-inner">
                                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M12.1221 15.436L12.1221 3.39502" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M15.0381 12.5083L12.1221 15.4363L9.20609 12.5083" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M16.7551 8.12793H17.6881C19.7231 8.12793 21.3721 9.77693 21.3721 11.8129V16.6969C21.3721 18.7269 19.7271 20.3719 17.6971 20.3719L6.55707 20.3719C4.52207 20.3719 2.87207 18.7219 2.87207 16.6869V11.8019C2.87207 9.77293 4.51807 8.12793 6.54707 8.12793L7.48907 8.12793" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                             
                                        </span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection