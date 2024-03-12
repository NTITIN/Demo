@extends('main')

@section('content')

<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
		<div class="card-header text-center">Register Now</div>
		<div class="card-body">
			
			<div class="col-md-12 mb-5">
				<div class="col-md-6">
					<img class="register-image" src="{{ asset('img/register-now.png') }}">
				</div>
				<div class="col-md-6 mt-5">
					<form action="{{ route('sample.validate_registration') }}" method="POST">
						@csrf
						<div class="form-group mb-4">
							<label for="name">Enter Name</label>
							<input type="text" name="name" class="form-control" placeholder="Name" />
							@if($errors->has('name'))
								<span class="text-danger">{{ $errors->first('name') }}</span>
							@endif
						</div>
						<div class="form-group mb-4">
							<label for="name">Email Address</label>
							<input type="text" name="email" class="form-control" placeholder="Email Address" />
							@if($errors->has('email'))
								<span class="text-danger">{{ $errors->first('email') }}</span>
							@endif
						</div>
						<div class="form-group mb-5">
							<label for="name">Enter Password</label>
							<input type="password" name="password" class="form-control" placeholder="Password" />
							@if($errors->has('password'))
								<span class="text-danger">{{ $errors->first('password') }}</span>
							@endif
						</div>
						<div class="d-grid mx-auto">
							<button type="submit" class="btn btn-dark btn-block text-center">Register Now</button>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>

@endsection('content')