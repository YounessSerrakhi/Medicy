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
          <form role="search" method="GET" action="{{ route('search') }}">
            <div class="input-group">
              <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search">
              <button class="btn btn-primary" type="submit">Search</button>
            </div>
          </form>
        </div>
        
      </div>
      <body>
        <style>
          /* Custom styles */
          .table-heading {
            background-color: #f8f9fa;
          }
          .table-heading th {
            font-weight: bold;
          }
        </style>
        <table class="table">
          <thead class="table-heading">
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Form</th>
              <th>Marketing Status</th>
              <th>Approval Date</th>
              <th>Price</th>
              <th>Quantity</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($medicines as $medicine)
            <tr>
              <td>{{$medicine->idMedicine}}</td>
              <td>{{$medicine->name}}</td>
              <td>{{$medicine->form}}</td>
              <td>{{$medicine->marketingStatus}}</td>
              <td>{{$medicine->approvalDate}}</td>
              <td>{{$medicine->price}}MAD</td>
              <td>
                <form method="GET" action="{{ route('demand.create', ['id' => $medicine->idMedicine]) }}">
                  @csrf
                  <div class="input-group">
                    <input type="number" id="quantity_{{$medicine->idMedicine}}" name="quantity" value="1" min="1" class="form-control">
                    <button type="submit" class="btn btn-primary">demand it</button>
                  </div>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </body>
      <div class="pagination justify-content-center">
        {{ $medicines->links() }}
      </div>
    </div>
  </body>
</html>




@endsection