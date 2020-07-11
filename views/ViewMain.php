<main>
    <div class="container" id="recipes-list">
        <?php foreach ($content['main']['data'] as $row) { ?>
        <div class="card mb-4">
            <div class="row no-gutters">
                <div class="col-md-6">
                    <img src="<?php echo $row['img'][count($row['img']) - 1];?>" class="card-img" title="<?php echo $row["title"];?>">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row["title"];?></h5>
                        <p class="card-text"><?php echo mb_strimwidth($row["content"], 0, 500, "...");?></p>
                        <a href="\recipe\index?id=<?php echo $row["id"]; ?>">Читати далі</a>
                    </div>
                </div>
            </div>
        </div>
            <?php
        }?>

