<?php include "header.php";?>
<main>
    <div class="container" id="profile-form">
        <h3 class="text-center">Профіль користувача</h3>
        <form>
            <div class="form-group mx-sm-5 mb-2">
                <label for="username">Ваше ім'я</label>
                <input type="text" class="form-control" id="username" name="username" value="Іван Іванов">
            </div>
            <div class="form-group mx-sm-5 mb-2">
                <label for="email">Ваш e-mail</label>
                <input type="email" class="form-control" id="email" name="email" value="name@example.com">
            </div>
            <div class="form-group mx-sm-5 mb-2">
                <label for="phone">Ваш номер телефону</label>
                <input type="text" class="form-control" id="phone" name="phone" value="+380501234567">
            </div>
            <div class="form-group mx-sm-5 mb-2">
                <label for="old_password">Старий пароль</label>
                <input type="password" class="form-control" id="old_password" name="old_password">
            </div>
            <div class="form-group mx-sm-5 mb-2">
                <label for="new_password">Новий пароль</label>
                <input type="password" class="form-control" id="new_password" name="new_password">
            </div>
            <button class="btn btn-outline-success btn-sm mx-sm-5 mb-2" id="submit" type="submit">Редагувати</button>
        </form>
    </div>
    <div class="container col-8" id="wish-list">
        <h3 class="text-center">Список обраних рецептів</h3>
        <div class="card mb-4">
            <div class="row no-gutters">
                <div class="col-md-6">
                    <img src="img/140.webp" class="card-img" title="Чізкейк">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h5 class="card-title">Чізкейк</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                            in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                            sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                            laborum.</p>
                        <a href="C:\Users\myhaj\sites\mvc_framework\recipe.html">Читати далі</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="row no-gutters">
                <div class="col-md-6">
                    <img src="img/8.webp" class="card-img" title="Борщ">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h5 class="card-title">Борщ український</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                            in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                            sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                            laborum.</p>
                        <a href="C:\Users\myhaj\sites\mvc_framework\recipe.html">Читати далі</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include "footer.php";?>
</body>
</html>
