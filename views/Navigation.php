<nav class="navbar navbar-expand-lg navbar-light">
    <div id="logo">
        <a class="navbar-brand" href="#"> <img src="/img/cooking.png" width="60px">
            <a class="navbar-brand text-white" href="/">COOKBOOK</a></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" >
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse" id="navigation">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white" href="/">Головна </a>
            </li>
        <?php include $content['categories']['file']; ?>
        <?php include $content['authors']['file']; ?>
        </ul>
    </div>
    <ul class="navbar-nav" id="user-menu">
        <li class="nav-item">
            <a class="nav-link text-white" href="/signin">Вхід</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="/signup">Реєстрація</a>
        </li>
    </ul>
</nav>

