<?php

$finish = $content['main']['count'];
$url = stristr($_SERVER['REQUEST_URI'], 'page', true);
$page = $_GET["page"];
?>
<ul class="pagination" style="margin-left: 35%;">
    <?php if ($page == 1) { ?>
    <li class="page-item disabled">
        <a class="page-link" href="<?= $url . 'page=1' ?>">
            Перша
        </a>
    </li>
    <li class="page-item disabled">
        <a class="page-link" href="<?= $url . 'page=' . ($page - 1) ?>" aria-label="Попередня">
            <span aria-hidden="true">«</span>
            <span class="sr-only">Попередня</span>
        </a>
    </li>
    <?php } else { ?>
        <li class="page-item">
            <a class="page-link" href="<?= $url . 'page=1' ?>">
                Перша
            </a>
        </li>
        <li class="page-item">
            <a class="page-link" href="<?= $url . 'page=' . ($page - 1) ?>" aria-label="Попередня">
                <span aria-hidden="true">«</span>
                <span class="sr-only">Попередня</span>
            </a>
        </li>
    <?php } ?>
    <?php for ($i = 1; $i <= $finish; $i++) {
        if ($page == $i) { ?>
    <li class="page-item active">
        <a class="page-link" href="<?= $url . 'page=' . $i ?>"><?= $i ?></a>
    </li>
        <?php } else { ?>
            <li class="page-item">
                <a class="page-link" href="<?= $url . 'page=' . $i ?>"><?= $i ?></a>
            </li>
        <?php }
    } ?>
    <?php if ($page == $finish) { ?>
    <li class="page-item disabled">
        <a class="page-link" href="<?= $url . 'page=' . ($page + 1) ?>" aria-label="Наступна">
            <span aria-hidden="true">»</span>
            <span class="sr-only">Наступна</span>
        </a>
    </li>
    <li class="page-item disabled">
        <a class="page-link" href="<?= $url . 'page=' . $finish ?>">
            Остання
        </a>
    </li>
    <?php } else { ?>
        <li class="page-item">
            <a class="page-link" href="<?= $url . 'page=' . ($page + 1) ?>" aria-label="Наступна">
                <span aria-hidden="true">»</span>
                <span class="sr-only">Наступна</span>
            </a>
        </li>
        <li class="page-item">
            <a class="page-link" href="<?= $url . 'page=' . $finish ?>">
                Остання
            </a>
        </li>
    <?php } ?>
</ul>
