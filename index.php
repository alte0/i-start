<?php
require "init.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $feedback = [
    'fio' => !empty(trim($_POST["fio"])) ? trim($_POST["fio"]) : "",
    'email' => !empty(trim($_POST["email"])) ? trim($_POST["email"]) : "",
    'tel' => !empty(trim($_POST["tel"])) ? trim($_POST["tel"]) : "",
    'comment' => !empty(trim($_POST["comment"])) ? trim($_POST["comment"]) : "",
  ];

  $required = ['fio', 'email', 'comment'];

  $rules = [
    'fio' => function () use ($feedback) {
      return validateLength(MIN_LENGTH_TEXT, MAX_LENGTH_TEXT, $feedback["fio"]);
    },
    'email' => function () use ($feedback) {
      return validateEmailRegex($feedback["email"]);
    },
    'tel' => function () use ($feedback) {
      return !empty($feedback["tel"]) ? validateTelRegex($feedback["tel"]) : false;
    },
    'comment' => function () use ($feedback) {
      return validateLength(MIN_LENGTH_TEXTAREA, MAX_LENGTH_TEXTAREA, $feedback["comment"]);
    },
  ];

  foreach ($required as $key) {
    if (empty($feedback[$key])) {
      $errorsForm[$key] = "Это поле нужно заполнить!";
    }
  }

  foreach ($feedback as $key => $value) {
    if (!isset($errorsForm[$key]) && isset($rules[$key])) {
      $rule = $rules[$key];
      $errorsForm[$key] = $rule();
    }
  }

  $errorsForm = array_filter($errorsForm);

  if (!count($errorsForm)) {
    if (addFeedback($linkDB, $feedback)) {
      $succesForm =  true;
    }
  }
}

$content = include_template('add-feedback', [
  'errorsForm' => $errorsForm,
  'succesForm' => $succesForm,
]);

$layout = include_template('layout', [
  'title' => "Форма отправки $mainText",
  'content' => $content
]);

print($layout);
