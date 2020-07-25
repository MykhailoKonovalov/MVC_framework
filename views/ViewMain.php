<main>
    <div class="container" id="recipes-list">
        <?php if (!empty($content['main']['data'])) {
            foreach ($content['main']['data'] as $row) { ?>
        <div class="card mb-4">
            <div class="row no-gutters">
                <div class="col-md-6">
                    <img src="<?= $row->image;?>" class="card-img" title="<?= $row->title;?>">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row->title;?></h5>
                        <p class="card-text"><?= mb_strimwidth($row->content, 0, 500, "...");?></p>
                        <a href="\recipe\index?id=<?=  $row->id; ?>">Читати далі</a>
                    </div>
                </div>
            </div>
        </div>
                <?php
            }
        } ?>
            <?php include "Pagination.php";?>
    </div>
</main>