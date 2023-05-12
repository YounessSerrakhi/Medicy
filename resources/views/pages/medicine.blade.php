@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html>
  <head>
    <title>Medicine List</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.6.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col">
          <h1>Medicine List</h1>
        </div>
        <div class="col-3">
          <form role="search">
            <div class="input-group">
              <input class="form-control" type="search" placeholder="Search" aria-label="Search">
            </div>
          </form>
        </div>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Form</th>
            <th>Marketing Status</th>
            <th>Approval Date</th>
            <th>quantité</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($medicines as $medicine)
                
            
          <tr>
            <td>{{$medicine->idMedicine}}</td>
            <td>{{$medicine->name}}</td>
            <td>{{$medicine->form}}</td>
            <td>{{$medicine->marketingStatus}}</td>
            <td>{{$medicine->approvalDate}}
            <td>
              <form method="GET" action="{{ route('demand.create', ['id' => $medicine->idMedicine]) }}">
                  @csrf
                  <div>
                      <label for="quantity">Quantity:</label>
                      <input type="number" id="quantity_{{$medicine->idMedicine}}" name="quantity" value="1" min="1">
                      <button type="button" onclick="increment({{$medicine->idMedicine}})">+</button>
                      <button type="button" onclick="decrement({{$medicine->idMedicine}})">-</button>
                  </div>
                  <button type="submit">Create Stock</button>
              </form>
          </td>
          
          </tr>

          @endforeach
          <!-- Add more rows for additional medicines -->
        </tbody>
      </table>
      <div class="pagination justify-content-center">
        {{ $medicines->links() }}
      </div>
    </div>
  </body>
</html>

<!-- this is script to increment and decrement les quantité-->
<script>
  function increment(id) {
      document.getElementById('quantity_'+id).stepUp();
  }

  function decrement(id) {
      document.getElementById('quantity_'+id).stepDown();
  }
</script>




@endsection