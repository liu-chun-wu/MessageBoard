<?
include_once '../setting.php';
$guestbook = new DB('message');
$guestbook->deleteById($_POST['id']);
to('../index.php');
