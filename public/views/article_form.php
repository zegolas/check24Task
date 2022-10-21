<form action="index.php?page=saveArticle" method="POST" class="needs-validation" novalidate="">
    <div class="row g-3">
        <div class="col-12">
            <label for="title" class="form-label">Title*</label>
            <div class="input-group has-validation">
            <input name="title" type="text" class="form-control" id="title" placeholder="Title" required="">
        </div>
        <div class="col-12">
            <label for="image" class="form-label">Image*</label>
            <div class="input-group has-validation">
            <input name="image" type="text" class="form-control" id="image" placeholder="Image" required="">
        </div>
        <div class="col-12">
            <label for="text" class="form-label">Text*</label>
            <div class="input-group has-validation">
            <textArea name="text" type="text" class="form-control" id="text" placeholder="Text" required=""></textArea>
        </div>
    </div>
    <hr class="my-4">
    <button class="w-100 btn btn-primary btn-lg" type="submit">Save</button>
</form>

<script type="text/javascript" src="public/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="public/js/scripts.js"></script>