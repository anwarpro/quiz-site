@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4>{{ $planet->title }}</h4>
                <ul class="list-group">
                    @foreach($planet->planet_contents as $slide)
                        <li class="list-group-item">
                            <a href="{{ route('home.planets.contentAdd',['planet' => $planet->id, 'edit' => $slide->id]) }}"
                               class="text-decoration-none" style="color: black !important;">
                                <div>
                                    {{ $loop->iteration }}.
                                    @if($slide->name == 'take')
                                        Takeaway
                                    @elseif($slide->name == 'Quiz' && $slide->qtype == 'quiz')
                                        MCQ
                                    @elseif($slide->name == 'Quiz' && $slide->blankstype == 'printsln')
                                        Fill Blank
                                    @else
                                        {{ $slide->name }}
                                    @endif
                                    <a href="{{route('home.planets.contentDelete', $slide->id)}}" class="pull-right"><i
                                            class="fa fa-trash text-danger text-decoration-none"></i></a>
                                </div>
                            </a>
                        </li>
                    @endforeach
                    <li class="list-group-item">
                        <a href="{{route('home.planets.contentAdd', $planet)}}"
                           class="btn btn-primary btn-sm">Slide</a>
                        <a href="{{route('home.planets.contentAdd', $planet)}}?mcq"
                           class="btn btn-sm btn-danger">MCQ</a>
                        <a href="{{route('home.planets.contentAdd', $planet)}}?fillblank"
                           class="btn  btn-sm btn-danger">Fill Blank</a>
                        <a href="{{route('home.planets.contentAdd', $planet)}}?takeaway"
                           class="btn btn-success btn-sm">Takeaway</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('home.planets', $planet->course)}}"
                           class="btn btn-success">Back to Planets</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                <h3>

                    @if($type == 1)
                        MCQ
                    @elseif($type == 2)
                        Fill Blank
                    @elseif($type == 3)
                        Takeaway
                    @else
                        Slide
                    @endif
                </h3>
                <form
                    action="{{ route( $edit ? 'home.planets.contentUpdate':'home.planets.contentAddSave', $planet) }}"
                    class="row" enctype="multipart/form-data" method="post">

                    {{ csrf_field() }}

                    <input name="planet_id" value="{{ $planet->id }}" hidden>

                    @if($edit)
                        <input name="id" value="{{ $content->id }}" hidden>
                    @endif

                    @switch($type)
                        @case(1)
                        @include('content.mcq', ['content' => $content, 'planet' => $planet, 'edit' => $edit])
                        @break

                        @case(2)
                        @include('content.fillblank', ['content' => $content, 'planet' => $planet, 'edit' => $edit])
                        @break

                        @case(3)
                        @include('content.take', ['content' => $content, 'planet' => $planet, 'edit' => $edit])
                        @break

                        @default
                        @include('content.slide', ['content' => $content, 'planet' => $planet, 'edit' => $edit])
                    @endswitch


                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary" name="type" value="{{$type}}">
                            @if($edit)
                                Update
                            @else
                                Save
                            @endif
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    {{--    <script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js"></script>--}}
    <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('des_01', {
            enterMode: CKEDITOR.ENTER_BR,
            // Define the toolbar groups as it is a more accessible solution.
            toolbarGroups: [
                {
                    "name": "basicstyles",
                    "groups": ["basicstyles"]
                },
                {
                    "name": "paragraph",
                    "groups": ["list"]
                },
                {
                    "name": "document",
                    "groups": ["mode"]
                }
            ],
            // Remove the redundant buttons from toolbar groups defined above.
            removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
        });
        CKEDITOR.replace('des_02', {
            enterMode: CKEDITOR.ENTER_BR,
            // Define the toolbar groups as it is a more accessible solution.
            toolbarGroups: [
                {
                    "name": "basicstyles",
                    "groups": ["basicstyles"]
                },
                {
                    "name": "paragraph",
                    "groups": ["list"]
                },
                {
                    "name": "document",
                    "groups": ["mode"]
                }
            ],
            // Remove the redundant buttons from toolbar groups defined above.
            removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
        });
        CKEDITOR.replace('des_03', {
            enterMode: CKEDITOR.ENTER_BR,
            height: 100,
            // Define the toolbar groups as it is a more accessible solution.
            toolbarGroups: [
                {
                    "name": "basicstyles",
                    "groups": ["basicstyles"]
                },
                {
                    "name": "paragraph",
                    "groups": ["list"]
                },
                {
                    "name": "document",
                    "groups": ["mode"]
                }
            ],
            // Remove the redundant buttons from toolbar groups defined above.
            removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
        });
        CKEDITOR.replace('ptxt', {
            enterMode: CKEDITOR.ENTER_BR,
            height: 100,
            // Define the toolbar groups as it is a more accessible solution.
            toolbarGroups: [
                {
                    "name": "basicstyles",
                    "groups": ["basicstyles"]
                },
                {
                    "name": "paragraph",
                    "groups": ["list"]
                },
                {
                    "name": "document",
                    "groups": ["mode"]
                }
            ],
            // Remove the redundant buttons from toolbar groups defined above.
            removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
        });
        CKEDITOR.replace('mtxt', {
            enterMode: CKEDITOR.ENTER_BR,
            height: 100,
            // Define the toolbar groups as it is a more accessible solution.
            toolbarGroups: [
                {
                    "name": "basicstyles",
                    "groups": ["basicstyles"]
                },
                {
                    "name": "paragraph",
                    "groups": ["list"]
                },
                {
                    "name": "document",
                    "groups": ["mode"]
                }
            ],
            // Remove the redundant buttons from toolbar groups defined above.
            removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
        });
        CKEDITOR.replace('explain', {
            enterMode: CKEDITOR.ENTER_BR,
            height: 100,
            // Define the toolbar groups as it is a more accessible solution.
            toolbarGroups: [
                {
                    "name": "basicstyles",
                    "groups": ["basicstyles"]
                },
                {
                    "name": "paragraph",
                    "groups": ["list"]
                },
                {
                    "name": "document",
                    "groups": ["mode"]
                }
            ],
            // Remove the redundant buttons from toolbar groups defined above.
            removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
        });
        CKEDITOR.replace('question', {
            enterMode: CKEDITOR.ENTER_BR,
            height: 100,
            // Define the toolbar groups as it is a more accessible solution.
            toolbarGroups: [
                {
                    "name": "basicstyles",
                    "groups": ["basicstyles"]
                },
                {
                    "name": "paragraph",
                    "groups": ["list"]
                },
                {
                    "name": "document",
                    "groups": ["mode"]
                }
            ],
            // Remove the redundant buttons from toolbar groups defined above.
            removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
        });
        CKEDITOR.replace('tbefore', {
            enterMode: CKEDITOR.ENTER_BR,
            // Define the toolbar groups as it is a more accessible solution.
            toolbarGroups: [
                {
                    "name": "basicstyles",
                    "groups": ["basicstyles"]
                },
                {
                    "name": "paragraph",
                    "groups": ["list"]
                },
                {
                    "name": "document",
                    "groups": ["mode"]
                }
            ],
            // Remove the redundant buttons from toolbar groups defined above.
            removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
        });
    </script>
@endpush
