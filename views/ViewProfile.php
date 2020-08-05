<?php $errors = $content["main"]["errors"]; ?>
<main>
    <div class="container" id="profile-form">
        <h3 class="text-center">Профіль користувача</h3>
            <div class="form-group row  mx-sm-5 mb-2">
                <div class="col-4">
                <div class="form-group ">
                <img src="<?= $content["main"]["data"]->avatar; ?>" class="rounded float-left"
                     id="big_avatar" alt="<?= $content["main"]["data"]->name; ?>">
                </div>
                    <form action="/profile/uploadImage?" method="post" enctype="multipart/form-data">
                        <div class="form-group mx-sm-3 mb-2" id="avatar_form">
                            <label for="avatar_form">Ваша аватарка</label>
                        <input type="file" name="avatar" class="pb-3" />
                        <input type="submit" class="btn btn-outline-primary mx-sm-3 mb-2" value="Завантажити" />
                        </div>
                    </form>
                    <?php if (!empty($errors["avatar"])) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $errors["avatar"]; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php
                    }?>
                </div>
                <div class="col-6">
                    <form method="post" action="/profile/edit?">
                <div class="form-group ">
                    <label for="username">Ваше ім'я</label>
                    <input type="text" class="form-control" id="username" name="username"
                           value="<?= $content["main"]["data"]->name; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Ваш e-mail</label>
                    <input type="email" class="form-control" id="email" name="email"
                           value="<?= $content["main"]["data"]->email; ?>">
                </div>
                        <?php if (!empty($errors["email"]) && $errors["email"] !== true) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $errors["email"]; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php } ?>
                <div class="form-group">
                    <label for="phone">Ваш номер телефону</label>
                    <input type="text" class="form-control" id="phone" name="phone"
                           value="<?= $content["main"]["data"]->phone; ?>">
                </div>
                        <?php if (!empty($errors["phone"]) && $errors !== true) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $errors["phone"]; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php } ?>
                <div class="form-group">
                    <label for="old_password">Старий пароль</label>
                    <input type="password" class="form-control" id="oldPassword" name="oldPassword" required>
                </div>
                        <?php if (!empty($errors["oldPassword"]) && $errors["oldPassword"] !== true) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $errors["oldPassword"]; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php } ?>
                <div class="form-group">
                    <label for="new_password">Новий пароль</label>
                    <input type="password" class="form-control" id="newPassword" name="newPassword">
                </div>
                        <?php if (!empty($errors["newPassword"]) && $errors["newPassword"] !== true) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $errors["newPassword"]; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php } ?>
                    <button class="btn btn-outline-success btn-sm mx-sm-5 mb-2" id="submit" type="submit">
                        Редагувати</button>
                    </form>
                        <button class="btn btn-outline-danger btn-sm mx-sm-5 mb-2" id="delete"
                        onclick="showForm()">
                            Видалити профіль</button>
                        <div class="alert alert-dark" id="delete_form" role="alert" >
                            Ви дійсно хочете видалити свій аккаунт?
                                <div class="row mx-sm-5">
                                    <button class="btn btn-outline-danger btn-sm mx-sm-3" id="cancel"
                                    onclick="showForm()">Ні</button>
                                    <a href="/profile/delete?">
                                        <button class="btn btn-outline-success btn-sm mx-sm-3" id="confirm">
                                        Так</button></a>
                                </div>
                        </div>
                </div>
            </div>
    </div>