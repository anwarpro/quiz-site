@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h4>Courses</h4>
            </div>
            @foreach(App\Course::all()->sortBy('course_id') as $course)
                <div class="col-md-4" style="margin-bottom: 20px">
                    <a href="{{ route('home.planets', $course->id) }}">
                        <div class="card">
                            <div class="card-header">{{$course->course_name}}</div>

                            <div class="card-body">
                                <div>
                                    <p style="color: black !important;">Planets: {{ $course->planets()->count()  }}<br>type: {{ $course->content_name }}
                                    </p>
                                </div>
                                <div>
                                    <a href="{{route('home.export', $course)}}" class="btn btn-success">Export</a>
                                    <a href="" class="btn btn-primary">Import</a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
