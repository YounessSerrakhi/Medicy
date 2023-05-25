@extends('layouts.app')

@section('content')

<section class="vh-100" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-9 col-xl-7">
        <div class="card rounded-3">
          <div class="card-body p-4">

            <h4 class="text-center my-3 pb-3">to store list</h4>

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
              <tbody id="itemsTable">
              </tbody>
            </table>

            <div class="text-center">
              <button id="generateInvoiceBtn" class="btn btn-primary">confirm delivrey</button>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<script>
  var stockItems = [];

  // Retrieve the form element
  var searchForm = document.getElementById('searchForm');

  // Handle the form submission
  searchForm.addEventListener('submit', function(event) {
    event.preventDefault();
    var barcodeInput = document.getElementById('barcodeInput');
    var inputValue = barcodeInput.value;
    var values = inputValue.split(',');
    var barcode = values[0].trim(); // Remove spaces around the barcode
    var quantity = values[1].trim(); // Remove spaces around the quantity
    ajxRqst(barcode, quantity);
  });

  var inputField = document.getElementById('barcodeInput');
  inputField.focus();
  inputField.addEventListener("keydown", function(event) {
    if (event.key === " ") {
      event.preventDefault(); // Prevent the space character from being entered in the input field
      var inputValue = event.target.value;
      var values = inputValue.split(',');
      var barcode = values[0].trim(); // Remove spaces around the barcode
      var quantity = values[1].trim(); // Remove spaces around the quantity
      ajxRqst(barcode, quantity);
    }
  });

  function ajxRqst(barcode, quantity) {
    // Send the Ajax request
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '{{ route('inDemande.searchDemandeItems') }}'); // Replace with your search route

    // Set the CSRF token in the request header
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.onload = function() {
      if (xhr.status === 200) {
        var response = JSON.parse(xhr.responseText);
        var item = response.item; // Assuming the server responds with the item data

        var newRow = '<tr id=' + item.number + '>' +
          '<th scope="row">' + item.number + '</th>' +
          '<td>' + item.name + '</td>' +
          '<td>' + item.quantity + '</td>' +
          '<td>' +
          '<button type="button" class="deleteRowBtn btn btn-danger">Delete</button>' +
          '</td>' +
          '</tr>';

        var tableBody = document.getElementById('itemsTable');
        if (tableBody) {
          tableBody.insertAdjacentHTML('beforeend', newRow);

          // Add the item to the stockItems array
          stockItems.push({ id: item.number, quantity: item.quantity });
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
  }

  var itemsTable = document.getElementById('itemsTable');
  itemsTable.addEventListener('click', function(event) {
    if (event.target.matches('.deleteRowBtn')) {
      var row = event.target.closest('tr');
      if (row) {
        var itemId = row.id;
        var itemIndex = stockItems.findIndex(function(item) {
          return item.id === itemId;
        });
        if (itemIndex !== -1) {
          var item = stockItems[itemIndex];
          result -= parseFloat(row.querySelector('td:nth-child(4)').textContent) * parseInt(item.quantity);
          stockItems.splice(itemIndex, 1);
        }
        row.remove();
      }
    }
  });

  var generateInvoiceBtn = document.getElementById('generateInvoiceBtn');
  generateInvoiceBtn.addEventListener('click', function() {
    var invoiceContent = "<h1>Bon de confirmation de livraison</h1>" +
      '<table>' +
      '<thead>' +
      '<tr>' +
      '<th>Item</th>' +
      '<th>Quantity</th>' +
      '</tr>' +
      '</thead>' +
      '<tbody>';

    var rows = itemsTable.querySelectorAll('tr');
    rows.forEach(function(row) {
      var columns = row.querySelectorAll('td');
      var item = columns[0].textContent;
      var quantity = columns[1].textContent;
      invoiceContent += '<tr>' +
        '<td>' + item + '</td>' +
        '<td>' + quantity + '</td>' +
        '</tr>';
    });

    var invoiceWindow = window.open('', 'Invoice', 'width=800,height=600');
    invoiceWindow.document.open();
    invoiceWindow.document.write('<html><head><title>Invoice</title></head><body>');
    invoiceWindow.document.write(invoiceContent);
    invoiceWindow.document.write('</body></html>');
    invoiceWindow.document.close();
    invoiceWindow.print();

    // Delete items from the stocks table
    addStockItems(stockItems);

    // Clear the items table and reset the variables
    itemsTable.innerHTML = '';
    stockItems = [];

  });

  function addStockItems(items) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '{{ route('stock.addItems') }}');

    // Set the CSRF token in the request header
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.onload = function() {
      if (xhr.status === 200) {
        console.log('Stock items deleted successfully');
      } else {
        console.error('Request failed. Status:', xhr.status);
      }
    };

    xhr.onerror = function() {
      console.error('Request failed. Network error');
    };

    xhr.send(JSON.stringify(items));
  }
</script>


@endsection
