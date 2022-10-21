<div class="row mb-2">
    <?php foreach($data as $item): ?>
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <h3 class="mb-0"><?php echo $item["title"]?></h3>
                <div class="mb-1 text-muted"><?php echo $item["createdAt"]?></div>
                <p class="card-text mb-auto"><?php echo substr($item["text"], 0, 1000)?>...</p>
                <a href="index.php?page=article&id=<?php echo $item["id"]?>" class="stretched-link">Continue reading</a>
            </div>
            <div class="col-auto d-none d-lg-block">
                <img src="<?php echo $item["image"]?>"/>
            </div>
            </div>
        </div>
    <?php endforeach;?>
</div>