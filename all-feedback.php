<?php
require "init.php";

if ($_SERVER['REQUEST_METHOD'] === "GET") {
  $sort = $_GET['sort'] ?? 'email';
  $sql = trim($sort) === 'fio' ? "SELECT * FROM `feedback` ORDER BY fio;" : "SELECT * FROM `feedback` ORDER BY email;";
  $feedbacks = getFeedbacks($linkDB, $sql);
}

$content = include_template('all-feedback', [
  'sort' => $sort,
  'feedbacks' => $feedbacks,
  'allowTags' => $allowTags,
]);

$layout = include_template('layout', [
  'title' => "Все отзывы $mainText",
  'content' => $content,
]);

print($layout);
var_dump($feedbacks);
