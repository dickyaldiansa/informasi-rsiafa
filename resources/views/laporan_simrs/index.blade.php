@extends('layouts.main')
@section('content') 

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header"><i class="fas fa-list"></i> Laporan SIMRS</div>
      <div class="card-body">

        <form action="" method="get">
          <div class="form-group row">
            <div class="col-sm-2 col-md-2">
              <label>Tanggal</label>
            </div>
            <div class="col-sm-3 col-md-3">
              <div class="input-group">
                <input type="date" name="date" value="{{ $date }}" class="form-control" aria-label="search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button type="submit" class="btn btn-outline-secondary" type="button">Cari</button>
                </div>
              </div>
            </div>
          </div>
        </form> 

        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead class="bg-secondary text-white">
              <tr>
                <th>No</th>
                <th>No Rawat</th>
                <th>No RM</th>
                <th>Nama Pasien</th>
                <th>Poliklinik</th>
                <th>Dokter</th>
                <th>Status</th>
                <th>Pemeriksaan Ralan</th>
                <th>Pemeriksaan Ranap</th>
                <th>Diagnosa Ralan</th>
                <th>Diagnosa Ranap</th>
                <th>Prosedur Ralan</th>
                <th>Prosedur Ranap</th>
                <th>Tindakan Dokter Ralan</th>
                <th>Tindakan Dokter Ranap</th>
                <th>Resep Obat Ralan</th>
                <th>Resep Obat Ranap</th>
              </tr>
            </thead>
            <tbody>
              @php $no = 1; @endphp
              @foreach($laporan_simrs as $data)
              <tr>
                <td>{{ $no }}</td>
                <td>{{ $data->no_rawat }}</td>
                <td>{{ $data->no_rkm_medis }}</td>
                <td>{{ $data->nm_pasien }}</td>
                <td>{{ $data->nm_poli }}</td>
                <td>{{ $data->nm_dokter }}</td>
                <td>{{ $data->status_lanjut }}</td>
                <td class="@if($data->total_pemeriksaan_ralan == 0) bg-danger @else bg-success @endif text-white">
                  @if($data->total_pemeriksaan_ralan > 0) 
                  Sudah {{ $data->total_pemeriksaan_ralan }} 
                  @else 
                  Belum {{ $data->total_pemeriksaan_ralan }}
                  @endif
                </td>
                <td class="@if($data->total_pemeriksaan_ranap == 0) bg-danger @else bg-success @endif text-white">
                  @if($data->total_pemeriksaan_ranap > 0) 
                  Sudah {{ $data->total_pemeriksaan_ranap }} 
                  @else 
                  Belum {{ $data->total_pemeriksaan_ranap }}
                  @endif
                </td>
                <td class="@if($data->total_diagnosa_ralan == 0) bg-danger @else bg-success @endif text-white">
                  @if($data->total_diagnosa_ralan > 0) 
                  Sudah {{ $data->total_diagnosa_ralan }} 
                  @else 
                  Belum {{ $data->total_diagnosa_ralan }}
                  @endif
                </td>
                <td class="@if($data->total_diagnosa_ranap == 0) bg-danger @else bg-success @endif text-white">
                  @if($data->total_diagnosa_ranap > 0) 
                  Sudah {{ $data->total_diagnosa_ranap }} 
                  @else 
                  Belum {{ $data->total_diagnosa_ranap }}
                  @endif
                </td>
                <td class="@if($data->total_prosedur_ralan == 0) bg-danger @else bg-success @endif text-white">
                  @if($data->total_prosedur_ralan > 0) 
                  Sudah {{ $data->total_prosedur_ralan }} 
                  @else 
                  Belum {{ $data->total_prosedur_ralan }}
                  @endif
                </td>
                <td class="@if($data->total_prosedur_ranap == 0) bg-danger @else bg-success @endif text-white">
                  @if($data->total_prosedur_ranap > 0) 
                  Sudah {{ $data->total_prosedur_ranap }} 
                  @else 
                  Belum {{ $data->total_prosedur_ranap }}
                  @endif
                </td>
                <td class="@if($data->total_tindakan_ralan_dokter == 0) bg-danger @else bg-success @endif text-white">
                  @if($data->total_tindakan_ralan_dokter > 0) 
                  Sudah {{ $data->total_tindakan_ralan_dokter }} 
                  @else 
                  Belum {{ $data->total_tindakan_ralan_dokter }}
                  @endif
                </td>
                <td class="@if($data->total_tindakan_ranap_dokter == 0) bg-danger @else bg-success @endif text-white">
                  @if($data->total_tindakan_ranap_dokter > 0) 
                  Sudah {{ $data->total_tindakan_ranap_dokter }} 
                  @else 
                  Belum {{ $data->total_tindakan_ranap_dokter }}
                  @endif
                </td>
                <td class="@if($data->total_resep_obat_ralan == 0) bg-danger @else bg-success @endif text-white">
                  @if($data->total_resep_obat_ralan > 0) 
                  Sudah {{ $data->total_resep_obat_ralan }} 
                  @else 
                  Belum {{ $data->total_resep_obat_ralan }}
                  @endif
                </td>
                <td class="@if($data->total_resep_obat_ranap == 0) bg-danger @else bg-success @endif text-white">
                  @if($data->total_resep_obat_ranap > 0) 
                  Sudah {{ $data->total_resep_obat_ranap }} 
                  @else 
                  Belum {{ $data->total_resep_obat_ranap }}
                  @endif
                </td>
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
