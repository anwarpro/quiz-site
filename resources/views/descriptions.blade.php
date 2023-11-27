@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @forelse($slides as $slide)
                <div class="col-md-8 col-md-offset-2">
                    <div class="card" style="min-height: 400px;">

                        <div class="card-header">
                            @if($slide->name == 'take')
                                Takeaway
                            @elseif($slide->name == 'Quiz')

                                @if($slide->qtype == 'quiz')
                                    <h4>Quiz</h4>
                                @else
                                    <h4>Fill Blank</h4>
                                @endif
                            @else
                                {{ $slide->name }}
                            @endif
                        </div>

                        <div class="card-body">

                            @if($slide->name == 'take')
                                Takeaway
                            @elseif($slide->name == 'Quiz')
                                @if($slide->qtype == 'quiz')
                                    @include('mcq', ['slide' => $slide])
                                @else
                                    @include('blank', ['slide' => $slide])
                                @endif
                            @else
                                @if($slide->des_01 != 'null')
                                    <p>{!! nl2br($slide->des_01) !!}</p>
                                @endif
                                @if($slide->des_02 != 'null')
                                    <p>{!! nl2br($slide->des_02) !!}</p>
                                @endif

                                @if($slide->code != 'code block')
                                    <code class="prettyprint">
                                        {!! nl2br($slide->code) !!}
                                    </code>
                                    @if($slide->output)
                                        <br><br>
                                        <a href="" class="btn-sm btn-success">Try it</a>
                                    @endif
                                @endif

                                @if($slide->des_03 != 'null')
                                    <p>{!! nl2br($slide->des_03) !!}</p>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-10">
                                {{ $slides->links() }}
                            </div>
                            @if($slides->lastPage() == $slides->currentPage())
                                <div class="col-md-2">
                                    <a href="{{ route('home.planets', $planet->course) }}">
                                        <button class="btn btn-success">Finish</button>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            @empty
                <div style="min-height: 400px;">
                    <h3>No slide found!</h3>
                    <p>add some slides</p>
                </div>
            @endforelse
        </div>
        <!-- floating button here -->
        <a href="{{ route('home.planets.contentAdd', $planet) }}" class="float">
            <i class="fa fa-plus my-float"></i>
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

{{--@push('js')--}}
{{--    <script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js"></script>--}}
{{--@endpush--}}
