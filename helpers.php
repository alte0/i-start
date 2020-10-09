<?php
/**
 * DBO->prepare и $stmt->fetchAll()
 *
 * @param pdo - $link Соеинение с бд
 * @param string - $sql запрос к бд
 * @param array - $data массив с данными для $stmt->execute($data)
 * @return array
 */
function dboPrepareAndFetchAll($link, $sql, array $data = []): array
{
    $stmt = $link->prepare($sql);

    if ($stmt !== false) {
        $stmt->execute($data);
        $result = $stmt->fetchAll();

        return $result ?? [];
    }

    return ["error"=> "Нет доступна к базе данных. Перезагрузите страницу!"];
}
/**
 * Подключает шаблон, передает туда данные и возвращает итоговый HTML контент
 *
 * @param string $nameTemplate Имя подключаемого файла шаблона из папки templates
 * @param array $data Ассоциативный массив с данными для шаблона
 * @return string Итоговый HTML
 */
function include_template(string $nameTemplate, array $data = []): string
{
    $pathTemplate = "templates/$nameTemplate.php";
    $result = "";
    if (!is_readable($pathTemplate)) {
        return $result;
    }
    ob_start();
    extract($data);
    require $pathTemplate;
    $result = ob_get_clean();
    return $result;
}
/**
 * Функция очистки данных от тэгов
 *
 * @param string $str Очишаемая строка
 * @param string $tags Тэги которые надо оставить - '<p><a>'
 * @return string Очишенная строка
 */
function clearStrDataTags(string $str, $tags = ''): string
{
    return strip_tags($str, $tags);
}
/**
 * Получения значения из $_POST для заполнеиня данных в форме.
 *
 * @param string $name - имя ключа из массива $_POST для получения значения;
 * @return string
 */
function getPostVal($name): string
{
    // htmlentities для сохранения кавычек
    return isset($_POST[$name]) ? htmlentities(trim($_POST[$name])) : "";
}
/**
 * Валидация строки min max
 *
 * @param integer $min - минимальное значение длины строки;
 * @param integer $max - максимальное значение длины строки;
 * @param string $value - значение для валидации;
 * @return string|null
 */
function validateLength(int $min, int $max, string $value)
{
    $length = mb_strlen($value);

    if (!($length >= $min && $length <= $max)) {
        return "Значение должно быть от $min до $max символов";
    }

    return null;
}
/**
 * Валидация строки email по regex
 *
 * @param string $value - значение для валидации;
 * @return string|null
 */
function validateEmailRegex(string $value)
{
    if (!preg_match(REGEX_USER_EMAIL, $value)) {
        return "Ваш email не правильный!";
    }

    return null;
}
/**
 * Валидация строки tel по regex
 *
 * @param string $value - значение для валидации;
 * @return string|null
 */
function validateTelRegex(string $value)
{
    if (!preg_match(REGEX_USER_TEL, $value)) {
        return "Ваш tel не правильный!";
    }

    return null;
}
/**
 * Добавление отзыва от пользователя
 *
 * @param pdo $link - соединение с mysql
 * @param array - $feedBack
 * @return bool
 */
function addFeedback($link, array $feedBack): bool
{
  $fio = $feedBack['fio'];
  $email = $feedBack['email'];
  $tel = $feedBack['tel'];
  $comment = $feedBack['comment'];

  $sqlAddFeedback = "INSERT INTO feedback (fio, email, tel, comment) VALUES (?, ?, ?, ?)";

  if (!$link) {
    return false;
  }

  $stmt = $link->prepare($sqlAddFeedback);

  if (!$stmt) {
    return false;
  }

  $result = $stmt->execute([$fio, $email, $tel, $comment]);

  if ($result) {
    return true;
  }

  return false;
}

/**
 * Получаем все отзывы
 *
 * @param pdo $link - соединение с mysql
 * @param array - $task
 * @return bool
 */
function getFeedbacks($link, $sql): array
{
  $query = $link->query($sql);

  if ($query !== false) {
    $result = $query->fetchAll();

    return $result ?? [];
  }

  return [];
}
