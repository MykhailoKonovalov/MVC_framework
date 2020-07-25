<?php $data = $content["main"]["data"];?>
<main>
    <div class="container"  id="signup-form">
        <h3 class="text-center">Реєстрація</h3>
        <form id="signup" method="post" action="/signup">
        <div class="form-group mx-sm-5 mb-2">
            <label for="username">Ваше ім'я</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Іван Іванов" required>
            <?php if (!empty($data["usernameResponse"]) && $data["usernameResponse"] !== true) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $data["usernameResponse"];?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php } ?>
        </div>
        <div class="form-group mx-sm-5 mb-2">
            <label for="email">Ваш e-mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
            <?php if (!empty($data["emailResponse"])  && $data["emailResponse"] !== true) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $data["emailResponse"];?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>
        </div>
        <div class="form-group mx-sm-5 mb-2">
            <label for="phone">Ваш номер телефону</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="+380501234567" required>
            <?php if (!empty($data["phoneResponse"]) && $data["phoneResponse"] !== true) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $data["phoneResponse"];?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>
        </div>
        <div class="form-group mx-sm-5 mb-2">
            <label for="password">Ваш пароль</label>
            <input type="password" class="form-control" id="password" name="password" required>
            <?php if (!empty($data["passwordResponse"]) && $data["passwordResponse"] !== true) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $data["passwordResponse"];?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>
        </div>
        <div class="form-group mx-sm-5 mb-2">
            <label for="repeat_password">Повторіть Ваш пароль</label>
            <input type="password" class="form-control" id="repeat_password" name="repeat_password" required>
            <?php if (!empty($data["repeatPasswordResponse"]) && $data["repeatPasswordResponse"] !== true) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $data["repeatPasswordResponse"];?>
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