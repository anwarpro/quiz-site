@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            @foreach($course->planets as $planet)
                <div class="row">

                    @if($loop->iteration%2 == 0)
                        <div class="col-md-6">

                        </div>
                    @endif

                    <div class="col-md-6" style="">
                        <div class="load" style="margin-left: 50%;">
                            <a href="@if($planet->type == "Single")
                            {{route('home.planets.descriptions', $planet->id)}}
                            @else
                            {{route('home.planets.sub-planets', $planet->id)}}
                            @endif"><i class="fa fa-play-circle animated fa-3x fa-3x"></i>
                                <div style="margin-left: 58%; margin-top: 20px;">
                                    {{ $planet->title }}
                                </div>
                            </a>
                        </div>
                    </div>

                    @if($loop->iteration%2 == 1)
                        <div class="col-md-6">

                        </div>
                    @endif
                </div>
            @endforeach
        </div>
        <!-- floating button here -->
        {{--        <a href="#" class="float">
                    <i class="fa fa-plus my-float"></i>
                </a>--}}
        <a href="{{route('home')}}" class="float" style="right: 20px !important;background-color: red; !important;">
            <i class="fa fa-arrow-left my-float"></i>
        </a>
    </div>
@endsection

@push('css')
    <style>
        .float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            right: 100px;
            background-color: #0C9;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            box-shadow: 2px 2px 3px #999;
        }

        .my-float {
            margin-top: 22px;
        }
    </style>
@endpush
