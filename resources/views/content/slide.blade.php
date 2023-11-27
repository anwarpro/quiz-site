<div class="form-group col-md-6">
    <label for="name">Slide Title</label>
    <input type="text" class="form-control" id="name" name="name"
           placeholder="Slide Title" value="{{ $content->name ?? '' }}">
</div>

<div class="form-group col-md-6">
    <label for="mid">MID</label>
    <input type="text" name="mid" value="{{ $content->mid ?? ''}}"
           class="form-control"
           readonly id="mid" placeholder="MID">
</div>

<div class="form-group col-md-12">
    <label for="des_01">Paragraph 1</label>
    <textarea name="des_01" id="des_01" class="form-control"
              rows="4">{{ $content->des_01 ?? '' }}</textarea>
</div>

<div class="form-group col-md-12">
    <label for="link01">Image link 1</label>
    <input type="text" name="link01" value="{{ $content->link01 ?? '' }}" class="form-control"
           id="link01"
           placeholder="Image link 1">
</div>

<div class="form-group col-md-12">
    <label for="des_02">Paragraph 2</label>
    <textarea class="form-control" name="des_02" id="des_02" cols="30" rows="4">{{ $content->des_02 ?? '' }}</textarea>
</div>
<div class="form-group col-md-4">
    <label for="link02">Image link 2</label>
    <input type="text" name="link02" value="{{ $content->link02 ?? '' }}" class="form-control"
           id="link02"
           placeholder="Image link 2">
</div>

<div class="form-group col-md-12">
    <label for="code">Code part 1</label>
    <textarea class="form-control prettyprint" name="code" id="code" cols="30"
              rows="4">{{ $content->code ?? '' }}</textarea>
</div>

<div class="form-group col-md-12">
    <div class="form-check">
        <input name="output" value="" type="hidden" id="output">
        <input class="form-check-input" name="output"
               @if($edit && $content->output != null) checked @endif value="true" type="checkbox"
               id="output">
        <label class="form-check-label" for="output">
            Try it
        </label>
    </div>
</div>

<div class="form-group col-md-12">
    <label for="des_03">Paragraph 3</label>
    <textarea class="form-control" name="des_03" id="des_03" cols="30" rows="4">{{ $content->des_03 ?? '' }}</textarea>
</div>

<div class="form-group col-md-12">
    <label for="code2">Code part 2</label>
    <textarea class="form-control prettyprint" name="code2" id="code2" cols="30"
              rows="4">{{ $content->code2 ?? '' }}</textarea>
</div>

<div class="form-group col-md-12">
    <label for="ptxt">Learn more</label>
    <textarea class="form-control prettyprint" name="ptxt" id="ptxt" cols="30"
              rows="4">{{ $content->ptxt ?? '' }}</textarea>
</div>

<div class="form-group col-md-12">
    <label for="mtxt">Give more</label>
    <textarea class="form-control prettyprint" name="mtxt" id="mtxt" cols="30"
              rows="4">{{ $content->mtxt ?? '' }}</textarea>
</div>
