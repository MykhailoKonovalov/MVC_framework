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
    <ul class="navbar-nav" id="user-menu">
        <?php if (empty($_SESSION["username"])) { ?>
        <li class="nav-item">
            <a class="nav-link text-white" href="/signin">Вхід</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="/signup">Реєстрація</a>
        </li>
        <?php } else { ?>
            <li class="nav-item">
                <a class="nav-link text-white" href="/profile"><?= $_SESSION["username"]; ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/profile/signout?">Вихід</a>
            </li>
        <?php } ?>
    </ul>
</nav>

