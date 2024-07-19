@extends('layouts.main')

@section('content')

<div class="row">

  <div class="col-md-12">
    <div class="card">
      <div class="card-header"><i class="fas fa-file"></i> Registrasi Pasien <b>(Rawat Inap)</b></div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th>No Rawat</th>
              <th>Tanggal</th>
              <th>RM Baru</th>
              <th>RM Lama</th>
              <th>Nama Pasien</th>
              <th>Umur Daftar</th>
              <th>Jenis</th>
              <th>Penjamin</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ $registrasi->no_rawat }}</td>
              <td>{{ date('d-m-Y', strtotime($registrasi->tgl_registrasi)) }}</td>
              <td>{{ $registrasi->no_rkm_medis }}</td>
              <td>{{ $registrasi->nip }}</td>
              <td>{{ $registrasi->nm_pasien }}</td>
              <td>{{ $registrasi->umurdaftar.' '.$registrasi->sttsumur }}</td>
              <td>{{ $registrasi->status_lanjut }}</td>
              <td>{{ $registrasi->png_jawab }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="col-md-12 mt-2">
    <div class="card">
      <div class="card-body">
        <nav class="mb-2">
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link @if(Session::get('visible') == 'riwayat') active @endif" id="nav-riwayat-tab" data-toggle="tab" href="#nav-riwayat" role="tab" aria-controls="nav-riwayat" aria-selected="true">Riwayat</a>
            <a class="nav-item nav-link @if(Session::get('visible') == 'pemeriksaan') active @endif" id="nav-pemeriksaan-tab" data-toggle="tab" href="#nav-pemeriksaan" role="tab" aria-controls="nav-pemeriksaan" aria-selected="false">Pemeriksaan</a>
            <a class="nav-item nav-link @if(Session::get('visible') == 'diagnosa') active @endif" id="nav-diagnosa-tab" data-toggle="tab" href="#nav-diagnosa" role="tab" aria-controls="nav-diagnosa" aria-selected="false">Diagnosa</a>
            <a class="nav-item nav-link @if(Session::get('visible') == 'prosedur') active @endif" id="nav-prosedur-tab" data-toggle="tab" href="#nav-prosedur" role="tab" aria-controls="nav-prosedur" aria-selected="false">Prosedur</a>
            <a class="nav-item nav-link @if(Session::get('visible') == 'perawatan') active @endif" id="nav-perawatan-tab" data-toggle="tab" href="#nav-perawatan" role="tab" aria-controls="nav-perawatan" aria-selected="false">Perawatan</a>
            <a class="nav-item nav-link @if(Session::get('visible') == 'resep') active @endif" id="nav-resep-tab" data-toggle="tab" href="#nav-resep" role="tab" aria-controls="nav-resep" aria-selected="false">Resep</a>
            <a class="nav-item nav-link @if(Session::get('visible') == 'resep_racik') active @endif" id="nav-resep-racik-tab" data-toggle="tab" href="#nav-resep-racik" role="tab" aria-controls="nav-resep-racik" aria-selected="false">Resep Racik</a>
            <a class="nav-item nav-link @if(Session::get('visible') == 'laboratorium') active @endif" id="nav-laboratorium-tab" data-toggle="tab" href="#nav-laboratorium" role="tab" aria-controls="nav-laboratorium" aria-selected="false">Laboratorium</a>
            <a class="nav-item nav-link @if(Session::get('visible') == 'radiologi') active @endif" id="nav-radiologi-tab" data-toggle="tab" href="#nav-radiologi" role="tab" aria-controls="nav-radiologi" aria-selected="false">Radiologi</a>
          </div>
        </nav>

        <!--riwayat-->
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade" id="nav-riwayat" role="tabpanel" aria-labelledby="nav-riwayat-tab">
            <div class="card">
              <div class="card-body">
                @foreach($data_riwayat as $key => $data)
                <div class="card">
                  <div class="card-header text-danger"><i class="fa fa-user-nurse"></i> {{ $data['nm_dokter'] }}</div>
                  <div class="card-body">
                    <b><i class="fa fa-file"></i> Registrasi</b>
                    <table class="table">
                      <thead>
                        <th>Tanggal registrasi</th>
                        <th>Jenis</th>
                        <th>No RM</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Poli Asal</th>
                        <th>Penjamin</th>
                      </thead>
                      <tbody>
                        <td>{{ date('d-m-Y', strtotime($data['tgl_registrasi'])) }}</td>
                        <td>{{ $data['status_lanjut'] }}</td>
                        <td>{{ $data['no_rkm_medis'] }}</td>
                        <td>{{ $data['nm_pasien'] }}</td>
                        <td>@if($data['status_lanjut'] == 'Ralan') Rawat Jalan @else Rawat Inap @endif</td>
                        <td>{{ $data['nm_poli'] }}</td>
                        <td>{{ $data['png_jawab'] }}</td>
                      </tbody>
                    </table>

                    <br>
                    <b><i class="fa fa-stethoscope"></i> TTV</b>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <th>Tanggal Perawatan</th>
                          <th>Suhu</th>
                          <th>Tensi</th>
                          <th>Nadi</th>
                          <th>Respirasi</th>
                          <th>Tinggi</th>
                          <th>Berat</th>
                          <th>SpO2</th>
                          <th>Gcs</th>
                          <th>Kesadaran</th>
                          <th>Keluhan</th>
                          <th>Pemeriksaan</th>
                          <th>Alergi</th>
                          <th>Rtl</th>
                          <th>Penilaian</th>
                          <th>Instruksi</th>
                          <th>Evaluasi</th>
                          <th>Petugas</th>
                        </thead>
                        @foreach($data['ttv'] as $val)
                        <tbody>
                          <td>{{ date('d-m-Y', strtotime($val->tgl_perawatan)) . ' ' . $val->jam_rawat }}</td>
                          <td>{{ $val->suhu_tubuh }}</td>
                          <td>{{ $val->tensi }}</td>
                          <td>{{ $val->nadi }}</td>
                          <td>{{ $val->respirasi }}</td>
                          <td>{{ $val->tinggi }}</td>
                          <td>{{ $val->berat }}</td>
                          <td>{{ $val->spo2 }}</td>
                          <td>{{ $val->gcs }}</td>
                          <td>{{ $val->kesadaran }}</td>
                          <td>{{ $val->keluhan }}</td>
                          <td>{{ $val->pemeriksaan }}</td>
                          <td>{{ $val->alergi }}</td>
                          <td>{{ $val->rtl }}</td>
                          <td>{{ $val->penilaian }}</td>
                          <td>{{ $val->instruksi }}</td>
                          <td>{{ $val->evaluasi }}</td>
                          <td>{{ $val->nama }}</td>
                        </tbody>
                        @endforeach
                      </table>
                    </div>

                    <br>
                    <b><i class="fa fa-comment-medical"></i> Diagnosa</b>
                    <table class="table">
                      <thead>
                        <th>Kode Penyakit</th>
                        <th>Nama</th>
                        <th>Status</th>
                      </thead>
                      @foreach($data['diagnosa'] as $val)
                      <tbody>
                        <td>{{ $val->kd_penyakit }}</td>
                        <td>{{ $val->nm_penyakit }}</td>
                        <td>{{ $val->status_lanjut }}</td>
                      </tbody>
                      @endforeach
                    </table>

                    <br>
                    <b><i class="fa fa-comment-medical"></i> Prosedur</b>
                    <table class="table">
                      <thead>
                        <th>Kode</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                      </thead>
                      @foreach($data['prosedur'] as $val)
                      <tbody>
                        <td>{{ $val->kode }}</td>
                        <td>{{ $val->deskripsi_panjang }}</td>
                        <td>{{ $val->status_lanjut }}</td>
                      </tbody>
                      @endforeach
                    </table>

                    <br>
                    <b><i class="fa fa-comment-medical"></i> Perawatan Dokter</b>
                    
                    @if(count($data['perawatan_dokter']) > 0)
                    <p>Rawat Jalan</p>
                    <table class="table">
                      <thead>
                        <th>Tanggal</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Biaya</th>
                        <th>Petugas</th>
                      </thead>
                      @foreach($data['perawatan_dokter'] as $val)
                      <tbody>
                        <td>{{ date('d-m-Y', strtotime($val->tgl_perawatan)) }}</td>
                        <td>{{ $val->kd_jenis_prw }}</td>
                        <td>{{ $val->nm_perawatan }}</td>
                        <td>{{ number_format($val->biaya_rawat) }}</td>
                        <td>{{ $val->nm_dokter }}</td>
                      </tbody>
                      @endforeach
                    </table>
                    @endif

                    @if(count($data['perawatan_dokter_inap']) > 0)
                    <p>Rawat Inap</p>
                    <table class="table">
                      <thead>
                        <th>Tanggal</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Biaya</th>
                        <th>Petugas</th>
                      </thead>
                      @foreach($data['perawatan_dokter_inap'] as $val)
                      <tbody>
                        <td>{{ date('d-m-Y', strtotime($val->tgl_perawatan)) }}</td>
                        <td>{{ $val->kd_jenis_prw }}</td>
                        <td>{{ $val->nm_perawatan }}</td>
                        <td>{{ number_format($val->biaya_rawat) }}</td>
                        <td>{{ $val->nm_dokter }}</td>
                      </tbody>
                      @endforeach
                    </table>
                    @endif

                    <br>
                    <b><i class="fa fa-comment-medical"></i> Resep Obat</b>
                    <table class="table">
                      <thead>
                        <th>No Resep</th>
                        <th>Obat</th>
                        <th>Jumlah</th>
                        <th>Aturan Pakai</th>
                      </thead>
                      @foreach($data['resep_obat'] as $val)
                      <tbody>
                        <td>{{ $val->no_resep }}</td>
                        <td>{{ $val->nama_brng }}</td>
                        <td>{{ $val->jml }}</td>
                        <td>{{ $val->aturan_pakai }}</td>
                      </tbody>
                      @endforeach
                    </table>

                  </div>
                </div>
                <br>
                @endforeach
              </div>
            </div>
          </div>

          <!--pemeriksaan-->
          <div class="tab-pane fade @if(Session::get('visible') == 'pemeriksaan') show active @endif" id="nav-pemeriksaan" role="tabpanel" aria-labelledby="nav-pemeriksaan-tab">
            <div class="card">
              <div class="card-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahPemeriksaan">Tambah</button>
                <!-- Modal Tambah Pemeriksaan-->
                <div class="modal fade" id="tambahPemeriksaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Tambah Pemeriksaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ url('/pemeriksaan_ralan') }}" method="post">
                          @csrf

                          <input type="hidden" name="no_rawat" value="{{ $registrasi->no_rawat }}">

                          @if(empty($get_pemeriksaan))

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Suhu</label>
                            <div class="col-sm-3">
                              <input type="text" name="suhu" class="form-control">
                            </div>
                            <label class="col-sm-3 col-form-label">Tensi</label>
                            <div class="col-sm-3">
                              <input type="text" name="tensi" class="form-control">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nadi</label>
                            <div class="col-sm-3">
                              <input type="text" name="nadi" class="form-control">
                            </div>
                            <label class="col-sm-3 col-form-label">Respirasi</label>
                            <div class="col-sm-3">
                              <input type="text" name="respirasi" class="form-control">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tinggi</label>
                            <div class="col-sm-3">
                              <input type="text" name="tinggi" class="form-control">
                            </div>
                            <label class="col-sm-3 col-form-label">Berat</label>
                            <div class="col-sm-3">
                              <input type="text" name="berat" class="form-control">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Spo2</label>
                            <div class="col-sm-3">
                              <input type="text" name="spo2" class="form-control">
                            </div>
                            <label class="col-sm-3 col-form-label">GCS</label>
                            <div class="col-sm-3">
                              <input type="text" name="gcs" class="form-control">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Alergi</label>
                            <div class="col-sm-3">
                              <input type="text" name="alergi" class="form-control">
                            </div>
                            <label class="col-sm-3 col-form-label">Lingkar Perut</label>
                            <div class="col-sm-3">
                              <input type="text" name="lp" class="form-control">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kesadaran</label>
                            <div class="col-sm-9">
                              <select name="kesadaran" class="form-control">
                                <option value="Alert">Alert</option>
                                <option value="Coma">Coma</option>
                                <option value="Compos Mentis">Compos Mentis</option>
                                <option value="Confusion">Confusion</option>
                                <option value="Pain">Pain</option>
                                <option value="Somnolence">Somnolence</option>
                                <option value="Sopor">Sopor</option>
                                <option value="Unresponsive">Unresponsive</option>
                                <option value="Voice">Voice</option>
                              </select>
                            </div>
                          </div>

                          @else

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Suhu</label>
                            <div class="col-sm-3">
                              <input type="text" name="suhu" value="{{ $get_pemeriksaan->suhu_tubuh }}" class="form-control">
                            </div>
                            <label class="col-sm-3 col-form-label">Tensi</label>
                            <div class="col-sm-3">
                              <input type="text" name="tensi" value="{{ $get_pemeriksaan->tensi }}" class="form-control">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nadi</label>
                            <div class="col-sm-3">
                              <input type="text" name="nadi" value="{{ $get_pemeriksaan->nadi }}" class="form-control">
                            </div>
                            <label class="col-sm-3 col-form-label">Respirasi</label>
                            <div class="col-sm-3">
                              <input type="text" name="respirasi" value="{{ $get_pemeriksaan->respirasi }}" class="form-control">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tinggi</label>
                            <div class="col-sm-3">
                              <input type="text" name="tinggi" value="{{ $get_pemeriksaan->tinggi }}" class="form-control">
                            </div>
                            <label class="col-sm-3 col-form-label">Berat</label>
                            <div class="col-sm-3">
                              <input type="text" name="berat" value="{{ $get_pemeriksaan->berat }}" class="form-control">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Spo2</label>
                            <div class="col-sm-3">
                              <input type="text" name="spo2" value="{{ $get_pemeriksaan->spo2 }}" class="form-control">
                            </div>
                            <label class="col-sm-3 col-form-label">GCS</label>
                            <div class="col-sm-3">
                              <input type="text" name="gcs" value="{{ $get_pemeriksaan->gcs }}" class="form-control">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Alergi</label>
                            <div class="col-sm-3">
                              <input type="text" name="alergi" value="{{ $get_pemeriksaan->alergi }}" class="form-control">
                            </div>
                            <label class="col-sm-3 col-form-label">Lingkar Perut</label>
                            <div class="col-sm-3">
                              <input type="text" name="lp" value="{{ $get_pemeriksaan->lingkar_perut }}" class="form-control">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kesadaran</label>
                            <div class="col-sm-9">
                              <select name="kesadaran" class="form-control">
                                <option value="Alert" @if($get_pemeriksaan->kesadaran == 'Alert') selected @endif>Alert</option>
                                <option value="Coma" @if($get_pemeriksaan->kesadaran == 'Coma') selected @endif>Coma</option>
                                <option value="Compos Mentis" @if($get_pemeriksaan->kesadaran == 'Compos Mentis') selected @endif>Compos Mentis</option>
                                <option value="Confusion" @if($get_pemeriksaan->kesadaran == 'Confusion') selected @endif>Confusion</option>
                                <option value="Pain" @if($get_pemeriksaan->kesadaran == 'Pain') selected @endif>Pain</option>
                                <option value="Somnolence" @if($get_pemeriksaan->kesadaran == 'Somnolence') selected @endif>Somnolence</option>
                                <option value="Sopor" @if($get_pemeriksaan->kesadaran == 'Sopor') selected @endif>Sopor</option>
                                <option value="Unresponsive" @if($get_pemeriksaan->kesadaran == 'Unresponsive') selected @endif>Unresponsive</option>
                                <option value="Voice" @if($get_pemeriksaan->kesadaran == 'Voice') selected @endif>Voice</option>
                              </select>
                            </div>
                          </div>

                          @endif

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Subject</label>
                            <div class="col-sm-9">
                              <textarea name="subject" class="form-control" rows="4"></textarea>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Object</label>
                            <div class="col-sm-9">
                              <textarea name="object" class="form-control" rows="4"></textarea>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Asesmen</label>
                            <div class="col-sm-9">
                              <textarea name="asesmen" class="form-control" rows="4"></textarea>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Plan</label>
                            <div class="col-sm-9">
                              <textarea name="plan" class="form-control" rows="4"></textarea>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Instruksi</label>
                            <div class="col-sm-9">
                              <textarea name="instruksi" class="form-control" rows="4"></textarea>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Evaluasi</label>
                            <div class="col-sm-9">
                              <textarea name="evaluasi" class="form-control" rows="4"></textarea>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                              <button type="submit" class="btn btn-primary btn-sm">
                                <i class="far fa-save"></i> Save
                              </button>
                            </div>
                          </div>

                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Modal Edit Pemeriksaan-->
                <div class="modal fade" id="editPemeriksaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Edit Pemeriksaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ url('/pemeriksaan_ralan') }}" method="post">
                          @csrf

                          <input type="hidden" name="no_rawat" value="{{ $registrasi->no_rawat }}">

                          @if(empty($get_pemeriksaan))

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Suhu</label>
                            <div class="col-sm-3">
                              <input type="text" name="suhu" class="form-control">
                            </div>
                            <label class="col-sm-3 col-form-label">Tensi</label>
                            <div class="col-sm-3">
                              <input type="text" name="tensi" class="form-control">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nadi</label>
                            <div class="col-sm-3">
                              <input type="text" name="nadi" class="form-control">
                            </div>
                            <label class="col-sm-3 col-form-label">Respirasi</label>
                            <div class="col-sm-3">
                              <input type="text" name="respirasi" class="form-control">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tinggi</label>
                            <div class="col-sm-3">
                              <input type="text" name="tinggi" class="form-control">
                            </div>
                            <label class="col-sm-3 col-form-label">Berat</label>
                            <div class="col-sm-3">
                              <input type="text" name="berat" class="form-control">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Spo2</label>
                            <div class="col-sm-3">
                              <input type="text" name="spo2" class="form-control">
                            </div>
                            <label class="col-sm-3 col-form-label">GCS</label>
                            <div class="col-sm-3">
                              <input type="text" name="gcs" class="form-control">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Alergi</label>
                            <div class="col-sm-3">
                              <input type="text" name="alergi" class="form-control">
                            </div>
                            <label class="col-sm-3 col-form-label">Lingkar Perut</label>
                            <div class="col-sm-3">
                              <input type="text" name="lp" class="form-control">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kesadaran</label>
                            <div class="col-sm-9">
                              <select name="kesadaran" class="form-control">
                                <option value="Alert">Alert</option>
                                <option value="Coma">Coma</option>
                                <option value="Compos Mentis">Compos Mentis</option>
                                <option value="Confusion">Confusion</option>
                                <option value="Pain">Pain</option>
                                <option value="Somnolence">Somnolence</option>
                                <option value="Sopor">Sopor</option>
                                <option value="Unresponsive">Unresponsive</option>
                                <option value="Voice">Voice</option>
                              </select>
                            </div>
                          </div>

                          @else

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Suhu</label>
                            <div class="col-sm-3">
                              <input type="text" name="suhu" value="{{ $get_pemeriksaan->suhu_tubuh }}" class="form-control">
                            </div>
                            <label class="col-sm-3 col-form-label">Tensi</label>
                            <div class="col-sm-3">
                              <input type="text" name="tensi" value="{{ $get_pemeriksaan->tensi }}" class="form-control">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nadi</label>
                            <div class="col-sm-3">
                              <input type="text" name="nadi" value="{{ $get_pemeriksaan->nadi }}" class="form-control">
                            </div>
                            <label class="col-sm-3 col-form-label">Respirasi</label>
                            <div class="col-sm-3">
                              <input type="text" name="respirasi" value="{{ $get_pemeriksaan->respirasi }}" class="form-control">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tinggi</label>
                            <div class="col-sm-3">
                              <input type="text" name="tinggi" value="{{ $get_pemeriksaan->tinggi }}" class="form-control">
                            </div>
                            <label class="col-sm-3 col-form-label">Berat</label>
                            <div class="col-sm-3">
                              <input type="text" name="berat" value="{{ $get_pemeriksaan->berat }}" class="form-control">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Spo2</label>
                            <div class="col-sm-3">
                              <input type="text" name="spo2" value="{{ $get_pemeriksaan->spo2 }}" class="form-control">
                            </div>
                            <label class="col-sm-3 col-form-label">GCS</label>
                            <div class="col-sm-3">
                              <input type="text" name="gcs" value="{{ $get_pemeriksaan->gcs }}" class="form-control">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Alergi</label>
                            <div class="col-sm-3">
                              <input type="text" name="alergi" value="{{ $get_pemeriksaan->alergi }}" class="form-control">
                            </div>
                            <label class="col-sm-3 col-form-label">Lingkar Perut</label>
                            <div class="col-sm-3">
                              <input type="text" name="lp" value="{{ $get_pemeriksaan->lingkar_perut }}" class="form-control">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kesadaran</label>
                            <div class="col-sm-9">
                              <select name="kesadaran" class="form-control">
                                <option value="Alert" @if($get_pemeriksaan->kesadaran == 'Alert') selected @endif>Alert</option>
                                <option value="Coma" @if($get_pemeriksaan->kesadaran == 'Coma') selected @endif>Coma</option>
                                <option value="Compos Mentis" @if($get_pemeriksaan->kesadaran == 'Compos Mentis') selected @endif>Compos Mentis</option>
                                <option value="Confusion" @if($get_pemeriksaan->kesadaran == 'Confusion') selected @endif>Confusion</option>
                                <option value="Pain" @if($get_pemeriksaan->kesadaran == 'Pain') selected @endif>Pain</option>
                                <option value="Somnolence" @if($get_pemeriksaan->kesadaran == 'Somnolence') selected @endif>Somnolence</option>
                                <option value="Sopor" @if($get_pemeriksaan->kesadaran == 'Sopor') selected @endif>Sopor</option>
                                <option value="Unresponsive" @if($get_pemeriksaan->kesadaran == 'Unresponsive') selected @endif>Unresponsive</option>
                                <option value="Voice" @if($get_pemeriksaan->kesadaran == 'Voice') selected @endif>Voice</option>
                              </select>
                            </div>
                          </div>

                          @endif

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Subject</label>
                            <div class="col-sm-9">
                              <textarea name="subject" class="form-control" rows="4"></textarea>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Object</label>
                            <div class="col-sm-9">
                              <textarea name="object" class="form-control" rows="4"></textarea>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Asesmen</label>
                            <div class="col-sm-9">
                              <textarea name="asesmen" class="form-control" rows="4"></textarea>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Plan</label>
                            <div class="col-sm-9">
                              <textarea name="plan" class="form-control" rows="4"></textarea>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Instruksi</label>
                            <div class="col-sm-9">
                              <textarea name="instruksi" class="form-control" rows="4"></textarea>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Evaluasi</label>
                            <div class="col-sm-9">
                              <textarea name="evaluasi" class="form-control" rows="4"></textarea>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                              <button type="submit" class="btn btn-primary btn-sm">
                                <i class="far fa-save"></i> Save
                              </button>
                            </div>
                          </div>

                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="table-responsive mt-2">
                  <table class="table table-condensed">
                    <thead>
                     <tr>
                      <th>SOAP</th>
                      <th>Tanggal</th>
                      <th>Suhu (°C)</th>
                      <th>Tensi (mmHg)</th>
                      <th>Nadi</th>
                      <th>Respirasi</th>
                      <th>Tinggi (Cm)</th>
                      <th>Berat (Kg)</th>
                      <th>Spo2</th>
                      <th>GCS</th>
                      <th>Alergi</th>
                      <th>L.P</th>
                      <th>Kesadaran</th>
                      <th>Petugas</th>
                      <th>#</th>
                    </tr>
                  </thead>

                  <tbody>
                    @php $no = 1; @endphp
                    @foreach($pemeriksaan as $data)
                    <tr data-toggle="collapse" data-target="#demo{{ $no }}" class="accordion-toggle">
                      <td>
                        <button class="btn btn-default btn-xs"><i class="fa fa-eye"></i></button>
                      </td>
                      <td>{{ $data->tgl_perawatan.' '.$data->jam_rawat }}</td>
                      <td>{{ $data->suhu_tubuh }}</td>
                      <td>{{ $data->tensi }}</td>
                      <td>{{ $data->nadi }}</td>
                      <td>{{ $data->respirasi }}</td>
                      <td>{{ $data->tinggi }}</td>
                      <td>{{ $data->berat }}</td>
                      <td>{{ $data->spo2 }}</td>
                      <td>{{ $data->gcs }}</td>
                      <td>{{ $data->alergi }}</td>
                      <td>{{ $data->lingkar_perut }}</td>
                      <td>{{ $data->kesadaran }}</td>
                      <td>{{ $data->nama }}</td>
                      <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                          {{-- <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editPemeriksaan">Edit</button> --}}
                          <a href="{{ url('/pemeriksaan_ralan/'.str_replace("/", "-", $data->no_rawat).'/'.$data->nip.'/'.str_replace(":", "-", $data->jam_rawat)) }}" class="btn btn-danger btn-sm">Hapus</a>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td colspan="15" class="hiddenRow">
                        <div class="accordian-body collapse" id="demo{{ $no }}"> 
                          <table>
                            <tbody>
                              <tr>
                                <th>Subject</th>
                                <td>: {{ $data->keluhan }}</td>
                              </tr>
                              <tr>
                                <th>Object</th>
                                <td>: {{ $data->pemeriksaan }}</td>
                              </tr>
                              <tr>
                                <th>Asesmen</th>
                                <td>: {{ $data->penilaian }}</td>
                              </tr>
                              <tr>
                                <th>Plan</th>
                                <td>: {{ $data->rtl }}</td>
                              </tr>
                              <tr>
                                <th>Instruksi</th>
                                <td>: {{ $data->instruksi }}</td>
                              </tr>
                              <tr>
                                <th>Evaluasi</th>
                                <td>: {{ $data->evaluasi }}</td>
                              </tr>
                              <tr>
                                <td colspan="2"></td>
                              </tr>
                            </tbody>
                          </table>
                        </div> 
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

        <!--pemeriksaan-->
        <div class="tab-pane fade @if(Session::get('visible') == 'pemeriksaan') show active @endif" id="nav-pemeriksaan" role="tabpanel" aria-labelledby="nav-pemeriksaan-tab">
          <div class="card">
            <div class="card-body">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahPemeriksaan">Tambah</button>
              <div class="modal fade" id="tambahPemeriksaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Tambah Pemeriksaan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="{{ url('/pemeriksaan_ranap') }}" method="post">
                        @csrf

                        <input type="hidden" name="no_rawat" value="{{ $registrasi->no_rawat }}">

                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Suhu</label>
                          <div class="col-sm-8">
                            <input type="text" name="suhu" class="form-control">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Tensi</label>
                          <div class="col-sm-8">
                            <input type="text" name="tensi" class="form-control">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Nadi</label>
                          <div class="col-sm-8">
                            <input type="text" name="nadi" class="form-control">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Respirasi</label>
                          <div class="col-sm-8">
                            <input type="text" name="respirasi" class="form-control">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Tinggi</label>
                          <div class="col-sm-8">
                            <input type="text" name="tinggi" class="form-control">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Berat</label>
                          <div class="col-sm-8">
                            <input type="text" name="berat" class="form-control">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Spo2</label>
                          <div class="col-sm-8">
                            <input type="text" name="spo2" class="form-control">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">GCS</label>
                          <div class="col-sm-8">
                            <input type="text" name="gcs" class="form-control">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Alergi</label>
                          <div class="col-sm-8">
                            <input type="text" name="alergi" class="form-control">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Kesadaran</label>
                          <div class="col-sm-8">
                            <select name="kesadaran" class="form-control">
                              <option value="Alert">Alert</option>
                              <option value="Coma">Coma</option>
                              <option value="Compos Mentis">Compos Mentis</option>
                              <option value="Confusion">Confusion</option>
                              <option value="Pain">Pain</option>
                              <option value="Somnolence">Somnolence</option>
                              <option value="Sopor">Sopor</option>
                              <option value="Unresponsive">Unresponsive</option>
                              <option value="Voice">Voice</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Subject</label>
                          <div class="col-sm-8">
                            <input type="text" name="subject" class="form-control">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Object</label>
                          <div class="col-sm-8">
                            <input type="text" name="object" class="form-control">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Asesmen</label>
                          <div class="col-sm-8">
                            <input type="text" name="asesmen" class="form-control">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Plan</label>
                          <div class="col-sm-8">
                            <input type="text" name="plan" class="form-control">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Instruksi</label>
                          <div class="col-sm-8">
                            <input type="text" name="instruksi" class="form-control">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Evaluasi</label>
                          <div class="col-sm-8">
                            <input type="text" name="evaluasi" class="form-control">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label"></label>
                          <div class="col-sm-6">
                            <button type="submit" class="btn btn-primary btn-sm">
                              <i class="far fa-save"></i> Save
                            </button>
                          </div>
                        </div>

                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="table-responsive mt-2">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th>Suhu</th>
                      <th>Tensi</th>
                      <th>Nadi</th>
                      <th>Respirasi</th>
                      <th>Tinggi</th>
                      <th>Berat</th>
                      <th>Spo2</th>
                      <th>GCS</th>
                      <th>Alergi</th>
                      <th>Kesadaran</th>
                      <th>Subject</th>
                      <th>Object</th>
                      <th>Asesmen</th>
                      <th>Plan</th>
                      <th>Instruksi</th>
                      <th>Evaluasi</th>
                      <th>Petugas</th>
                      <th>#</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($pemeriksaan as $data)
                    <tr>
                      <td>{{ $data->tgl_perawatan.' '.$data->jam_rawat }}</td>
                      <td>{{ $data->suhu_tubuh }}</td>
                      <td>{{ $data->tensi }}</td>
                      <td>{{ $data->nadi }}</td>
                      <td>{{ $data->respirasi }}</td>
                      <td>{{ $data->tinggi }}</td>
                      <td>{{ $data->berat }}</td>
                      <td>{{ $data->spo2 }}</td>
                      <td>{{ $data->gcs }}</td>
                      <td>{{ $data->alergi }}</td>
                      <td>{{ $data->kesadaran }}</td>
                      <td>{{ $data->keluhan }}</td>
                      <td>{{ $data->pemeriksaan }}</td>
                      <td>{{ $data->penilaian }}</td>
                      <td>{{ $data->rtl }}</td>
                      <td>{{ $data->instruksi }}</td>
                      <td>{{ $data->evaluasi }}</td>
                      <td>{{ $data->nama }}</td>
                      <td>
                        <a href="{{ url('/pemeriksaan_ranap/'.str_replace("/", "-", $data->no_rawat).'/'.$data->nip.'/'.str_replace(":", "-", $data->jam_rawat)) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <!--diagnosa-->
        <div class="tab-pane fade @if(Session::get('visible') == 'diagnosa') show active @endif" id="nav-diagnosa" role="tabpanel" aria-labelledby="nav-diagnosa-tab">
         <div class="card">
          <div class="card-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahDiagnosa">Tambah</button>
            <div class="modal fade" id="tambahDiagnosa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Tambah Diagnosa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="{{ url('/diagnosa_pasien_ranap') }}" method="post">
                      @csrf

                      <input type="hidden" name="no_rawat" value="{{ $registrasi->no_rawat }}">

                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Nama Diagnosa</label>
                        <div class="col-sm-8">
                          <input type="text" name="diagnosa" class="form-control {{ $errors->has('diagnosa') ? 'is-invalid' : ''}}" id="diagnosa" placeholder="Cari Kode ICD 10 / Nama Diagnosa">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Code</label>
                        <div class="col-sm-8">
                          <input type="text" name="kode" class="form-control" id="kode" readonly="">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label"></label>
                        <div class="col-sm-6">
                          <button type="submit" class="btn btn-primary btn-sm">
                            <i class="far fa-save"></i> Save
                          </button>
                          <a href="https://icd.who.int/browse10/2019/en" class="btn btn-info btn-sm" target="_blank">Cari Kode ICD10</a>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="table-responsive mt-2">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Nama Diagnosa</th>
                    <th>Ciri-Ciri</th>
                    <th>Status</th>
                    <th>#</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($diagnosa as $data)
                  <tr>
                    <td>{{ $data->kd_penyakit }}</td>
                    <td>{{ $data->nm_penyakit }}</td>
                    <td>{{ $data->ciri_ciri }}</td>
                    <td>{{ $data->status }}</td>
                    <td>
                      <a href="{{ url('/diagnosa_pasien_ranap/'.str_replace("/", "-", $data->no_rawat).'/'.$data->kd_penyakit) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!--pemeriksaan-->
      <div class="tab-pane fade @if(Session::get('visible') == 'prosedur') show active @endif" id="nav-prosedur" role="tabpanel" aria-labelledby="nav-prosedur-tab">
       <div class="card">
        <div class="card-body">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahProsedur">Tambah</button>
          <div class="modal fade" id="tambahProsedur" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Tambah Prosedur</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ url('/prosedur_pasien_ranap') }}" method="post">
                    @csrf

                    <input type="hidden" name="no_rawat" value="{{ $registrasi->no_rawat }}">

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Nama Prosedur</label>
                      <div class="col-sm-8">
                        <input type="text" name="prosedur" class="form-control {{ $errors->has('prosedur') ? 'is-invalid' : ''}}" id="prosedur" placeholder="Cari Kode ICD 9 / Nama Prosedur">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Code</label>
                      <div class="col-sm-8">
                        <input type="text" name="kode" class="form-control" id="kode_prosedur" readonly="">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label"></label>
                      <div class="col-sm-6">
                        <button type="submit" class="btn btn-primary btn-sm">
                          <i class="far fa-save"></i> Save
                        </button>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="table-responsive mt-2">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Kode</th>
                  <th>Nama Prosedur</th>
                  <th>Deskripsi Pendek</th>
                  <th>#</th>
                </tr>
              </thead>
              <tbody>
                @foreach($prosedur as $data)
                <tr>
                  <td>{{ $data->kode }}</td>
                  <td>{{ $data->deskripsi_panjang }}</td>
                  <td>{{ $data->deskripsi_pendek }}</td>
                  <td>
                    <a href="{{ url('/prosedur_pasien_ranap/'.str_replace("/", "-", $data->no_rawat).'/'.$data->kode) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!--perawatan-->
    <div class="tab-pane fade @if(Session::get('visible') == 'perawatan') show active @endif" id="nav-perawatan" role="tabpanel" aria-labelledby="nav-perawatan-tab">
      <div class="card">
        <div class="card-body">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahPerawatan">Tambah</button>
          <div class="modal fade" id="tambahPerawatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Tambah Perawatan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                  <form action="{{ url('/perawatan_ranap') }}" method="post">
                    @csrf

                    <input type="hidden" name="no_rawat" value="{{ $registrasi->no_rawat }}">

                    <div class="form-group row">
                      <label class="col-sm-4">Perawatan</label>
                      <div class="col-sm-8">

                        <input type="text" name="perawatan" class="form-control {{ $errors->has('perawatan') ? 'is-invalid' : ''}}" id="nm_perawatan" placeholder="Search...">

                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4">Kode</label>
                      <div class="col-sm-8">
                        <input type="text" name="kode" class="form-control" id="kd_jenis_prw" readonly>
                      </div>
                    </div>

                    <input type="hidden" name="material" id="material">
                    <input type="hidden" name="bhp" id="bhp">
                    <input type="hidden" name="tarif_tindakandr" id="tarif_tindakandr">
                    <input type="hidden" name="kso" id="kso">
                    <input type="hidden" name="menejemen" id="menejemen">

                    <div class="form-group row">
                      <label class="col-sm-4">Tarif</label>
                      <div class="col-sm-8">
                        <input type="text" name="tarif" class="form-control" id="tarif" readonly>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4"></label>
                      <div class="col-sm-8">
                        <button type="submit" class="btn btn-primary btn-sm">
                          <i class="far fa-save"></i> Save
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          
          <div class="table-responsive mt-2">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Tanggal</th>
                  <th>Nama Tindakan</th>
                  <th>Dokter</th>
                  <th>Tarif</th>
                  <th>#</th>
                </tr>
              </thead>
              <tbody>
                @foreach($perawatan as $data)
                <tr>
                  <td>{{ date('d-m-Y', strtotime($data->tgl_perawatan)).' '.$data->jam_rawat }}</td>
                  <td>{{ $data->nm_perawatan }}</td>
                  <td>{{ $data->nm_dokter }}</td>
                  <td>Rp. {{ number_format($data->biaya_rawat) }}</td>
                  <td>
                    <a href="{{ url('/perawatan_ranap/'.str_replace("/", "-", $data->no_rawat).'/'.$data->kd_jenis_prw) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!--resep-->
    <div class="tab-pane fade @if(Session::get('visible') == 'resep') show active @endif" id="nav-resep" role="tabpanel" aria-labelledby="nav-resep-tab">
      <div class="card">
        <div class="card-body">

          <a href="{{ url('resep_dokter_ranap/create/'.Helpers::encryptId($registrasi->no_rawat)) }}" class="btn btn-primary">Tambah</a>

          <div class="table-responsive mt-2">
            <table class="table table-hover">
              <tr class="bg-light">
                <th>No Resep</th>
                <th>Tanggal Peresepan</th>
                <th>Tanggal Penyerahan</th>
                <th>#</th>
              </tr>
              @if(!empty($resep_dokter))
              @foreach($resep_dokter as $value)
              <tr>
                <th>{{ $value['no_resep'] }}</th>
                <td>{{ $value['tgl_peresepan'] }}</td>
                <td>{{ $value['tgl_penyerahan'] }}</td>
                <td><a href="{{ url('resep_dokter_ranap/'.str_replace("/", "-", $value['no_rawat']).'/'.$value['no_resep']) }}" class="btn btn-danger btn-sm">Hapus</a></td>
              </tr>
              @foreach($value['resep_dokter'] as $item)
              <tr>
                <td>@ {{ $item->nama_brng.' | Jumlah '.$item->jml.' | Aturan Pakai '.$item->aturan_pakai  }}</td>
              </tr>
              @endforeach
              @endforeach
              @else

              @endif

            </table>
          </div>

        </div>
      </div>
    </div>

    <div class="tab-pane fade @if(Session::get('visible') == 'resep_racik') show active @endif" id="nav-resep-racik" role="tabpanel" aria-labelledby="nav-resep-racik-tab">

     <div class="card">
      <div class="card-body">

        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahDataRacik">Tambah Data Racik</button>

        <div class="modal fade" id="tambahDataRacik" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

              <div class="modal-header">
                <h5 class="modal-title">Tambah Data Racik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                <form action="{{ url('resep_dokter_racikan_ranap/tambah_data_racik') }}" method="post">
                  @csrf
                  <input type="hidden" name="no_rawat" value="{{ $registrasi->no_rawat }}">
                  <div class="form-group row">
                    <label class="col-sm-4">Nama Racik</label>
                    <div class="col-sm-8">
                      <input type="text" name="nama_racik" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4">Jumlah Racik</label>
                    <div class="col-sm-8">
                      <input type="text" name="jumlah_racik" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4">Metode Racik</label>
                    <div class="col-sm-8">
                      <select name="metode_racik" class="form-control">
                        @foreach($metode_racik as $value)
                        <option value="{{ $value->kd_racik }}">{{ $value->nm_racik }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4">Aturan Pakai</label>
                    <div class="col-sm-8">
                      <input type="text" name="aturan_pakai" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4">Formula Racik</label>
                    <div class="col-sm-8">
                      <textarea name="formula_racik" class="form-control"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4"></label>
                    <div class="col-sm-8">
                      <button type="submit" class="btn btn-primary btn-sm">
                        <i class="far fa-save"></i> Save
                      </button>
                    </div>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>

        <br><br>

        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Nomor Resep</th>
                <th>Nomor Racik</th>
                <th>Nama Racik</th>
                <th>Metode Racik</th>
                <th>Jumlah Racik</th>
                <th>Aturan Pakai</th>
                <th>Formula Racik</th>
                <th>#</th>
              </tr>
            </thead>
            <tbody>
              @if(!empty($resep_dokter_racikan))
              @foreach($resep_dokter_racikan as $value)
              <tr>
                <td>{{ $value['no_resep'] }}</td>
                <td>{{ $value['no_racik'] }}</td>
                <td>{{ $value['nama_racik'] }}</td>
                <td>{{ $value['metode_racik'] }}</td>
                <td>{{ $value['jumlah_racik'] }}</td>
                <td>{{ $value['aturan_pakai'] }}</td>
                <td>{{ $value['formula_racik'] }}</td>
                <td>
                  <button type="button" class="btn btn-primary btn-sm tambah_obat_racik">Tambah Obat Racik</button>
                  <a href="{{ url('resep_dokter_racikan_ranap/'.$value['no_resep'].'/'.$value['no_racik'].'/'.str_replace("/", "-", $registrasi->no_rawat)) }}" class="btn btn-danger btn-sm">Hapus</a>
                </td>
              </tr>
              @foreach($value['obat_racik'] as $item)
              <tr>
                <td colspan="7">@ {{ $item->nama_brng.' | Kandungan Diminta '.$item->kandungan.' | Jumlah '.$item->jml }} <a href="{{ url('resep_dokter_racikan_ranap_detail/'.$item->no_resep.'/'.$item->no_racik.'/'.str_replace("/", "-", $registrasi->no_rawat).'/'.$item->kode_brng) }}" onclick="return confirm('Hapus Obat ?');"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></td>
              </tr>
              @endforeach
              @endforeach
              @else

              @endif
            </tbody>
          </table>
        </div>

        <div class="modal fade" id="tambah_obat_racik" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

              <div class="modal-header">
                <h5 class="modal-title">Tambah Obat Racik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                <form action="{{ url('resep_dokter_racikan_ranap/tambah_obat_racik') }}" method="post">
                  @csrf
                  <input type="hidden" name="no_rawat" value="{{ $registrasi->no_rawat }}">
                  <div class="form-group row">
                    <label class="col-sm-4">Nomor Resep</label>
                    <div class="col-sm-8">
                      <input type="text" name="nomor_resep" class="form-control" id="nomor_resep" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4">Nomor Racik</label>
                    <div class="col-sm-8">
                      <input type="text" name="nomor_racik" class="form-control" id="nomor_racik" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4">Jumlah Racik</label>
                    <div class="col-sm-8">
                      <input type="text" name="jumlah_racik" class="form-control" id="jumlah_racik" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4">Nama Obat</label>
                    <div class="col-sm-8">
                      <input type="text" name="nama_obat" class="form-control" id="nama_obat" placeholder="Search...">
                      <input type="hidden" name="kode_obat" id="kode_obat">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4">Kandungan</label>
                    <div class="col-sm-8">
                      <input type="text" name="kandungan" class="form-control" id="kandungan" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4">Stok</label>
                    <div class="col-sm-8">
                      <input type="text" name="stok_obat" class="form-control" id="stok_obat" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4">kandungan Diminta</label>
                    <div class="col-sm-8">
                      <input type="text" name="kandungan_diminta" class="form-control" id="kandungan_diminta">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4">Jumlah</label>
                    <div class="col-sm-8">
                      <input type="text" name="jumlah" class="form-control" id="jumlah" readonly="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4"></label>
                    <div class="col-sm-8">
                      <button type="submit" class="btn btn-primary btn-sm">
                        <i class="far fa-save"></i> Save
                      </button>
                    </div>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>

  </div>

  <!--laboratorium-->
  <div class="tab-pane fade @if(Session::get('visible') == 'permintaan_lab') show active @endif" id="nav-laboratorium" role="tabpanel" aria-labelledby="nav-laboratorium-tab">

    <div class="card">
      <div class="card-body">

        <a href="{{ url('permintaan_lab_ranap/create/'.Helpers::encryptId($registrasi->no_rawat)) }}" class="btn btn-primary">Tambah</a>

        <div class="table-responsive mt-2">
          <table class="table table-hover">
            <tr class="bg-light">
              <th>No Order</th>
              <th>Tanggal Permintaan</th>
              <th>Tanggal Sampel</th>
              <th>Tanggal Hasil</th>
              <th>#</th>
            </tr>
            @if(!empty($permintaan_lab))
            @foreach($permintaan_lab as $value)
            <tr>
              <th>{{ $value['noorder'] }}</th>
              <td>{{ $value['tanggal_permintaan'] }}</td>
              <td>{{ $value['tanggal_sampel'] }}</td>
              <td>{{ $value['tanggal_hasil'] }}</td>
              <td><a href="{{ url('permintaan_lab_ranap/'.str_replace("/", "-", $value['no_rawat']).'/'.$value['noorder']) }}" class="btn btn-danger btn-sm">Hapus</a></td>
            </tr>
            @foreach($value['pemeriksaan_lab'] as $item)
            <tr>
              <td>@ {{ $item->nm_perawatan }}</td>
            </tr>
            @endforeach
            @endforeach
            @else

            @endif

          </table>
        </div>

      </div>
    </div>

  </div>


  <!--radiologi-->
  <div class="tab-pane fade @if(Session::get('visible') == 'permintaan_rad') show active @endif" id="nav-radiologi" role="tabpanel" aria-labelledby="nav-radiologi-tab">

    <div class="card">
      <div class="card-body">

        <a href="{{ url('permintaan_rad_ranap/create/'.Helpers::encryptId($registrasi->no_rawat)) }}" class="btn btn-primary">Tambah</a>

        <div class="table-responsive mt-2">
          <table class="table table-hover">
            <tr class="bg-light">
              <th>No Order</th>
              <th>Tanggal Permintaan</th>
              <th>Tanggal Sampel</th>
              <th>Tanggal Hasil</th>
              <th>#</th>
            </tr>
            @if(!empty($permintaan_rad))
            @foreach($permintaan_rad as $value)
            <tr>
              <th>{{ $value['noorder'] }}</th>
              <td>{{ $value['tanggal_permintaan'] }}</td>
              <td>{{ $value['tanggal_sampel'] }}</td>
              <td>{{ $value['tanggal_hasil'] }}</td>
              <td><a href="{{ url('permintaan_rad_ranap/'.str_replace("/", "-", $value['no_rawat']).'/'.$value['noorder']) }}" class="btn btn-danger btn-sm">Hapus</a></td>
            </tr>
            @foreach($value['pemeriksaan_rad'] as $item)
            <tr>
              <td>@ {{ $item->nm_perawatan }}</td>
            </tr>
            @endforeach
            @endforeach
            @else

            @endif

          </table>
        </div>

      </div>
    </div>

  </div>
</div>

</div>
</div>
</div>

</div>

@endsection

@push('styles')
<style type="text/css">
  .surat{height: 20px; overflow:hidden;}
  .surat .dropdown{position:absolute;}
</style>
@endpush


@push('scripts')
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script type="text/javascript">

  $(document).ready(function() {
    $("#nm_perawatan").autocomplete({
      minLength: 3,
      source: function( request, response ) {
        $.ajax({
          url: "{{ url('/search/perawatan_inap') }}",
          dataType: "json",
          data: {search: request.term},
          success: function(data) {response(data);}
        });
      },
      select: function(event, ui){
        event.preventDefault();
        $("#kd_jenis_prw").val(ui.item.kd_jenis_prw);
        $("#nm_perawatan").val(ui.item.nm_perawatan);
        $("#material").val(ui.item.material);
        $("#bhp").val(ui.item.bhp);
        $("#tarif_tindakandr").val(ui.item.tarif_tindakandr);
        $("#kso").val(ui.item.kso);
        $("#menejemen").val(ui.item.menejemen);
        $("#tarif").val(ui.item.total_byrdr);
      },
      focus: function (event, ui) {
        event.preventDefault();
        $("#nm_perawatan").val(ui.item.nm_perawatan);
      }
    }).autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $("<li>")
      .append("<dd><small>" + item.kd_jenis_prw +" | "+ item.nm_perawatan + "</small></dd>")
      .appendTo( ul );
    };
  });

  $(document).ready(function() {
    $("#nm_perawatan_lab").autocomplete({
      minLength: 3,
      source: function( request, response ) {
        $.ajax({
          url: "{{ url('/search/perawatan_lab') }}",
          dataType: "json",
          data: {search: request.term},
          success: function(data) {response(data);}
        });
      },
      select: function(event, ui){
        event.preventDefault();
        $("#kd_jenis_prw_lab").val(ui.item.kd_jenis_prw);
        $("#nm_perawatan_lab").val(ui.item.nm_perawatan);
        $("#tarif_lab").val(ui.item.total_byr);
      },
      focus: function (event, ui) {
        event.preventDefault();
        $("#nm_perawatan_lab").val(ui.item.nm_perawatan);
      }
    }).autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $("<li>")
      .append("<dd><small>" + item.kd_jenis_prw +" | "+ item.nm_perawatan + "</small></dd>")
      .appendTo( ul );
    };
  });

  $(document).ready(function() {
    $("#diagnosa").autocomplete({
      minLength: 3,
      source: function( request, response ) {
        $.ajax({
          url: "{{ url('/search/diagnosa') }}",
          dataType: "json",
          data: {search: request.term},
          success: function(data) {response(data);}
        });
      },
      select: function(event, ui){
        event.preventDefault();
        $("#kode").val(ui.item.kd_penyakit);
        $("#diagnosa").val(ui.item.nm_penyakit);
      },
      focus: function (event, ui) {
        event.preventDefault();
        $("#diagnosa").val(ui.item.nm_penyakit);
      }
    }).autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $("<li>")
      .append("<dd><small>" + item.kd_penyakit +" | "+ item.nm_penyakit + "</small></dd>")
      .appendTo( ul );
    };
  });

  $(document).ready(function() {
    $("#prosedur").autocomplete({
      minLength: 3,
      source: function( request, response ) {
        $.ajax({
          url: "{{ url('/search/prosedur') }}",
          dataType: "json",
          data: {search: request.term},
          success: function(data) {response(data);}
        });
      },
      select: function(event, ui){
        event.preventDefault();
        $("#kode_prosedur").val(ui.item.kode);
        $("#prosedur").val(ui.item.deskripsi_panjang);
      },
      focus: function (event, ui) {
        event.preventDefault();
        $("#prosedur").val(ui.item.deskripsi_panjang);
      }
    }).autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $("<li>")
      .append("<dd><small>" + item.kode +" | "+ item.deskripsi_panjang + "</small></dd>")
      .appendTo( ul );
    };
  });

  $(document).ready(function() {
    $("#nama_obat").autocomplete({
      source  : function( request, response ) {
        $.ajax({
          url: "{{ url('/search/obat') }}",
          dataType: "json",
          data: {search: request.term},
          success: function(data) {response(data);}
        });
      },
      minLength: 3,
      select:function(event, ui){
        event.preventDefault();
        $("#nama_obat").val(ui.item.nama_brng);
        $("#kode_obat").val(ui.item.kode_brng);
        $("#kandungan").val(ui.item.kapasitas);
        $("#stok_obat").val(ui.item.stok);
      },
      focus: function(event, ui) {
        event.preventDefault();
        $("#nama_obat").val(ui.item.nama_brng);
      }
    }).autocomplete("instance")._renderItem = function(ul, item) {
      return $("<li>")
      .append("<dl><dt>" + item.nama_brng + "</dt>" + "Kekuatan:" + item.kapasitas + " | Harga:" + item.ralan.toLocaleString('en-US') + " | Stok:" + item.stok + " | Depo:" + item.nm_bangsal + "</dl>")
      .appendTo( ul );
    };
  });

  $(document).ready(function () {
    $('.tambah_obat_racik').on('click', function () {
      $('#tambah_obat_racik').modal('show');
      $tr = $(this).closest('tr');
      var data = $tr.children("td").map(function () {
        return $(this).text();
      }).get();
      console.log(data);
      $('#nomor_resep').val(data[0]);
      $('#nomor_racik').val(data[1]);
      $('#jumlah_racik').val(data[4]);
    });
  });

  $(document).ready(function() {
    $(".modal").on("hidden.bs.modal", function() {
      console.clear();
      $('#nomor_resep').val("");
      $('#nomor_racik').val("");
      $('#jumlah_racik').val("");
      $('#nama_obat').val("");
      $('#kode_obat').val("");
      $('#kandungan').val("");
      $('#stok_obat').val("");
      $('#kandungan_diminta').val("");
      $('#jumlah').val("");
    });
  });

  $(document).ready(function() {
    $("#kandungan_diminta").keyup(function(){
      var jumlah_racik = $('#jumlah_racik').val();
      var kandungan = $('#kandungan').val();
      var kandungan_diminta = $('#kandungan_diminta').val();
      var jumlah = (kandungan_diminta * jumlah_racik) / kandungan;
      if (jumlah_racik && kandungan) {
        $('#jumlah').val(jumlah);
      }else{
        alert('Parameter ada yang kosong!');
      }
    });
  });

</script>
@endpush