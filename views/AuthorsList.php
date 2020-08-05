<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
       aria-haspopup="true" aria-expanded="false">
        Автори
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php foreach ($content['authors']['data'] as $row) { ?>
            <a class="dropdown-item text-white" href='/authors/index?id=<?php echo $row->author_id; ?>&page=1'>
                <?php echo $row->author_name; ?>
            </a>
        <?php } ?>
    </div>
</li>