@extends('layouts.clientNav')

@section('content')
    <h1>activities logger</h1>
    <div id="app">
    {{-- <test-component> --}}
        
        {{dd($activityLog)}}
        {{-- {{ json_encode($activityValues->created_at) }} --}}
        {{-- @foreach ($$activityLog->activity_data as $timeslot)
        <div>test</div>
      
        @endforeach --}}





    </div>

<div>

    <h1>Custom Checkboxes</h1>
    <label class="containert">One
      <input style="background-color: #2196F3;" type="checkbox" checked="checked">
      <span class="checkmark"></span>
    </label>
    <label class="containert">Two
      <input style="background-color: #2196F3;"  type="checkbox">
      <span class="checkmark"></span>
    </label>
    <label class="containert">Three
      <input type="checkbox">
      <span style="background-color:blueviolet" class="checkmark"></span>
    </label>
    <label class="containert">Four
      <input type="checkbox">
      <span class="checkmark"></span>
    </label>
    

</div>

    <div class="container">
        <div class="row">
            <div style="background-color: " class="col-6">
                asdfasdf
                <input style="accent-color: limegreen
                " type="checkbox" name="" id="">
                <input style="background-color:red" type="checkbox" name="" id="">
                <input class="background-color: #D7B1D7;" type="checkbox" name="" id="">
                <input type="checkbox" name="" id="">

            </div>
            <div class="col-6">
                asdfasf
                <input type="checkbox" name="" id="">
                <input type="checkbox" name="" id="">
                <input type="checkbox" name="" id="">
                <input type="checkbox" name="" id="">

            </div>
        </div>
    </div>

    {{-- <div class="container">

        <h4>00:00 - 06:00</h4>
        <div class="row">

        <div class="col-sm-6">
            <div class="row">

            @for ($i = 0; $i < 3; $i++)
                <div class="col-4 border border-primary">

                    <div class="row d-flex justify-content-center">
                        0{{$i}}:00 - 0{{$i+1}}:00
                    </div>

                    <div class="row d-flex justify-content-center">
                        <div class="form-check form-check-inline">
                            <input id="my-input" class="form-check-input" type="checkbox" name="" value="true">
                        </div>
                        <div class="form-check form-check-inline">
                            <input id="my-input" class="form-check-input" type="checkbox" name="" value="true">
                        </div>
                        <div class="form-check form-check-inline">
                            <input id="my-input" class="form-check-input" type="checkbox" name="" value="true">
                        </div>
                        <div class="form-check form-check-inline mr-0">
                            <input id="my-input" class="form-check-input " type="checkbox" name="" value="true">
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        </div>


        <div class="col-sm-6">
            <div class="row">

            @for ($i = 0; $i < 3; $i++)
                <div class="col-4 border border-primary">

                    <div class="row d-flex justify-content-center">
                       0{{$i+3}}:00 - 0{{$i+4}}:00
                    </div>

                    <div class="row d-flex justify-content-center">
                        <div class="form-check form-check-inline">
                            <input id="my-input" class="form-check-input" type="checkbox" name="" value="true">
                        </div>
                        <div class="form-check form-check-inline">
                            <input id="my-input" class="form-check-input" type="checkbox" name="" value="true">
                        </div>
                        <div class="form-check form-check-inline">
                            <input id="my-input" class="form-check-input" type="checkbox" name="" value="true">
                        </div>
                        <div class="form-check form-check-inline mr-0">
                            <input id="my-input" class="form-check-input " type="checkbox" name="" value="true">
                        </div>
                    </div>
                </div>
            @endfor
        </div>

        </div> --}}
    </div>





    </div>
@endsection
