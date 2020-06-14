<?php include "header.php";?>
<?php require_once "data.php";?>
    <main>
        <div class="container" id="recipes-list">
            <?php foreach ($recipes as $data) { ?>
            <div class="card mb-4">
                <div class="row no-gutters">
                    <div class="col-md-6">
                        <img src="<?php echo $data["img"];?>" class="card-img" title="Борщ">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $data["title"];?></h5>
                            <p class="card-text"><?php echo mb_strimwidth($data["content"],0, 500) . "...";?></p>
                            <a href="\recipe.php?id=<?php echo $data["id"]; ?>">Читати далі</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
        </main>
<?php include "footer.php";?>
</body>
</html>
