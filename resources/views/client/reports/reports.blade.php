@extends('layouts.clientNav')

@section('content')
    <h3>Last 5 reports</h3>
    <table class="table table-hover">
        <thead>

            <tr>
                <th scope="col">Date</th>
                <th scope="col">Ingevuld op</th>
                <th scope="col">Compleet</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($reportsLastFiveDays as $day)
                <tr onclick="location.href='{{ route('client.edit-report', ['id' => $day->id]) }}'">

                    <td>
                        {{ $day->created_at->diffForHumans() }}</td>
                    <td>{{ $day->filled_at->diffForHumans() }}</td>
                    <td>
                        @if ($day->filled == true)
                            ja
                        @else
                            nee
                        @endif

                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
@endsection
