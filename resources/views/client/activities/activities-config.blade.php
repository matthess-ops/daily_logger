@extends('layouts.clientNav')

@section('content')
{{$activityValues}}
    <div class="row">
        <h1>activities config</h1>

    </div>

    <div class="row">
        <h3>main activities</h3>

    </div>

    <form action="{{route('client.activities-config.add.mainactivity')}}" method="POST">
        @csrf
        <div class="form-group row">
            <label>Add main activity</label>
            <input type="text" name="mainActivityCreate" class="form-control @error('mainActAdd') is-invalid @enderror">

            @error('mainActAdd')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        </div>
        <div class="row">
            <button class="btn btn-primary mt-2" type="submit" name="action">save</button>

        </div>

    </form>
 
    <form action="{{route('client.activities-config.delete.mainactivity')}}" method="POST">
  

        @csrf
        <div class="form-group row">
            <label>Remove main activity</label>
            <select class="form-control" name="mainActivityDelete">
                @foreach ($activityValues->main_activities as $mainActivity)
                <option value = "{{$mainActivity["id"]}}">{{$mainActivity["activity"]}}</option>

                @endforeach
            </select>
            <button class="btn btn-primary mt-2" type="submit" >remove</button>

        </div>

    </form>

    <form action="{{route('client.activities-config.add.scaledactivity')}}" method="POST">
        @csrf
        <div class="form-group row">
            <label >Add scaled activity</label>
            <input type="text" name="scaledActivityCreate" class="form-control" >
            <button class="btn btn-primary mt-2" type="submit" >save</button>
        </div>
    </form>

    <form action="{{route('client.activities-config.delete.scaledactivity')}}" method="POST">
        @csrf
        <div class="form-group row">
            <label>Remove scaled activity</label>
            <select class="form-control" name="scaledActivityDelete">
                @foreach ($activityValues->scaled_activities as $scaledActivity)
                <option value = "{{$scaledActivity["id"]}}">{{$scaledActivity["activity"]}}</option>

                @endforeach
            </select>
            <button class="btn btn-primary mt-2" type="submit" name="action">remove</button>

        </div>

    </form>

@endsection
