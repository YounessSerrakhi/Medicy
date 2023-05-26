@extends('layouts.app')
@section('content')

	<div class="container">
		<h1>Medicine Cart</h1>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Item Name</th>
					<th>Dosage</th>
					<th>Delivery Details</th>
				</tr>
			</thead>
			<tbody id="medicine-list">
				<tr>
					<td>Aspirin</td>
					<td>500mg</td>
					<td>
						<button class="btn btn-sm btn-info details-btn" data-toggle="modal" data-target="#details-modal" data-livreur="John">Details</button>
					</td>
				</tr>
				<tr>
					<td>Paracetamol</td>
					<td>1000mg</td>
					<td>
						<button class="btn btn-sm btn-info details-btn" data-toggle="modal" data-target="#details-modal" data-livreur="Jane">Details</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

	<!-- Modal for viewing details -->
	<div class="modal fade" id="details-modal" tabindex="-1" role="dialog" aria-labelledby="details-modal-label" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="details-modal-label">Delivery Details</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p><strong>Livreur:</strong> <span id="livreur-name"></span></p>
					<p><strong>Delivery Address:</strong> 123 Main St.</p>
					<p><strong>Delivery Date:</strong> April 10, 2023</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function() {
			// Details button click
			$('.details-btn').click(function() {
				// Get livreur name from data attribute
				var livreurName = $(this).data('livreur');
				// Set livreur name in modal
				$('#livreur-name').text(livreurName);
			});
		});
	</script>

@endsection