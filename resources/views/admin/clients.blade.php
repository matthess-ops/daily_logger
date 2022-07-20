@extends('layouts.adminNav')

@section('content')
    {{-- {{json_encode($clients)}} --}}


    <ul>
        <li>get all client data</li>
        <li> create a search box with sudddddbmit button</li>
        <li> create a table with the client data</li>
        <li> each row has the following buttons:
            1: delete client (mentor.delete-user),

    </ul>

    <div class="container">
        <form action="{{ route('admin.search-client') }}" method="GET">
            <input type="text" name="search-client"
                @isset($searchQuery) value= "{{ $searchQuery }}" @endisset />
            <button type="submit" class="btn btn-primary">Zoek</button>
        </form>
    </div>

    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Voornaam</th>
                    <th>Achternaam</th>
                    <th>Email</th>
                    <th>Nummer</th>
                    <th>Account status</th>


                </tr>
            </thead>
            <tbody>

                @foreach ($clients as $client)

                        <tr onclick="location.href='{{ route('admin.show-client', ['id' => $client->id]) }}'">

                        <td>{{ $client->firstname }}</td>
                    <td>{{ $client->lastname }}</td>
                    <td>{{ $client->user->email }}</td>
                    <td>{{ $client->phone_number }}</td>
                    <td>
                    @if ($client->user->account_status)
                        active
                    @else
                        non-active
                    @endif

                     </td>

                </tr>
     @endforeach

            </tbody>
        </table>

    </div>

    {{ $clients->links() }}
@endsection
