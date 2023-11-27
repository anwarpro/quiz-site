<div class="form-group col-md-6">
    <label for="name">Slide Title</label>
    <input type="text" class="form-control" id="name" name="name"
           placeholder="Slide Title" value="Quiz" readonly>
</div>

<div class="form-group col-md-6">
    <label for="mid">MID</label>
    <input type="text" name="mid" value="{{ $content->mid ?? '' }}"
           class="form-control"
           readonly id="mid" placeholder="MID">
</div>

<div class="form-group col-md-12">
    <label for="question">Question <span class="text-danger"> *</span></label>
    <textarea name="question" id="question" class="form-control"
              rows="2" required>@if($edit){{ json_decode($content->quiz)->question ?? '' }}@endif</textarea>
</div>


<div class="form-group col-md-12">
    <label for="code">Code</label>
    <textarea name="code" id="code" class="form-control"
              rows="2">@if($edit){{ json_decode($content->quiz)->code ?? '' }}@endif</textarea>
</div>

<div class="form-group col-md-4">
    <label for="option[1]">Option 1 <span class="text-danger"> *</span></label>
    <input class="form-control" @if($edit)value="{{ ((array)json_decode($content->quiz)->option)[1] ?? '' }}"
           @endif name="option[1]"
           id="option[1]"
           type="text" required>
</div>
<div class="form-group col-md-4">
    <label for="option[2]">Option 2 <span class="text-danger"> *</span></label>
    <input class="form-control" @if($edit) value="{{ ((array)json_decode($content->quiz)->option)[2] ?? '' }}"
           @endif name="option[2]"
           id="option[2]" type="text" required>
</div>
<div class="form-group col-md-4">
    <label for="option[3]">Option 3 <span class="text-danger"> *</span></label>
    <input class="form-control" @if($edit) value="{{ ((array)json_decode($content->quiz)->option)[3] ?? '' }}"
           @endif name="option[3]"
           id="option[3]" type="text" required>
</div>

<div class="form-group col-md-12">
    <label for="solution">Solution <span class="text-danger"> *</span></label>
    <input class="form-control" name="solution" id="solution"
           @if($edit) value="{{ json_decode($content->quiz)->solution ?? '' }}" @endif type="text" required>
</div>
