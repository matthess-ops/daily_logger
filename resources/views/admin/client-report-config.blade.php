@extends('layouts.adminNav')

@section('content')
    <div>
        <h3>Client report config</h3>
        {{ $questions }}
        @foreach ($questions->questions as $question)
            <div class="row mt-2">
                <div class="col-4">
                    <div>
                        {{ $question }}

                    </div>
                </div>
                <div class="col-4 ">

                    <form action="{{ route('admin.delete-client-report-question', ['id' => $questions->id]) }}" method="POST">
                        @csrf

                        {{ method_field('DELETE') }}

                        <button name="id" value={{ $loop->index }} class="btn btn-primary m-1"
                            type="submit">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach


    </div>
@endsection
