<div class="form-group col-md-6">
    <label for="name">Slide Title</label>
    <input type="text" class="form-control" id="name" name="name"
           placeholder="Slide Title" value="Quiz" readonly>
</div>

<div class="form-group col-md-6">
    <label for="mid">MID</label>
    <input type="text" name="mid" value="{{ $content->mid ?? ''}}"
           class="form-control"
           readonly id="mid" placeholder="MID">
</div>

<div class="form-group col-md-12">
    <label for="des_01">Question <span class="text-danger"> *</span></label>
    <textarea name="des_01" id="des_01" class="form-control"
              rows="2" required>{{ $content->des_01 ?? '' }}</textarea>
</div>

@php
    if($edit){
        $quiz = json_decode($content->blanks);
    }
@endphp

<div class="form-group col-md-12">
    <label for="tbefore">Text Before</label>
    <textarea name="tbefore" id="tbefore" class="form-control"
              rows="2">@if($edit){{ $quiz->tf1 ?? '' }}@endif</textarea>
</div>

<div class="form-group col-md-12">
    <label for="soln">Blank Answer <span class="text-danger"> *</span></label>
    <input type="text" @if($edit) value="{{ $quiz->soln ?? '' }}" @endif class="form-control"
           name="soln"
           id="soln" required>
</div>

<div class="form-group col-md-12">
    <label for="hint">Hints <span class="text-danger"> *</span></label>
    <input type="text" class="form-control" name="hint" id="hint"
           @if($edit)
           value="{{ explode('|', $content->bookmark)[1] }}"
           @endif required>
</div>
<div class="form-group col-md-12">
    <label for="explain">Explain answer <span class="text-danger"> *</span></label>
    <textarea type="text" class="form-control" name="explain" id="explain" required>@if($edit){{ explode('|', $content->bookmark)[2] }}@endif</textarea>
</div>
