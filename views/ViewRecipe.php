<?php $data = $content['main']['data']; ?>
<main>
    <div class="container" id="recipe">
        <div class="card mb-3">
            <div id="carouselExampleIndicators" class="carousel slide col-md-8" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php for ($i = 0; $i <= count($data['img']) - 1; $i++) {
                        if ($i == 0) { ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i;?>" class="active"></li>
                        <?php } else { ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i;?>"></li>
                        <?php }
                    }?>
                </ol>
                <div class="carousel-inner">
                    <?php for ($i = 0; $i <= count($data['img']) - 1; $i++) {
                        if ($i == 0) { ?>
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="<?php echo $data['img'][$i];?>">
                    </div>
                        <?php } else { ?>
                    <div class="carousel-item ">
                        <img class="d-block w-100" src="<?php echo $data['img'][$i];?>" >
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
                <h5 class="card-title"><?php echo $data['title'];?></h5>
                <p class="card-text">Інгредієнти:
                    <?php echo $data['ingredients'];?></p>
                <p class="card-text">Рецепт:
                    <?php echo $data['content'];?></p>
                <p>Автор: <a href="#"><?php echo $data['author'];?></a></p>
                <p>Категорія: <a href="#"><?php echo $data['category'];?></a></p>
                <p><b><?php echo $data['views'];?></b> переглядів</p>
            </div>
        </div>
    </div>
</main>

