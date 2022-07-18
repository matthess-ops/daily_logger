@extends('layouts.clientNav')

@section('content')
    <h1>activities logger</h1>
    <div id="app">
        {{ $activityValues }}
        {{-- <test-component> --}}

        <form action="{{ route('client.update-activities', ['id' => $activityLog->id]) }}" method="POST">
            {{ method_field('PUT') }}

            @csrf


            <button class="btn btn-primary m-1" type="submit" name="action" value="update">Update select</button>
            <br>
            <div class="row">
                <div class="col-12">

                    <div class="form-group">
                        <label for="mainActivity">Main activity</label>
                        <select class="form-control" id="mainActivity" name="mainActivity">
                            @foreach ($activityValues->main_activities as $item)
                                <option value="{{ $item['id'] }}">{{ $item['activity'] }}</option>
                            @endforeach

                        </select>
                    </div>

                </div>
            </div>


            <div class="row">
                <span>Scaled values</span>
            </div>

            @foreach ($activityValues->scaled_activities as $item)
                <div class="row">
                    <div class="col-12">

                        <div class="form-group">
                            <label for="{{ $item['id'] }}">{{ $item['activity'] }}</label>
                            <select class="form-control" id="{{ $item['id'] }}" name="scaled[]">
                                <option value= "{{ json_encode(["id"=>$item['id'],"value"=>1]) }}">1</option>
                                <option value= "{{ json_encode(["id"=>$item['id'],"value"=>2]) }}">2</option>
                                <option value= "{{ json_encode(["id"=>$item['id'],"value"=>3]) }}">3</option>
                                <option value= "{{ json_encode(["id"=>$item['id'],"value"=>4]) }}">4</option>
                                <option value= "{{ json_encode(["id"=>$item['id'],"value"=>5]) }}">5</option>
                                <option value= "{{ json_encode(["id"=>$item['id'],"value"=>6]) }}">6</option>
                                <option value= "{{ json_encode(["id"=>$item['id'],"value"=>7]) }}">7</option>
                                <option value= "{{ json_encode(["id"=>$item['id'],"value"=>8]) }}">8</option>
                                <option value= "{{ json_encode(["id"=>$item['id'],"value"=>9]) }}">9</option>
                                <option value= "{{ json_encode(["id"=>$item['id'],"value"=>10]) }}">10</option>

                            </select>
                        </div>
                    </div>


                </div>
            @endforeach







            @php
                $moduloCounter = 1;
            @endphp

            @foreach ($activityLog->activity_data as $key => $item)
                @if ($key % 4 == 0)
                    {{ $moduloCounter - 1 }}:00 - {{ $moduloCounter }}:00

                    {{-- count iers   {{ $moduloCounter }} --}}

                    @php
                        $moduloCounter = $moduloCounter + 1;
                    @endphp
                @endif
                @if ($item['main_activity'] == null)
                    <label class="containert">checkbox {{ $item['id'] }} empty
                        <input id="{{"box_". $item['id'] }}" name="boxOn[]" value="{{ $item['id'] }}" type="checkbox">
                        <span style="background-color:chartreuse" class="checkmark"></span>
                    </label>
                @else
                    <label class="containert">checkbox {{ $item['id'] }} {{ $item['main_activity'] }}
                        <input id="{{"box_". $item['id'] }}" name="boxOn[]" value="{{ $item['id'] }}" type="checkbox">
                        <span style="background-color:{{ $item['color'] }}" class="checkmark"></span>
                    </label>
                @endif
            @endforeach
            <button class="btn btn-primary m-1" type="submit" name="action" value="update">Update select</button>

        </form>
    </div>

    <div>

        <h1>Custom Checkboxes</h1>
        <label class="containert">One
            <input style="background-color: #2196F3;" type="checkbox" checked="checked">
            <span class="checkmark"></span>
        </label>
        <label class="containert">Two
            <input style="background-color: #2196F3;" type="checkbox">
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
