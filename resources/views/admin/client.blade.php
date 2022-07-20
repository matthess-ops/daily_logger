@extends('layouts.adminNav')

@section('content')
<div>
{{$client}}
    <h3>Persoonlijke gegevens</h3>

    <br>
    <span>{{$client->firstname}} {{$client->lastname}}</span> <br>
    <span>{{$client->street}} {{$client->street_nr}} </span> <br>
    <span>{{$client->postcode}} {{$client->city}} </span> <br>
    <span>{{$client->user->email}} </span> <br>
    <span>{{$client->phone_number}} </span> <br>


        @if ($client->user->account_status)
            <span>Account is actief</span> <br><br>

            <a  class="btn btn-primary" href="{{ route('admin.toggle-client-account',['id'=>$client->user->id]) }}"  role="button">Account deactiveren</a>

        @else
        <span>Account is gedeactiveerd</span> <br><br>
        <a  class="btn btn-primary" href="{{ route('admin.toggle-client-account',['id'=>$client->user->id]) }}"  role="button">Account activeren</a>
        @endif
        {{-- admin.show-client-report-config --}}
    <a name="" id="" class="btn btn-primary" href=""  role="button">Client verwijderen</a>
    <a name="" id="" class="btn btn-primary" href="{{ route('admin.show-client-report-config',['id'=>$client->id]) }}"  role="button">Report questions config</a>





</div>
@endsection
