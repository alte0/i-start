<form>
  <h2>Все отзывы</h2>
  <div class="form-group form-check">
    <input type="radio" class="form-check-input" id="email" name="sort" value="email" <?= $sort === 'email' ? 'checked' : '' ?>>
    <label class="form-check-label" for="email">По email</label>
  </div>
  <div class="form-group form-check">
    <input type="radio" class="form-check-input" id="fio" name="sort" value="fio" <?= $sort === 'fio' ? 'checked' : '' ?>>
    <label class="form-check-label" for="fio">По ФИО</label>
  </div>
  <button type="submit" class="btn btn-primary">Применить фильтр</button>
</form>
<?php if (isset($feedbacks)) : ?>
  <ul class="list-unstyled mt-5 mb-0">
  <?php foreach ($feedbacks as $feedback) : ?>
    <li class="media mb-3 p-3 border bg-light">
      <div class="media-body">
        <h4 class="mt-0 mb-1">ФИО: <?= clearStrDataTags($feedback['fio']) ?></h4>
        <p class="mt-0 mb-1">Email: <?= clearStrDataTags($feedback['email']) ?></p>
        <p class="mt-0 mb-1">Телефон: <?= clearStrDataTags($feedback['tel']) ?></p>
        <div class="mt-0 mb-1"> <?= clearStrDataTags($feedback['comment'], $allowTags) ?></div>
      </div>
    </li>
  <?php endforeach; ?>
  </ul>
<?php endif; ?>
