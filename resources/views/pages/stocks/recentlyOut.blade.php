@extends('layouts.app')
@section('content')

<table class="table">
    <thead>
      <tr>
        <h1>Recently out of stock</h1>
        <th>ID</th>
        <th>Name</th>
        <th>Form</th>
        <th>Marketing Status</th>
        <th>Approval Date</th>
        <th>prix</th>
        <th>quantité</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($outOfStocks as $out)
          
      
    <tr>
      <td>{{$out->id}}</td>
      <td>{{$out->name}}</td>
      <td>{{$out->form}}</td>
      <td>{{$out->marketingStatus}}</td>
      <td>{{$out->approvalDate}}</td>
      <td>{{$out->price}}MAD</td>
      <td>{{$out->quantity}}</td>
      <td>
        <form method="GET" action="{{ route('demand.create', ['id' => $out->id]) }}">
            @csrf
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" value="1" min="1" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">commander</button>
        </form>
    </td>
    
    </tr>

    @endforeach
    </tbody>
</table>
</div>

@endsection