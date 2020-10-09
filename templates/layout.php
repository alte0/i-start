<!DOCTYPE html>
<html lang="ru" class="h-100">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="description" content="" />
  <title><?= clearStrDataTags($title) ?></title>
  <link rel="preconnect" href="https://stackpath.bootstrapcdn.com" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body class="d-flex flex-column h-100">
  <main class="flex-shrink-0">
    <div class="container">
      <?= $content ?>
    </div>
  </main>
  <footer class="footer mt-auto py-3 bg-light">
    <div class="container">
      <p>Разработка Дмитриев Максим. &copy; 2020 г.</p>
    </div>
  </footer>
</body>
</html>
