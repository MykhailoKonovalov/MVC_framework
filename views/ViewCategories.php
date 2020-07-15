<main>
    <div class="container" id="recipes-list">
        <h2 class="page-header" align="center"><?= $content['main']['data'][0]['category_title']; ?></h2>
        <?php foreach ($content['main']['data'] as $row) { ?>
            <div class="card mb-4">
                <div class="row no-gutters">
                    <div class="col-md-6">
                        <img src="<?= $row['url'];?>" class="card-img" title="<?= $row["url"];?>">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row["title"];?></h5>
                            <p class="card-text"><?= mb_strimwidth($row["content"], 0, 500, "...");?></p>
                            <a href="\recipe\index?id=<?= $row["id"]; ?>">Читати далі</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }?>

