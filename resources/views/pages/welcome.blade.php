@extends('layouts.app')
@section('content')
	<h1>hello pharmacy</h1>
	<div class="container">
		<div class="row">
			<div class="col-xl-6 col-md-6">
				<div class="card bg-primary text-white mb-4">
					<div class="card-body">sale Medicines</div>
					<div class="card-footer d-flex align-items-center justify-content-between">
						<a class="small text-white stretched-link" href="/lsapp/public/sale">sale</a>
						<div class="small text-white"><i class="fas fa-cart-plus  fa-2x text-white-300"></i></div>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-md-6">
				<div class="card bg-warning text-white mb-4">
					<div class="card-body">store medicines</div>
					<div class="card-footer d-flex align-items-center justify-content-between">
						<a class="small text-white stretched-link" href="#">store</a>
						<div class="small text-white"><i class="fas fa-archive fa-2x text-white-300"></i></div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection