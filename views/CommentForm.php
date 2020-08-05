<form id="commentsForm">
    <div class="form-group">
        <div class="col-3 col-sm-5 col-md-8 col-lg-4">
            <?php if (!empty($_SESSION["username"])) { ?>
                <input type="text" class="form-control" id="username" name="username"
                       value="<?= $_SESSION["username"] ?>" readonly>
            <?php } else { ?>
                <input type="text" class="form-control" id="username" name="username" placeholder="Ваш нік" required>
            <?php } ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-3 col-sm-5 col-md-12 col-lg-12">
            <textarea class="form-control" id="commentText" name="text" placeholder="Ваш коментар" rows="3"
                      required></textarea>
        </div>
    </div>
    <button class="btn btn-outline-success my-2 my-sm-0" id="sendCommets">Відправити</button>
</form>

