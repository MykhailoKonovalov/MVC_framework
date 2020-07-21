<?php $data = $content['main']['data'][0];
$img = $content['main']['img'];?>
<main>
    <div class="container" id="recipe">
        <div class="card mb-3">
            <div id="carouselExampleIndicators" class="carousel slide col-md-8" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php for ($i = 0; $i <= count($img) - 1; $i++) {
                        if ($i == 0) { ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i;?>" class="active"></li>
                        <?php } else { ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i;?>"></li>
                        <?php }
                    }?>
                </ol>
                <div class="carousel-inner">
                    <?php for ($i = 0; $i <= count($img) - 1; $i++) {
                        if ($i == 0) { ?>
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="<?= $img[$i]->url;?>">
                    </div>
                        <?php } else { ?>
                    <div class="carousel-item ">
                        <img class="d-block w-100" src="<?= $img[$i]->url;?>" >
                    </div>
                        <?php }
                    }?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div>
            <div class="card-body">
                <h2 class="page-header" align="center"><?= $data->title;?></h2>
                <p class="card-text">Інгредієнти:
                    <?= $data->ingredients;?></p>
                <p class="card-text">Рецепт:
                    <?= $data->content;?></p>
                <p>Автор: <a href="/authors/index?id=<?= $data->author_id; ?>"><?= $data->author_name;?></a></p>
                <p>Категорія: <a href="/categories/index?id=<?= $data->category_id; ?>"><?= $data->category_title;?>
                    </a></p>
                <p><b><?= $data->views;?></b> переглядів</p>
            </div>
        </div>
    </div>
</main>