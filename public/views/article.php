<article class="blog-post">
    <img src="<?php echo $data["image"]?>"/>
    <h2 class="blog-post-title mb-1"><?php echo $data["title"]?></h2>
    <p class="blog-post-meta"><?php echo $data["createdAt"]?></p>
    <?php echo $data["text"]?>
</article>