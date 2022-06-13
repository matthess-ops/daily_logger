@extends('layouts.clientNav')

@section('content')
    <h3>Persoonlijke gegevens wijzigen</h3>
    {{-- "{{ route('client.account.save') }}" --}}
    <form action="{{route('client.update-personal-information',['id'=>Auth::id()])}}" method="POST">
        {{ method_field('PUT') }}

        @csrf
        <div class="row mt-3">
            <div class="col-sm-6">
                <input class="form-control @error('firstname') is-invalid @enderror" type="text" name="firstname" value="{{ $user->client->firstname }}"
                    placeholder="Voornaam">
                    @error('firstname')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>

            <div class="col-sm-6">
                <input class="form-control @error('lastname') is-invalid @enderror" type="text" name="lastname" value="{{ $user->client->lastname }}"
                    placeholder="Achternaam">
                    @error('lastname')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{ $user->email }} " placeholder="email">
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>

        </div>

        <div class="row mt-3">
            <div class="col-12">
                <input class="form-control @error('phone_number') is-invalid @enderror" type="text" name="phone_number" value="{{ $user->client->phone_number }} " placeholder="Telefoon">
                @error('phone_number')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>

        </div>

        <div class="row mt-3">
            <div class="col-sm-9">
                <input class="form-control @error('street') is-invalid @enderror" type="text" name="street" value="{{ $user->client->street }} "
                    placeholder="Straatnaam">
                    @error('street')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-sm-3">
                <input class="form-control @error('street_nr') is-invalid @enderror" type="text" name="street_nr" value="{{ $user->client->street_nr }} "
                    placeholder="Straatnummer">
                    @error('street_nr')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <div class="row mt-3">
            <div class="col-sm-9">
                <input class="form-control @error('city') is-invalid @enderror" type="text" name="city" value="{{ $user->client->city }} "
                    placeholder="Plaat">
                    @error('city')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="col-sm-3">
                <input class="form-control @error('postcode') is-invalid @enderror" type="text" name="postcode" value="{{ $user->client->postcode }} "
                    placeholder="Postcode">
                    @error('postcode')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


        </div>

        <button class="btn btn-primary m-1" type="submit" name="action" value="update">Opslaan</button>


    </form>
</div>


@endsection
