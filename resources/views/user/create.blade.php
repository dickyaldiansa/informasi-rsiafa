@extends('layouts.main')

@section('content')

<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header"><i class="fas fa-file"></i> Tambah User</div>
			<div class="card-body">
				<form action="{{ url('/user') }}" method="post">
					@csrf
					
					<div class="form-group row">
						<label class="col-md-4 col-form-label">Nama</label>
						<div class="col-md-8">
							<input type="text" name="nama" class="form-control" id="nama" placeholder="Search Dokter...">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-4 col-form-label">Username</label>
						<div class="col-md-8">
							<input type="text" name="username" class="form-control" id="username" readonly="">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-4 col-form-label">Email</label>
						<div class="col-md-8">
							<input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" value="{{ old('email') }}" autocomplete="off">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-4 col-form-label">Password</label>
						<div class="col-md-8">
							<input type="text" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" value="{{ old('password') }}" autocomplete="off">
						</div>
					</div>
					
					<div class="form-group row">
						<label class="col-md-4 col-form-label"></label>
						<div class="col-md-8">
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

@endsection

@push('scripts')

<script type="text/javascript">
	$(document).ready(function() {
		$("#nama").autocomplete({
			minLength: 3,
			source: function( request, response ) {
				$.ajax({
					url: "{{ url('/search/dokter') }}",
					dataType: "json",
					data: {search: request.term},
					success: function(data) {response(data);}
				});
			},
			select: function(event, ui){
				event.preventDefault();
				$("#nama").val(ui.item.nm_dokter);
				$("#username").val(ui.item.kd_dokter);
			},
			focus: function (event, ui) {
				event.preventDefault();
				$("#nama").val(ui.item.nm_dokter);
			}
		}).autocomplete( "instance" )._renderItem = function( ul, item ) {
			return $("<li>")
			.append("<dd><small>" + item.nm_dokter + "</small></dd>")
			.appendTo( ul );
		};
	});

</script>

@endpush