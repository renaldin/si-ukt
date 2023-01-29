@extends('layoutAdmin.main')

@section('content')
<section>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-box">
                <div class="form-title-wrap">
                    <div>
                        <h3 class="title">{{ $subTitle }}</h3>
                        <p class="font-size-14">Silahkan kelola data reklame di tabel bawah!</p>
                    </div>
                </div>
                <div class="form-content">
                    <div class="table-form table-responsive">
                        <div class="mb-2">
                            <a href="/tambah-reklame" class="theme-btn theme-btn-small"><i class="la la-plus"></i> Tambah</a>
                        </div>
                        <div class="mb-2">
                            @if (session('berhasil'))    
                                <div class="alert bg-primary text-white alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4><i class="icon fa fa-ban"></i> Berhasil!</h4>
                                    {{ session('berhasil') }}
                                </div>
                            @endif
                        </div>
                        <table class="table" id="example2">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Lokasi</th>
                                    <th scope="col">Ukuran</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;?>
                                @foreach ($reklame as $item)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $item->lokasi }}</td>
                                        <td>{{ $item->ukuran }}</td>
                                        <td>
                                            @if ($item->status === 'Belum Dipesan')
                                                <span class="badge badge-success">{{ $item->status }}</td></span>
                                            @elseif ($item->status === 'Sudah Dipesan')
                                                <span class="badge badge-danger">{{ $item->status }}</td></span>
                                            @elseif ($item->status === 'Sudah Dibooking')
                                                <span class="badge badge-primary">{{ $item->status }}</td></span>
                                            @endif
                                        <td>
                                            <div class="table-content">
                                                <a href="/detail-reklame/{{ $item->id_reklame }}" class="theme-btn theme-btn-small" data-toggle="tooltip" data-placement="top" title="Detail"><i class="la la-eye"></i></a>
                                                <a href="/edit-reklame/{{ $item->id_reklame }}" class="theme-btn theme-btn-small" data-toggle="tooltip" data-placement="top" title="Edit"><i class="la la-edit"></i></a>
                                                <a href="/hapus-reklame/{{ $item->id_reklame }}" class="theme-btn theme-btn-small" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm('Anda yakin akan menghapus data ini?')"><i class="la la-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- end form-box -->
        </div><!-- end col-lg-12 -->
    </div><!-- end row -->
</section>
@endsection