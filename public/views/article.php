<article class="blog-post">
    <img src="<?php echo $data["image"]?>"/>
    <h2 class="blog-post-title mb-1"><?php echo $data["title"]?></h2>
    <p class="blog-post-meta"><?php echo $data["createdAt"]?></p>
    <?php echo $data["text"]?>
</article>
<h3>Comments</h3>
<?php foreach($data["comments"] as $comment):?>
    <div style="border-bottom: 1px solid; padding:10px;">
        <h4><?php echo $comment["name"]?></h4>
        <p class="blog-post-meta"><?php echo $comment["createdAt"]?></p>
        <div><?php echo $comment["comment"]?></div>
    </div>
<?php endforeach;?>
<?php if(isset($_SESSION["user"])): ?>
<form action="index.php?page=saveComment&id=<?php echo $data["id"]?>" method="POST" class="needs-validation" novalidate="">
    <div class="row g-3">
        <div class="col-12">
            <label for="name" class="form-label">Name*</label>
            <div class="input-group has-validation">
            <input name="name" type="text" class="form-control" id="name" placeholder="Name" required="">
        </div>
        <div class="col-12">
            <label for="mail" class="form-label">Mail</label>
            <div class="input-group has-validation">
            <input name="mail" type="text" class="form-control" id="mail" placeholder="Mail" required="">
        </div>
        <div class="col-12">
            <label for="url" class="form-label">Url</label>
            <div class="input-group has-validation">
            <input name="url" type="text" class="form-control" id="url" placeholder="Url" required="">
        </div>
        <div class="col-12">
            <label for="text" class="form-label">Comment*</label>
            <div class="input-group has-validation">
            <textArea name="text" type="text" class="form-control" id="text" placeholder="Text" required=""></textArea>
        </div>
    </div>
    <hr class="my-4">
    <button class="w-100 btn btn-primary btn-lg" type="submit">Send Comment</button>
</form>
<?php endif; ?>