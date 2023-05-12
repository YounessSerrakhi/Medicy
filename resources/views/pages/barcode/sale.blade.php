@extends('layouts.app')
@section('content')

<section class="vh-100" style="background-color: #eee;">
	<div class="container py-5 h-100">
	  <div class="row d-flex justify-content-center align-items-center h-100">
		<div class="col col-lg-9 col-xl-7">
		  <div class="card rounded-3">
			<div class="card-body p-4">
  
			  <h4 class="text-center my-3 pb-3">Sales list</h4>
  
			  <form id="searchForm" class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2">
				<div class="col-12">
				  <div class="form-outline">
					<input type="text" id="barcodeInput" class="form-control" />
					<label class="form-label" for="form1">Enter the barcode here</label>
				  </div>
				</div>
  
				<div class="col-12">
				  <button type="submit" class="btn btn-primary">Add</button>
				</div>
  
				<div class="col-12">
				  <button type="submit" class="btn btn-warning">Charges</button>
				</div>
			  </form>
  
			  <table class="table mb-4">
				<thead>
				  <tr>
					<th scope="col">No.</th>
					<th scope="col">Medicine item</th>
					<th scope="col">Quantité</th>
					<th scope="col">Actions</th>
				  </tr>
				</thead>
				<tbody id=itemsTable>
				  <tr>
					<th scope="row">1</th>
					<td>Buy groceries for next week</td>
					<td>In progress</td>
					<td>
					  <button type="submit" class="btn btn-danger">Delete</button>
					  <button type="submit" class="btn btn-success ms-1">edit</button>
					</td>
				  </tr>
				</tbody>
			  </table>
  
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </section>

  


  <script>
    // Retrieve the form element
var searchForm = document.getElementById('searchForm');

// Handle the form submission
searchForm.addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent the default form submission

  var barcodeInput = document.getElementById('barcodeInput');
  var inputValue = barcodeInput.value;
  var values = inputValue.split(',');
  var barcode = values[0].trim(); // Remove spaces around the barcode
  var quantity = values[1].trim(); // Remove spaces around the quantity

  // Send the Ajax request
  var xhr = new XMLHttpRequest();
  xhr.open('POST', '{{ route('stock.searchItems') }}'); // Replace with your search route

  // Set the CSRF token in the request header
  var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
  xhr.setRequestHeader('Content-Type', 'application/json');

  xhr.onload = function() {
    if (xhr.status === 200) {
      var response = JSON.parse(xhr.responseText);
      var item = response.item; // Assuming the server responds with the item data

      var newRow = '<tr>' +
        '<th scope="row">' + item.number + '</th>' +
        '<td>' + item.name + '</td>' +
        '<td>' + item.quantity + '</td>' +
        '<td>' +
        '<button type="submit" class="btn btn-danger">Delete</button>' +
        '<button type="submit" class="btn btn-success ms-1">Edit</button>' +
        '</td>' +
        '</tr>';

		var tableBody = document.getElementById('itemsTable');
      if (tableBody) {
        tableBody.insertAdjacentHTML('beforeend', newRow);
      } else {
        console.error('Table body element not found');
      }
    } else {
      console.error('Request failed. Status:', xhr.status);
    }
  };

  xhr.onerror = function() {
    console.error('Request failed. Network error');
  };

  var requestData = {
    barcode: barcode,
    quantity: quantity
  };

  xhr.send(JSON.stringify(requestData));

  // Clear the barcode input field
  barcodeInput.value = '';
});

</script>


@endsection