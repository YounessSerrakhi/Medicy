@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit your Demand</h1>
    <form method="GET" action="{{ route('demand.save', ['idDemand' => $inDemand->idDemand]) }}">
      @csrf
      <div class="form-group">
        <label for="provider">Provider:</label>
        <select class="form-control" id="provider" name="provider">
          @foreach($providers as $provider)
            <option value="{{ $provider->idProvider }}">{{ $provider->name }} - {{ $provider->tel }} - {{ $provider->city }} - {{ $provider->Address }} - {{ $provider->livreurName }} - {{ $provider->livreurTel }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="quantity">Quantity:</label>
        <input type="number" class="form-control" id="quantity" name="quantity">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  
@endsection
