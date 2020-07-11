<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Категорії
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php foreach ($content['categories']['data'] as $row) { ?>
            <a class="dropdown-item text-white" href='#'><?php echo $row["name"]; ?></a>
        <?php } ?>
    </div>
</li>