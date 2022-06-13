@extends('layouts.clientNav')

@section('content')
    <ul>
        <li>get NAW data of user</li>
        <li>create a form with the naw data</li>
        <li>user changes data</li>
        <li>user submits data</li>
        <li>redirect to this page</li>

    </ul>
    <h4>test {{ $client->street }} </h4>
    <h4>user id ={{ Auth::id() }}
    </h4>

    <div class="container border">

    <h5 class="mt-3">Account gegevens</h5>

    <form action="{{ route('client.account.save') }}" method="POST">
        @csrf
        <div class="row mt-3">
            <div class="col-sm-6">
                <input class="form-control" type="text" name="firstname" value="{{ $client->firstname }}"
                    placeholder="Voornaam">

            </div>
            <div class="col-sm-6">
                <input class="form-control" type="text" name="lastname" value="{{ $client->lastname }}"
                    placeholder="Achternaam">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <input class="form-control" type="text" name="email" value="{{ $user->email }} " placeholder="email">

            </div>

        </div>

        <div class="row mt-3">
            <div class="col-12">
                <input class="form-control" type="text" name="phone_number" value="{{ $client->phone_number }} " placeholder="Telefoon">

            </div>

        </div>

        <div class="row mt-3">
            <div class="col-sm-9">
                <input class="form-control" type="text" name="street" value="{{ $client->street }} "
                    placeholder="Straatnaam">

            </div>
            <div class="col-sm-3">
                <input class="form-control" type="text" name="street_nr" value="{{ $client->street_nr }} "
                    placeholder="Straatnummer">
            </div>

        </div>

        <div class="row mt-3">
            <div class="col-sm-9">
                <input class="form-control" type="text" name="city" value="{{ $client->city }} "
                    placeholder="Plaat">

            </div>
            <div class="col-sm-3">
                <input class="form-control" type="text" name="postcode" value="{{ $client->postcode }} "
                    placeholder="Postcode">
            </div>

        </div>

        <button class="btn btn-primary m-1" type="submit" name="action" value="update">Opslaan</button>


    </form>

</div>

    <p>{{$errors}}</p>
    <p>{{ $client }}</p>
@endsection
