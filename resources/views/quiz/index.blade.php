@extends('layouts.quiz')

@section('content')
    <h4>{{$unit->unit_title}}</h4>
    <form method="POST" action="" enctype="multipart/form-data">
        @csrf
        @foreach($unit->questions as $question)
            @if($question->isBlank)
                <div id="blank">
                    @php
                        $renderText = str_replace("[blank]","<input placeholder=\"____?____\" name=\"".$question->id."[]\" required>", nl2br(htmlentities($question->question, ENT_QUOTES)));
                    @endphp
                    <p>
                        {{$loop->iteration}}. {!! $renderText !!}
                    </p>
                </div>
            @else
                <p>{{$loop->iteration}}. {{ nl2br($question->question) }}</p>
                <div>
                    @foreach($question->options as $option)
                        <div class="custom-control custom-radio check-box-model">
                            <input type="radio" id="option_{{$loop->parent->iteration}}_{{$loop->iteration}}"
                                   value="{{$option}}" name="{{$question->id}}" class="custom-control-input" required>
                            <label class="custom-control-label"
                                   for="option_{{$loop->parent->iteration}}_{{$loop->iteration}}">{{$option}}</label>
                        </div>
                    @endforeach
                </div>
            @endif
        @endforeach

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection