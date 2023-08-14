<?
include_once '../setting.php';
$guestbook = new DB('message');
$guestbook->createByArray($_POST);

to('../index.php');
