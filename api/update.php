<?
include_once '../setting.php';
$guestbook = new DB('message');
print_r($_POST);
$guestbook->updateByArray($_POST);
to('../index.php');
