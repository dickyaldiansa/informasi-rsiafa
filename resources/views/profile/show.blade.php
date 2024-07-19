@extends('layouts.main')
@section('content')

<div class="row mb-2">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header"><i class="fas fa-list"></i> Data Profile</div>
      <div class="card-body">

        <table class="table">
          <tbody>
            <tr>
              <td>Nama</td>
              <td>{{ $profile->nm_dokter }}</td>
            </tr>
            <tr>
              <td>Tempat, Tanggal Lahir</td>
              <td>{{ $profile->tmp_lahir.', '.date('d-m-Y', strtotime($profile->tgl_lahir)) }}</td>
            </tr>
            <tr>
              <td>Jenis Kelamin</td>
              <td>@if($profile->jk == 'L') Laki-Laki @else Perempuan @endif</td>
            </tr>
            <tr>
              <td>Agama</td>
              <td>{{ $profile->agama }}</td>
            </tr>
            <tr>
              <td>Status</td>
              <td>{{ $profile->stts_nikah }}</td>
            </tr>
            <tr>
              <td>No Telpon</td>
              <td>{{ $profile->no_telp }}</td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>{{ $profile->almt_tgl }}</td>
            </tr>
            <tr>
              <td>Spesialis</td>
              <td>{{ $profile->nm_sps }}</td>
            </tr>
            <tr>
              <td>Alumni</td>
              <td>{{ $profile->alumni }}</td>
            </tr>
            <tr>
              <td>No Ijin Praktek</td>
              <td>{{ $profile->no_ijn_praktek }}</td>
            </tr>
            <tr>
              <td colspan="2"><br></td>
            </tr>
            <tr>
              <td>Username</td>
              <td>{{ $profile->kd_dokter }}</td>
            </tr>
            <tr>
              <td>Password</td>
              <td>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#changePassword">Change Password</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('profile',['id' => Crypt::encryptString($profile->kd_dokter)]) }}" method="post">
          @csrf
          @method('PUT')

          <div class="form-group">
            <label class="col-form-label">New Password</label>
            <input type="password" name="newpassword" class="form-control" id="newpassword" required>
          </div>
          <div class="form-group">
            <label class="col-form-label">re-New Password</label>
            <input type="password" name="renewpassword" class="form-control" id="renewpassword" required>
          </div>
          <div class="form-group">
            <label class="col-form-label">
              <span id='message'></span>
            </label>
          </div>
          <div class="form-group">
            <label class="col-form-label"></label>
            <input type="submit" class="btn btn-primary">
          </div>
        </form>
      </div>
      <div class="modal-footer"></div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script type="text/javascript">
  $('#newpassword, #renewpassword').on('keyup', function () {
    if ($('#newpassword').val() == $('#renewpassword').val()) {
      $('#message').html('Match').css('color', 'green');
    } else 
    $('#message').html('Not Match').css('color', 'red');
  })
</script>
@endpush