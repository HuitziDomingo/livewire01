<div class="form-group">
    <label for="">Tiitulo</label>
    <input type="text" class="form-control" wire:model="title">
    @error('title')
        <span>{{$message}}</span>
    @enderror
</div>


<div class="form-group">
    <label for="">Contenido</label>
    <textarea class="form-control" wire:model="body" name="editor1"></textarea>
    @error('body')
        <span>{{$message}}</span>
    @enderror
</div>

{{-- <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'editor1' );
</script> --}}
