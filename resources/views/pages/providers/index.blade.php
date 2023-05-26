@extends('layouts.app')

@section('style')

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

@endsection

@section('content')

  <div class="card">
    <div class="card-header">
      <h5 class="mb-0">Providers</h5>
    </div>
    <div class="card-body">
      <div class="row">
        @foreach ($providers as $provider)
        <div class="col-sm-4 mb-3">
          <div class="card" id="xo">
            <div class="card-body">
              <h5 class="card-title">{{$provider->name}}</h5>
              <p class="card-text"><strong>City:</strong> {{$provider->city}}</p>
              <p class="card-text"><strong>Address:</strong> {{$provider->Address}}</p>
              <p class="card-text"><strong>Phone:</strong> {{$provider->tel}}</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>

@endsection
