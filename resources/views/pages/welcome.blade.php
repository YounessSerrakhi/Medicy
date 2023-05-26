@extends('layouts.app')
@section('content')


<style>
    .container {
        margin-top: 50px; /* Adjust the margin-top value as needed */
    }
</style>
	<div class="container">
		<div class="row">
			<div class="col-xl-6 col-md-6">
				<div class="card bg-primary text-white mb-4">
					<div class="card-body">sale Medicines</div>
					<div class="card-footer d-flex align-items-center justify-content-between">
						<a class="small text-white stretched-link" href="/sale">sale</a>
						<div class="small text-white"><i class="fas fa-cart-plus  fa-2x text-white-300"></i></div>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-md-6">
				<div class="card bg-warning text-white mb-4">
					<div class="card-body">store medicines</div>
					<div class="card-footer d-flex align-items-center justify-content-between">
						<a class="small text-white stretched-link" href="/store">store</a>
						<div class="small text-white"><i class="fas fa-archive fa-2x text-white-300"></i></div>
					</div>
				</div>
			</div>
		</div>

		<div class="card mb-4">
			<div class="card-header">
				<i class="fas fa-chart-area me-1"></i>
				Area Chart Example
			</div>
			<div class="card-body"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
			<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
		</div>
	</div>
@endsection