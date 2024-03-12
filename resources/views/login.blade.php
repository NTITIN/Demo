@extends('main')

@section('content')
<style>
	.card-header img{
		padding-top: 10px;
		padding-bottom: 10px;
	}
	.card-header{
		background: #fff;
		border-bottom: 0px !important;
	}
	
</style>
@if($message = Session::get('success'))

<div class="alert alert-info">
{{ $message }}
</div>

@endif

<div class="row justify-content-center">
	<div class="col-md-4">
		<div class="card text-center">
			<div class="card-header">
				<img src="{{ asset('img/logo.png') }}" width="100">
			</div>
			<div class="card-body">
				<form action="{{ route('validate_login') }}" method="post">
					@csrf
					<div class="form-group text-left mb-4">
						<label for="email_address">Enter User Name</label>
						<input type="text" name="email_address" class="form-control" placeholder="Email" />
						@if($errors->has('email'))
							<span class="text-danger">{{ $errors->first('email') }}</span>
						@endif
					</div>
					<div class="form-group text-left mb-5">
						<label for="password">Enter Password</label>
						<input type="password" name="password" class="form-control" placeholder="Password" />
						@if($errors->has('password'))
							<span class="text-danger">{{ $errors->first('password') }}</span>
						@endif
					</div>
					<div class="d-grid mx-auto mb-5">
						<button type="subit" class="btn btn-dark btn-block">Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection('content')