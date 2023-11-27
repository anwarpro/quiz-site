@extends('layouts.quiz')

@section('content')
    <style>
        .result-totall {
            font-family: 'Poppins', sans-serif;
            font-size: 40px;
            color: #02ccc0;
            float: right;
            padding: 0 30px;
        }

        .result-reivew h3 {
            font-size: 35px;
            background-color: #daeef7;
            padding: 10px 20px;
            font-family: 'Poppins', sans-serif;
            border-radius: 10px;
            display: flow-root;
        }

        .corr-ans {
            color: #3084eb;
        }

        .wrong-ans {
            color: #fe5a7d;
        }

        .result-date {
            padding: 10px 0;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="result-reivew">
                    <div class="result-banner-img">
                        <img src="https://i.imgur.com/421H0Iy.png" width="100%">
                    </div>
                    <h3>Total: <span class="result-totall">{{($marks->correct + $marks->wrong)}}</span></h3>
                    <h3>Correct: <span class="result-totall corr-ans">{{$marks->correct}}</span></h3>
                    <h3>Wrong: <span class="result-totall wrong-ans">{{$marks->wrong}}</span></h3>

                    @if(($marks->correct/($marks->correct+$marks->wrong)*100) >= 100)
                        <h4>সাবাস {{$user_name}} !!! তুমি সব পেরে গেছো।</h4>
                    @elseif(($marks->correct/($marks->correct+$marks->wrong)*100) >= 50)
                        <h4>ব্যাপার না {{$user_name}}, পরের বার ১০০% পেরে যাবে।</h4>
                    @else
                        <h4>ইশশ !!! এইবার তো ধরা খেয়ে গেলে। পরেরবার কিন্তু আরেকটু খেয়াল করে শিখবে।</h4>
                    @endif
                    @if($reset)
                        <br><a href="{{route('quiz.reset',['unit_id'=>$marks->unit_id,'user_id'=>$marks->user_id])}}"
                               class="btn btn-danger">Reset Quiz</a>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                {{--    <img src="https://i.imgur.com/n2f6uaX.png" alt="result.png" width="100%">--}}
                @if(($marks->correct/($marks->correct+$marks->wrong)*100) >= 50)
                    <img src="{{asset('images/boywinner.png')}}" alt="result.png" width="100%">
                @else
                    <img src="{{asset('images/oops.png')}}" alt="result.png" width="100%" style="margin-top: 20%">
                @endif
            </div>
        </div>
    </div>

@endsection