@extends('layouts.main')

@section('content') 

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<i class="fas fa-list"></i> Farmasi
			</div>
			<div class="card-body">

				<form action="" method="get">
					<div class="form-group row">
						<div class="col-sm-6 col-md-6">
							<div class="input-group">
								<input type="text" name="search" class="form-control" placeholder="Cari..." aria-label="search" aria-describedby="basic-addon2">
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
								<th>Kode Barang</th>
								<th>Nama</th>
								<th>#</th>
							</tr>
						</thead>
						<tbody>
							@foreach($farmasi as $data)
							<tr>
								<td>{{ $data->kode_brng }}</td>
								<td>{{ $data->nama_brng }}</td>
								<td>                      
									<div class="btn-group">
										<a href="{{ url('/farmasi', ['id' => $data->kode_brng]).'/aktif' }}" class="btn btn-warning">
											<i class="fas fa-pencil-alt"></i> Aktif
										</a>
										<a href="{{ url('/farmasi', ['id' => $data->kode_brng]).'/nonaktif' }}" class="btn btn-warning">
											<i class="fas fa-pencil-alt"></i> Non Aktif
										</a>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					{!! $farmasi->appends(['select' => $select])->links('pagination::bootstrap-4') !!}
				</div>

			</div>
		</div>
	</div>
</div>

@endsection