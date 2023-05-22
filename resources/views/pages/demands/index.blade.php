@extends('layouts.app')
@section('content')
	<div class="container">
		<h1>Medicine Cart</h1>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Medicine Name</th>
           			<th>Provider Name</th>
           			<th>Quantity</th>
				</tr>
			</thead>
			<tbody id="medicine-list">
				@foreach ($inDemands as $inDemand)
				<tr>
					<td>{{ $medicines[$inDemand->idMedicine]->name }}</td>
                	<td>{{ $providers[$inDemand->idProvider]->name }}</td>
                	<td>{{ $inDemand->quantity }}</td>
					<td>{{ $inDemand->barcode }}</td>
					<td>
						<a href="{{ route('demand.show', ['idDemand' => $inDemand->idDemand]) }}" class="btn btn-sm btn-primary">Details</a>
						<a href="{{ route('demand.edit', ['idDemand' => $inDemand->idDemand]) }}" class="btn btn-sm btn-primary">Edit</a>
						<a href="{{ route('demand.destroy', ['idDemand' => $inDemand->idDemand]) }}" class="btn btn-sm btn-primary">Delete</a>
						<a href="{{ route('stock.addStock', ['idDemand' => $inDemand->idDemand]) }}" class="btn btn-sm btn-danger">confirmer la dilévraison</a>
						
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<a id="add-btn" href="/medicine" class="btn btn-primary">demande Medicines</a>
	</div>

	<!-- Modal for editing and adding items -->
	<div class="modal fade" id="medicine-modal" tabindex="-1" role="dialog" aria-labelledby="medicine-modal-label" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="medicine-modal-label">Edit Item</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="medicine-form">
						<div class="form-group">
							<label for="medicine-name">Name:</label>
							<input type="text" class="form-control" id="medicine-name">
						</div>
						<div class="form-group">
							<label for="medicine-dosage">Dosage:</label>
							<input type="text" class="form-control" id="medicine-dosage">
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button id="save-btn" type="button" class="btn btn-primary">Save Changes</button>
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function() {
			// Edit button click
			$('.edit-btn').click(function() {
				// Get row data
				var row = $(this).
@endsection
