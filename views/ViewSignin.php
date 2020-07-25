<main>
    <div class="container" id="signin-form">
        <h3 class="text-center">Авторизація</h3>
        <form method="post" action="/signin">
            <?php if ($content["main"]["data"] === false) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Помилка авторизації!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>
            <div class="form-group mx-sm-5 mb-2">
                <label for="username">Ваше ім'я</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group mx-sm-5 mb-2">
                <label for="password">Ваш пароль</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button class="btn btn-outline-success btn-sm mx-sm-5 mb-2" id="submit" type="submit">Відправити</button>
        </form>
    </div>
</main>
