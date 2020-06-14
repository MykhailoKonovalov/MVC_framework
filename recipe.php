<?php include "header.php";?>
<?php require_once "data.php";?>
<main>
    <div class="container" id="recipe">
        <?php
        foreach ($recipes as $data){
            if ($data["id"] == $_GET["id"]){ ?>
        <div class="card mb-3">
            <div id="carouselExampleIndicators" class="carousel slide col-md-8" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="<?php echo $data['img'];?>" alt="Первый слайд">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="<?php echo $data['img'];?>" alt="Второй слайд">
                    </div>
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
        <?php }
        } ?>
    </div>
</main>
  <?php include "footer.php";?>
</body>
</html>
