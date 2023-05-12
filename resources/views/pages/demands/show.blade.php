@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Demand Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $medicine->name }}</h5>
                <ul>
                    <li>id : {{$medicine->idMedicine}}</li>
                    <li>form : {{$medicine->form}}</li>
                    <li>Marketing Status : {{$medicine->marketingStatus}}</li>
                    <li>Approval Date : {{$medicine->approvalDate}}</li>
                </ul>    

                <h5 >Provider: {{ $provider->name }}</h5>
                <ul>
                    <li>Ville : {{$provider->city}}</li>
                    <li>tel : {{$provider->tel}}</li>
                    <li>nom du livreur : {{$inDemand->livreurname}}</li>
                    <li>tel de livreur{{$inDemand->livreurtel}}</li>
                </ul> 
                <h5 class="card-text">Quantity: {{ $inDemand->quantity }}</h5>
                <a href="{{ route('demand.edit', ['idDemand' => $inDemand->idDemand]) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('demand.destroy', ['idDemand' => $inDemand->idDemand]) }}" method="DELETE" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection