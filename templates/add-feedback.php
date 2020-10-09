<form action="" method="post">
  <div class="form-group">
    <h2>Обратная связь с нами</h2>
  </div>
  <div class="form-group">
    <label for="nsp">Как к Вам обратиться (ФИО)</label>
    <input type="text" class="form-control" id="nsp" name="fio" ="<?= MIN_LENGTH_TEXT ?>" maxlength="<?= MAX_LENGTH_TEXT ?>" required value="<?= getPostVal("fio") ?>">
    <?= !empty($errorsForm["fio"]) ? "<div class=\"alert alert-danger mt-2 mb-2\"><p class=\"mt-0 mb-0\">{$errorsForm["fio"]}</p></div>" : "" ?>
  </div>
  <div class="form-group">
    <label for="email">Ваш email</label>
    <input type="email" class="form-control" id="email" name="email" ="<?= MIN_LENGTH_TEXT ?>" maxlength="<?= MAX_LENGTH_TEXT ?>"  required pattern=".+@.+\..+" value="<?= getPostVal("email") ?>">
    <?= !empty($errorsForm["email"]) ? "<div class=\"alert alert-danger mt-2 mb-2\"><p class=\"mt-0 mb-0\">{$errorsForm["email"]}</p></div>" : "" ?>
  </div>
  <div class="form-group">
    <label for="tel">Ваш телефон</label>
    <input type="text" class="form-control" id="tel" name="tel" value="<?= getPostVal("tel") ?>" pattern="^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$">
    <?= !empty($errorsForm["tel"]) ? "<div class=\"alert alert-danger mt-2 mb-2\"><p class=\"mt-0 mb-0\">{$errorsForm["tel"]}</p></div>" : "" ?>
  </div>
  <div class="form-group">
    <label for="textarea">Ваш комментарий</label>
    <textarea class="form-control" id="textarea" rows="3" name="comment" ="<?= MIN_LENGTH_TEXTAREA ?>" maxlength="<?= MAX_LENGTH_TEXTAREA ?>" required><?= getPostVal("comment") ?></textarea>
    <?= !empty($errorsForm["comment"]) ? "<div class=\"alert alert-danger mt-2 mb-2\"><p class=\"mt-0 mb-0\">{$errorsForm["comment"]}</p></div>" : "" ?>
  </div>
  <button type="submit" class="btn btn-primary">Отправить</button>
  <?= $succesForm ? "<p class=\"alert alert-success mt-2 mb-2\">Ваше комментарий отправлен, <a href=\"all-feedback.php\">смотреть все отзывы</a></p>" : "" ?>
</form>
