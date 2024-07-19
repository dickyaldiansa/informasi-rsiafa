@extends('layouts.main')
@section('content') 

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header"><i class="fas fa-list"></i> Data Obat, Alkes & BHP</div>
      <div class="card-body">

        <form action="" method="get">
          <div class="form-group row">
            <div class="col-sm-2 col-md-2">
              <label>Nama Obat</label>
            </div>
            <div class="col-sm-3 col-md-3">
              <div class="input-group">
                <input type="text" name="nama" value="{{ $nama }}" class="form-control" placeholder="Cari..." aria-label="search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button type="submit" class="btn btn-outline-secondary" type="button">Cari</button>
                </div>
              </div>
            </div>
          </div>
        </form> 

        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Kode Obat</th>
                <th>Nama Obat</th>
                <th>Satuan</th>
                <th>Isi</th>
                <th>Kandungan</th>
                <th>Kapasitas</th>
                <th>Harga Beli</th>
                <th>Harga Ralan</th>
                <th>Harga Karyawan</th>
                <th>Jenis</th>
                <th>Expired</th>
                <th>Status</th>
                {{-- <th>#</th> --}}
              </tr>
            </thead>
            <tbody>
              @foreach($data_obat as $data)
              <tr>
                <td>{{ $data->kode_brng }}</td>
                <td>{{ $data->nama_brng }}</td>
                <td>{{ $data->satuan }}</td>
                <td>{{ $data->isi }}</td>
                <td>{{ $data->letak_barang }}</td>
                <td>{{ $data->kapasitas }}</td>
                <td>{{ number_format($data->h_beli) }}</td>
                <td>{{ number_format($data->ralan) }}</td>
                <td>{{ number_format($data->karyawan) }}</td>
                <td>{{ $data->nama_jenis }}</td>
                <td>{{ date('d-m-Y', strtotime($data->expire)) }}</td>
                <td>
                  @if($data->status == 1) 
                  <form action="{{ url('/data_obat',['id' => $data->kode_brng]) }}" method="post">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="status" value="0">
                    <button type="submit" class="btn btn-outline-success btn-sm">Aktif</button>
                  </form> 
                  @else 
                  <form action="{{ url('/data_obat',['id' => $data->kode_brng]) }}" method="post">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="status" value="1">
                    <button type="submit" class="btn btn-outline-danger btn-sm">Non Aktif</button>
                  </form> 
                  @endif
                </td>
               {{--  <td>
                  <a href="#" class="btn btn-primary btn-sm">Detail</a>
                </td> --}}
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $data_obat->appends(['select' => $select])->links('pagination::bootstrap-4') !!}
        </div>

      </div>
    </div>

  </div>
</div>

@endsection
