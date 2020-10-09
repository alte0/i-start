<?php
const MIN_LENGTH_TEXT = 2;
const MAX_LENGTH_TEXT = 30;
const MIN_LENGTH_TEXTAREA = 2;
const MAX_LENGTH_TEXTAREA = 1500;
const REGEX_USER_EMAIL = "/.+@.+\..+/";
const REGEX_USER_TEL = "/^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/";

$userDb = $dbConf["userDB"];
$password = $dbConf["passwordDB"];
$dsn = "mysql:dbname={$dbConf["nameDB"]};host={$dbConf["urlDB"]};charset=UTF8";
$mainText = "- Обратная связь";
$errorsForm = [];
$succesForm = false;
$optionDB = [
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];
$allowTags = '<p><h2><h3><h4><strong><i><a><ul><ol><li><blockquote><figure><oembed><div><iframe>';

