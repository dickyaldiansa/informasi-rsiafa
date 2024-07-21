@extends('layouts.main')
@section('title', 'Dashboard')

@section('content') 

<div class="row">

  <div class="col-12">
    <h5>Data Hari ini Tanggal @php echo date('d-m-Y')@endphp</h5>
  </div>
  <div class="col-4">
    <div class="card border-left-primary shadow py-2 mb-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-primary mb-1">
              <div class="row">
                <div class="col-md-12">
                  <h6>-</h6> 
                  <b>-</b>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-4">
    <div class="card border-left-primary shadow py-2 mb-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-primary mb-1">
              <div class="row">
                <div class="col-md-12">
                  <h6>-</h6>
                  <b>-</b>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-4">
    <div class="card border-left-primary shadow py-2 mb-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-primary mb-1">
              <div class="row">
                <div class="col-md-12">
                  <h6>-</h6> 
                  <b>-</b>
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