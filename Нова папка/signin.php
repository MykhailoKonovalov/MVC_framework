<?php include "header.php";?>
<main>
    <div class="container" id="signin-form">
        <h3 class="text-center">Авторизація</h3>
        <form>
        <div class="form-group mx-sm-5 mb-2">
            <label for="name_or_mail">Ваше ім'я або e-mail</label>
            <input type="text" class="form-control" id="name_or_mail" name="name_or_mail" required>
        </div>
        <div class="form-group mx-sm-5 mb-2">
            <label for="password">Ваш пароль</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button class="btn btn-outline-success btn-sm mx-sm-5 mb-2" id="submit" type="submit">Відправити</button>
        </form>
    </div>
</main>
<?php include "footer.php";?>
</body>
</html>

