<div class="form-group col-md-8">
    <label for="name">Slide Title</label>
    <input type="text" class="form-control" id="name" name="name"
           placeholder="Slide Title" value="take" readonly>
</div>

<div class="form-group col-md-8">
    <label for="des_01">Paragraph 1</label>
    <textarea name="des_01" id="des_01" class="form-control"
              rows="4" required>{{ $content->des_01 ?? '' }}</textarea>
</div>
