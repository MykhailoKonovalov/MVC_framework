<?php $data = $content["main"]["errors"]; ?>
<main>
    <div class="container"  id="signup-form">
        <h3 class="text-center">Реєстрація</h3>
        <form id="signup" method="post" action="/signup">
        <div class="form-group mx-sm-5 mb-2">
            <label for="username">Ваше ім'я</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Іван Іванов" required>
            <?php if (!empty($data["username"]) && $data["username"] !== true) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $data["username"];?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php } ?>
        </div>
        <div class="form-group mx-sm-5 mb-2">
            <label for="email">Ваш e-mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
            <?php if (!empty($data["email"])  && $data["email"] !== true) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $data["email"];?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>
        </div>
        <div class="form-group mx-sm-5 mb-2">
            <label for="phone">Ваш номер телефону</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="+380501234567" required>
            <?php if (!empty($data["phone"]) && $data["phone"] !== true) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $data["phone"];?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>
        </div>
        <div class="form-group mx-sm-5 mb-2">
            <label for="password">Ваш пароль</label>
            <input type="password" class="form-control" id="password" name="password" required>
            <?php if (!empty($data["password"]) && $data["password"] !== true) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $data["password"];?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>
        </div>
        <div class="form-group mx-sm-5 mb-2">
            <label for="repeat_password">Повторіть Ваш пароль</label>
            <input type="password" class="form-control" id="repeat_password" name="repeat_password" required>
            <?php if (!empty($data["repeatPassword"]) && $data["repeatPassword"] !== true) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $data["repeatPassword"];?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>
        </div>
        <button class="btn btn-outline-success btn-sm mx-sm-5 mb-2" id="submit" type="submit">Відправити</button>
        </form>
    </div>
</main>