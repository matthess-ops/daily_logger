@extends('layouts.clientNav')

@section('content')
    <h3>Report edit</h3>
    {{ json_encode($report) }}
    {{-- the report update form --}}
    <form action="{{ route('client.update-report', ['id' => $report->id]) }}" method="POST">
        {{ method_field('PUT') }}

        @csrf
        {{-- check if the report already has scores: The user is able to change the scores during the day to better reflect their state --}}

        @if ($report->scores == [])
            @foreach ($report->questions as $question)
                <div class="form-group">
                    <label>{{ $question }}</label>
                    <select class="form-control" name="scores[]">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>

                    </select>
                </div>
            @endforeach
        @else
            {{-- there were already scores in the database. Thus the select option should be selected that reflect this score --}}
            @foreach ($report->questions as $question)
                <div class="form-group">
                    <label>{{ $question }}</label>
                    <select class="form-control" name="scores[]">
                        @for ($i = 1; $i < 11; $i++)
                            {{-- set the option to selected when if matches the previous score in the database --}}
                            @if ($i == $report->scores[$loop->index])
                                <option selected value="{{ $i }}">{{ $i }}</option>
                            @else
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endif
                        @endfor


                    </select>
                </div>
            @endforeach
        @endif

        <button class="btn btn-primary m-1" type="submit">Save</button>

    </form>
@endsection
