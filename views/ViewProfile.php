<main>
    <div class="container" id="profile-form">
        <h3 class="text-center">Профіль користувача</h3>
        <form method="post" action="/profile/edit?">
            <div class="form-group mx-sm-5 mb-2">
                <label for="username">Ваше ім'я</label>
                <input type="text" class="form-control" id="username" name="username"
                       value="<?= $_SESSION["username"]; ?>">
            </div>
            <div class="form-group mx-sm-5 mb-2">
                <label for="email">Ваш e-mail</label>
                <input type="email" class="form-control" id="email" name="email"
                       value="<?= $_SESSION["email"]; ?>">
            </div>
            <div class="form-group mx-sm-5 mb-2">
                <label for="phone">Ваш номер телефону</label>
                <input type="text" class="form-control" id="phone" name="phone"
                       value="<?= $_SESSION["phone"]; ?>">
            </div>
            <div class="form-group mx-sm-5 mb-2">
                <label for="old_password">Старий пароль</label>
                <input type="password" class="form-control" id="oldPassword" name="oldPassword" required>
            </div>
            <div class="form-group mx-sm-5 mb-2">
                <label for="new_password">Новий пароль</label>
                <input type="password" class="form-control" id="newPassword" name="newPassword">
            </div>
            <button class="btn btn-outline-success btn-sm mx-sm-5 mb-2" id="submit" type="submit">Редагувати</button>
        </form>
    </div>