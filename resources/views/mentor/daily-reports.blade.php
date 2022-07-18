@extends('layouts.mentorNav')

@section('content')
{{ $reports }}
<ul>
    <li> get all open daily mentor reports (aka the reports that the mentors need to fll out for their clients)</li>
    <li> create a table with mentor reports also include client name and email</li>
    <li> after clicking on a row the mentor is brought to a report fill out form link to  (mentor.daily-report with id of the report)</li>
    <li> after submitting the form redirect to this page</li>

</ul>

@endsection
