<?php include "header.php";?>
<main>
    <div class="container" id="signup-form">
        <h3 class="text-center">Реєстрація</h3>
            <div class="form-group mx-sm-5 mb-2">
                <label for="username">Ваше ім'я</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Іван Іванов" required>
            </div>
            <div class="form-group mx-sm-5 mb-2">
                <label for="email">Ваш e-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
            </div>
            <div class="form-group mx-sm-5 mb-2">
                <label for="phone">Ваш номер телефону</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="+380501234567" required>
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
