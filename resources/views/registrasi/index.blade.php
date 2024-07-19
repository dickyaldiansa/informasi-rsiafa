@extends('layouts.main')
@section('content') 

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header"><i class="fas fa-list"></i> Data Registrasi</div>
      <div class="card-body">

        <form action="" method="get">
          <div class="form-group row">
            <div class="col-sm-1 col-md-1">
              <label>Tanggal</label>
            </div>
            <div class="col-sm-3 col-md-3">
              <div class="input-group">
                <input type="date" name="tanggal" value="{{ $tanggal }}" class="form-control" placeholder="Cari..." aria-label="search" aria-describedby="basic-addon2">
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
                <th>No</th>
                <th>Tanggal Reg</th>
                <th>No Rawat</th>
                <th>RM Baru</th>
                <th>RM Lama</th>
                <th>Nama Pasien</th>
                <th>Poliklinik</th>
                <th>Dokter</th>
                <th>Penjamin</th>
                <th>Status Lanjut</th>
                <th>Status Periksa</th>
                <th>Status Bayar</th>
                {{-- <th>#</th> --}}
              </tr>
            </thead>
            <tbody>
              @php $no = 1; @endphp
              @foreach($registrasi as $data)
              <tr>
                <td>{{ $no }}</td>
                <td>{{ date('d-m-Y', strtotime($data->tgl_registrasi)) }}</td>
                <td>{{ $data->no_rawat }}</td>
                <td>{{ $data->no_rkm_medis }}</td>
                <td>{{ $data->nip }}</td>
                <td>{{ $data->nm_pasien }}</td>
                <td>{{ $data->nm_poli }}</td>
                <td>{{ $data->nm_dokter }}</td>
                <td>{{ $data->png_jawab }}</td>
                <td>{{ $data->status_lanjut }}</td>
                <td>{{ $data->stts }}</td>
                <td>{{ $data->status_bayar }}</td>
                {{-- <td>
                  <a href="#" class="btn btn-primary btn-sm">Detail</a>
                </td> --}}
              </tr>
              @php $no++; @endphp
              @endforeach
            </tbody>
          </table>
        </div>

      </div>
    </div>

  </div>
</div>

@endsection
