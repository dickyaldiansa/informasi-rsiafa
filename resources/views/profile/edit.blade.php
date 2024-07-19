@extends('layouts.main')
@section('content')

<div class="row mb-2">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header"><i class="fas fa-file"></i> Edit Pasien</div>
      <div class="card-body">
        <form action="{{ url('/pasien',['id' => $pasien->rekam_medis]) }}" method="post">
          @csrf
          @method('PUT')

          <div class="input-group mb-3">
            <label class="col-sm-3 col-form-label">No Identitas</label>
            <input type="text" name="no_identitas" class="form-control {{ $errors->has('no_identitas') ? 'is-invalid' : ''}}" value="{{ $pasien->no_identitas }}">
          </div>

{{--           <div class="input-group mb-3">
            <label class="col-sm-3 col-form-label">Jenis Bayar</label>
            <select name="jenis_bayar" class="form-control {{ $errors->has('jenis_bayar') ? 'is-invalid' : ''}}">
              @foreach($penjamin as $data)
              <option value="{{ $data->id_penjamin }}" @if($data->id_penjamin == $pasien->id_penjamin) selected @endif>{{ $data->nama_penjamin }}</option>
              @endforeach
            </select>
          </div> --}}

          <div class="input-group mb-3">
            <label class="col-sm-3 col-form-label">Nama Pasien</label>
            <input type="text" name="nama_pasien" class="form-control {{ $errors->has('nama_pasien') ? 'is-invalid' : ''}}" value="{{ $pasien->nama_pasien }}" oninput="this.value = this.value.toUpperCase()">
          </div>

          <div class="input-group mb-3">
            <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control {{ $errors->has('jenis_kelamin') ? 'is-invalid' : ''}}">
              <option value="L" @if($pasien->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
              <option value="P" @if($pasien->jenis_kelamin == 'P') selected @endif>Perempuan</option>
            </select>
          </div>

          <div class="input-group mb-3">
            <label class="col-sm-3 col-form-label">Golongan Darah</label>
            <select name="golongan_darah" class="form-control {{ $errors->has('golongan_darah') ? 'is-invalid' : ''}}">
              <option value="-">-</option>
              <option value="A" @if($pasien->golongan_darah == 'A') selected @endif>A</option>
              <option value="B" @if($pasien->golongan_darah == 'B') selected @endif>B</option>
              <option value="AB" @if($pasien->golongan_darah == 'AB') selected @endif>AB</option>
              <option value="O" @if($pasien->golongan_darah == 'O') selected @endif>O</option>
            </select>
          </div>

          <div class="input-group mb-3">
            <label class="col-sm-3 col-form-label">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control {{ $errors->has('tempat_lahir') ? 'is-invalid' : ''}}" value="{{ $pasien->tempat }}" oninput="this.value = this.value.toUpperCase()">
          </div>

          <div class="input-group mb-3">
            <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control {{ $errors->has('tanggal_lahir') ? 'is-invalid' : ''}}" value="{{ $pasien->tanggal_lahir }}">
          </div>

          <div class="input-group mb-3">
            <label class="col-sm-3 col-form-label">Agama</label>
            <select name="agama" class="form-control {{ $errors->has('agama') ? 'is-invalid' : ''}}">
             <option value="-">-</option>
             <option value="ISLAM" @if($pasien->agama == 'ISLAM') selected @endif>ISLAM</option>
             <option value="PROTESTAN" @if($pasien->agama == 'PROTESTAN') selected @endif>PROTESTAN</option>
             <option value="KATHOLIK" @if($pasien->agama == 'KATHOLIK') selected @endif>KATHOLIK</option>
             <option value="HINDU" @if($pasien->agama == 'HINDU') selected @endif>HINDU</option>
             <option value="BUDDHA" @if($pasien->agama == 'BUDDHA') selected @endif>BUDDHA</option>
             <option value="KONGHUCU" @if($pasien->agama == 'KONGHUCU') selected @endif>KONGHUCU</option>
           </select>
         </div>

         <div class="input-group mb-3">
          <label class="col-sm-3 col-form-label">Alamat</label>
          <input type="text" name="alamat" class="form-control {{ $errors->has('alamat') ? 'is-invalid' : ''}}" value="{{ $pasien->alamat }}" oninput="this.value = this.value.toUpperCase()">
        </div>

        <div class="input-group mb-3">
          <label class="col-sm-3 col-form-label">Kelurahan</label>
          <input type="text" name="kelurahan" id="kelurahan" class="form-control {{ $errors->has('kelurahan') ? 'is-invalid' : ''}}" value="{{ old('kelurahan') }}">
          <input type="hidden" name="id_kelurahan" id="id_kelurahan" value="{{ $pasien->kelurahan }}">
        </div>

        <div class="input-group mb-3">
          <label class="col-sm-3 col-form-label">Kecamatan</label>
          <input type="text" name="kecamatan" id="kecamatan" class="form-control {{ $errors->has('kecamatan') ? 'is-invalid' : ''}}" value="{{ old('kecamatan') }}" readonly>
          <input type="hidden" name="id_kecamatan" id="id_kecamatan" value="{{ old('id_kecamatan') }}">
        </div>

        <div class="input-group mb-3">
          <label class="col-sm-3 col-form-label">Kabupaten</label>
          <input type="text" name="kabupaten" id="kabupaten" class="form-control {{ $errors->has('kabupaten') ? 'is-invalid' : ''}}" value="{{ old('kabupaten') }}" readonly>
          <input type="hidden" name="id_kabupaten" id="id_kabupaten" value="{{ old('id_kabupaten') }}">
        </div>

        <div class="input-group mb-3">
          <label class="col-sm-3 col-form-label">Provinsi</label>
          <input type="text" name="provinsi" id="provinsi" class="form-control {{ $errors->has('provinsi') ? 'is-invalid' : ''}}" value="{{ old('provinsi') }}" readonly>
          <input type="hidden" name="id_provinsi" id="id_provinsi" value="{{ old('id_provinsi') }}">
        </div>

        <div class="input-group mb-3">
          <label class="col-sm-3 col-form-label">Status</label>
          <select name="status" class="form-control {{ $errors->has('pekerjaan') ? 'is-invalid' : ''}}">
           <option value="-">-</option>
           <option value="BELUM KAWIN" @if($pasien->status_nikah == 'BELUM KAWIN') selected @endif>BELUM KAWIN</option>
           <option value="KAWIN" @if($pasien->status_nikah == 'KAWIN') selected @endif>KAWIN</option>
           <option value="CERAI HIDUP" @if($pasien->status_nikah == 'CERAI HIDUP') selected @endif>CERAI HIDUP</option>
           <option value="CERAI MATI" @if($pasien->status_nikah == 'CERAI MATI') selected @endif>CERAI MATI</option>
         </select>
       </div>

       <div class="input-group mb-3">
        <label class="col-sm-3 col-form-label">Pekerjaan</label>
        <select name="pekerjaan" class="form-control {{ $errors->has('pekerjaan') ? 'is-invalid' : ''}}">
         <option value="-">-</option>
         <option value="PNS" @if($pasien->pekerjaan == 'PNS') selected @endif>PNS</option>
         <option value="SWASTA" @if($pasien->pekerjaan == 'SWASTA') selected @endif>SWASTA</option>
         <option value="WIRASWASTA" @if($pasien->pekerjaan == 'WIRASWASTA') selected @endif>WIRASWASTA</option>
         <option value="PELAJAR" @if($pasien->pekerjaan == 'PELAJAR') selected @endif>PELAJAR</option>
         <option value="BURUH" @if($pasien->pekerjaan == 'BURUH') selected @endif>BURUH</option>
         <option value="PETANI" @if($pasien->pekerjaan == 'PETANI') selected @endif>PETANI</option>
         <option value="LAINNYA" @if($pasien->pekerjaan == 'LAINNYA') selected @endif>LAINNYA</option>
       </select>
     </div>

     <div class="input-group mb-3">
      <label class="col-sm-3 col-form-label">No Telp</label>
      <input type="text" name="no_telpon" class="form-control {{ $errors->has('no_telpon') ? 'is-invalid' : ''}}" value="{{ $pasien->no_telpon }}">
    </div>

    <div class="input-group mb-3">
      <label class="col-sm-3 col-form-label">No BPJS</label>
      <input type="text" name="no_bpjs" class="form-control {{ $errors->has('no_bpjs') ? 'is-invalid' : ''}}" value="{{ $pasien->no_bpjs }}">
    </div>

    <div class="form-group row">
      <label class="col-sm-3 col-form-label"></label>
      <div class="col-sm-9">
        <button type="submit" class="btn btn-warning btn-sm">
          <i class="far fa-save"></i> Update
        </button>
      </div>
    </div>
  </form>
</div>
</div>
</div>
</div>

@endsection

@push('scripts')
<script type="text/javascript">
  $(document).ready(function() {
      
@php 
    if($pasien->kelurahan != null) {
        $idkelurahan = $pasien->kelurahan;
    }else{ 
        $idkelurahan = 0; 
    }
@endphp

    var id_kelurahan = {{ $idkelurahan }};
    
    $.ajax({
      url: 'https://api.hubungkan.my.id/wilayah/kelurahan_id.php',
      type: 'post',
      dataType: "json",
      data: {id_kelurahan: id_kelurahan},
    }).done(function(response) {

      $("#kelurahan").val(response.nama_kelurahan);
      $("#kecamatan").val(response.nama_kecamatan);
      $("#kabupaten").val(response.nama_kabupaten);
      $("#provinsi").val(response.nama_provinsi);
      $("#id_kelurahan").val(response.id_kelurahan);
      $("#id_kecamatan").val(response.id_kecamatan);
      $("#id_kabupaten").val(response.id_kabupaten);
      $("#id_provinsi").val(response.id_provinsi);

    });

    $("#kelurahan").autocomplete({
      source  : function( request, response ) {
        $.ajax({
          url: 'https://api.hubungkan.my.id/wilayah/kelurahan_name.php',
          type: 'post',
          dataType: "json",
          data: {name: request.term},
          success: function(data) {response(data);}
        });
      },
      minLength: 4,

      select:function(event, ui){
        event.preventDefault();
        $("#kelurahan").val(ui.item.nama_kelurahan);
        $("#kecamatan").val(ui.item.nama_kecamatan);
        $("#kabupaten").val(ui.item.nama_kabupaten);
        $("#provinsi").val(ui.item.nama_provinsi);
        $("#id_kelurahan").val(ui.item.id_kelurahan);
        $("#id_kecamatan").val(ui.item.id_kecamatan);
        $("#id_kabupaten").val(ui.item.id_kabupaten);
        $("#id_provinsi").val(ui.item.id_provinsi);
      },
      focus: function(event, ui) {
        event.preventDefault();
        $("#kelurahan").val(ui.item.nama_kelurahan);
        $("#id_kelurahan").val(ui.item.id_kelurahan);
      }
    }).autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
      .append( "<dl>" + item.nama_kelurahan + " - " + item.nama_kecamatan + " - " + item.nama_kabupaten + " - " + item.nama_provinsi + "</dl>"  )
      .appendTo( ul );
    };
    
  });

</script>
@endpush
