@extends('layouts.clientNav')

@section('content')
{{-- {{json_encode($reportsLastFiveDays) }}

<ul>
    <li>get daily rapport questions</li>
    <li>check if daily rapport questions needs to be filled (ymko are daily rapport questions adjustable after submitting)</li>
    <li>show daily rapport questions form</li>
    <li>submit form</li>
    <li>after submittinng redirect to this same page</li>
</ul> --}}
<a href="{{route('client.update-personal-information',['id'=>Auth::id()])}}">

<button>asdfasdf</button>
</a>

<h3>Last 5 reports</h3>
<table class="table table-hover">
    <thead>

      <tr>
        <th scope="col">Date</th>
        <th scope="col">Start invullen</th>
        <th scope="col">Compleet</th>
      </tr>

    </thead>
    <tbody>
        @foreach ($reportsLastFiveDays as $day)


<tr onclick="location.href='{{route('client.update-personal-information',['id'=>Auth::id()])}}'">

    <td>    <a href="{{route('client.update-personal-information',['id'=>Auth::id()])}}">
        {{ $day->created_at ->diffForHumans() }} </a></td>
    <td>{{ $day->started_at ->diffForHumans() }}</td>
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
