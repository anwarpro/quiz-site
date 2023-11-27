@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card" style="">
                    <img src="https://via.placeholder.com/750x240?text={{$planet->title}}" class="card-img-top" alt="">
                    <ul class="list-group list-group-flush">
                        @foreach($planet->sub_planets as $sub)
                            <li class="list-group-item" style="padding-left: 50px;">
                                <a href="{{ route('home.planets.sub-descriptions', $sub) }}">
                                    <div style="color: black !important;">{{ $sub->mtitle }}</div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
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
