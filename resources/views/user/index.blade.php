@extends('layouts.main')

@section('content') 

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<i class="fas fa-list"></i> User
			</div>
			<div class="card-body">

				<form action="" method="get">
					<div class="form-group row">
						<div class="col-sm-2 col-md-2">
							<a href="{{ url('/user/create') }}" class="btn btn-primary">
								<i class="fa fa-plus"></i> Tambah
							</a>
						</div>    
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
								<th>ID</th>
								<th>Nama</th>
								<th>Email</th>
								<th>Username</th>
								<th>Created_at</th>
								<th>Updated_at</th>
								<th>#</th>
							</tr>
						</thead>
						<tbody>
							@foreach($user as $data)
							<tr>
								<td>{{ $data->id }}</td>
								<td>{{ $data->name }}</td>
								<td>{{ $data->email }}</td>
								<td>{{ $data->username }}</td>
								<td>{{ $data->created_at }}</td>
								<td>{{ $data->updated_at }}</td>
								<td>                      
									<div class="btn-group">
										<a href="{{ url('/user', ['id' => $data->id]).'/edit' }}" class="btn btn-warning">
											<i class="fas fa-pencil-alt"></i> Edit
										</a>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					{!! $user->appends(['select' => $select])->links('pagination::bootstrap-4') !!}
				</div>

			</div>
		</div>
	</div>
</div>

@endsection