@extends('layouts.clientNav')

@section('content')
    <h3>Persoonlijke gegevens</h3>

    <br>
    <span>{{$user->client->firstname}} {{$user->client->lastname}}</span> <br>
    <span>{{$user->client->street}} {{$user->client->street_nr}} </span> <br>
    <span>{{$user->client->postcode}} {{$user->client->city}} </span> <br>
    <span>{{$user->email}} </span> <br>
    <span>{{$user->client->phone_number}} </span> <br><br>
    <span>Nieuw adres? Andere naam? Dat en meer pas je hier aan. </span><br>
    <a name="" id="" class="btn btn-primary" href="{{ route('client.edit-personal-information', ['id' =>Auth::id()]) }}"  role="button">Account wijzigen</a>


</div>


@endsection
