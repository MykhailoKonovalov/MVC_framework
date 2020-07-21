<?php $query = strip_tags($_POST["query"]);?>
<main>
    <div class="container" id="recipes-list">
        <?php if (!empty($content['main']['data'])) { ?>
        <h3 class="page-header" align="center">Результати пошуку за запитом:
            <?= mb_strtoupper($query); ?></h3>
            <?php foreach ($content['main']['data'] as $row) { ?>
            <div class="card mb-4">
                <div class="row no-gutters">
                    <div class="col-md-6">
                        <img src="<?= $row->image;?>" class="card-img" title="<?= $row->title;?>">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= $row->title; ?>
                            </h5>
                            <p class="card-text">
                                <?php $pattern = '/' . $query . '/';
                                $replacement = '<b style="background-color: darkkhaki">' . $query . '</b>';
                                echo preg_replace($pattern, $replacement, $row->ingredients);?>
                            </p>
                            <p class="card-text">
                                <?php $pattern = '/' . $query . '/';
                                $replacement = '<b style="background-color: darkkhaki">' . $query . '</b>';
                                echo preg_replace($pattern, $replacement, mb_strimwidth($row->content, 0, 500, "..."));
                                ?>
                            </p>
                            <a href="\recipe\index?id=<?=  $row->id; ?>">Читати далі</a>
                        </div>
                    </div>
                </div>
            </div>
                <?php
            }
        } else { ?>
        <h3 class="page-header" align="center">За запитом
            <?= mb_strtoupper(strip_tags($_POST["query"])); ?> нічого не знайдено</h3>
        <?php } ?>
    </div>
</main>
