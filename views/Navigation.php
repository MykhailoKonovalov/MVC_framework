<nav class="navbar navbar-expand-lg navbar-light">
    <div id="logo">
        <a class="navbar-brand" href="/main/index?page=1"> <img src="/img/cooking.png" width="60px">
            <a class="navbar-brand text-white" href="/main/index?page=1">COOKBOOK</a></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" >
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse" id="navigation">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white" href="/main/index?page=1">Головна </a>
            </li>
        <?php include $content['categories']['file']; ?>
        <?php include $content['authors']['file']; ?>
        </ul>
    </div>
    <ul class="navbar-nav" id="user_menu">
        <?php if (empty($_SESSION["username"])) { ?>
        <li class="nav-item">
            <a class="nav-link text-white" href="/signin">Вхід</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="/signup">Реєстрація</a>
        </li>
        <?php } else { ?>
            <li class="nav-item">
                <img class="avatar" src="<?= $_SESSION["avatar"]; ?>">
            </li>
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?= $_SESSION["username"]; ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="nav-link text-white" href="/profile">Мій профіль</a>
                <a class="nav-link text-white" href="/wishlist/index?page=1">Обрані рецепти</a>
                <a class="nav-link text-white" href="/profile/signout?">Вихід</a>
                </div>
            </li>
        <?php } ?>
    </ul>
</nav>

