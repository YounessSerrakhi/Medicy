@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Client demands</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Username</th>
                <th>User Mail</th>
                <th>Demand</th>
                <th>Quantité</th>
                <th>Date du demande</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($demandes as $demande)
            <tr>
                <td>{{$demande->name}}</td>
                <td>{{$demande->email}}</td>
                <td>{{$demande->demande}}</td>
                <td>{{$demande->quantity}}</td>
                <td>{{$demande->created_at}}</td>
                <td>
                    <form action="{{ route('destroyClientDemande', ['id' => $demande->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection