@extends('layouts.main')

@section('content')

<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header"><i class="fas fa-file"></i> Edit User</div>
      <div class="card-body">
        <form action="{{ url('/user',['id' => $user->id]) }}" method="post">
          @csrf
          @method('PUT')

          <div class="form-group row">
            <label class="col-md-2 col-form-label">Nama</label>
            <div class="col-md-10">
              <input type="text" name="nama" class="form-control {{ $errors->has('nama') ? 'is-invalid' : ''}}" value="{{ $user->name }}" autocomplete="off">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-md-2 col-form-label">Email</label>
            <div class="col-md-10">
              <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" value="{{ $user->email }}">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-md-2 col-form-label">Username</label>
            <div class="col-md-10">
              <input type="text" name="username" class="form-control" value="{{ $user->username }}" readonly="">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-md-2 col-form-label">Password</label>
            <div class="col-sm-6">
              <input type="text" name="password" class="form-control" autocomplete="off">
            </div>
            <div class="col-sm-4">
              <div class="text-muted" style="font-size:10px;">*Kosongkan jika tidak ingin mengganti password.</div>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-md-2 col-form-label"></label>
            <div class="col-md-10">
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