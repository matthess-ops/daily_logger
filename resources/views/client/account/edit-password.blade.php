@extends('layouts.clientNav')

@section('content')
    <h4>Verander wachtwoord</h4>
    {{-- {{route('client.update-personal-information',['id'=>Auth::id()])}} --}}
    <form action="{{route('client.update-password',['id'=>Auth::id()])}}" method="POST">
        {{ method_field('PUT') }}

        @csrf
        {{-- <div class="row">
            <div class="col-sm-6 mt-3">
                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password"
                    placeholder="Het oude wachtwoord">
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div> --}}
      <div class="row">

        <div class="col-sm-6 mt-3">
            <input class="form-control @error('password_new') is-invalid @enderror" type="password" name="password_new"
                placeholder="Het nieuwe wachtwoord">
                @error('password_new')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row">

        <div class="col-sm-6 mt-3">
            <input class="form-control @error('password_new_confirmation') is-invalid @enderror" type="password" name="password_new_confirmation"
                placeholder="Bevestig het nieuwe wachtwoord">
                @error('password_new_confirmation')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

        <div class="row">
            <div class="col-sm-6 mt-3">
                <button class="btn btn-primary m-1" type="submit" name="action" value="update">Nieuwe wachtwoord opslaan</button>

            </div>

        </div>


    </form>
    {{$errors}}

</div>

@endsection


